<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Players;
use App\Lessonhours;
use App\Packages;
use App\Hoursused;
use App\User;
use Auth;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Event;

class PlayerController extends Controller
{
    public function getPlayerIndex()
    {
        //
        $players = Players::with('lessonHours')->orderBy('lname')->get();
        
        return view('admin/player/index', ['players' => $players]);
    }
    
    public function getplayers()
    {
        $players = Players::orderBy('lname')->get();
        return view('admin.player.players', compact('players'));
    }
    
    public function getMyLessonhours(Players $players, Lessonhours $lessonhours)
    {
        //$packages = Packages::all();
       
        $lessonhours = Lessonhours::whereHas('players', function($q)
        {
            $q->where('users_id', '=', Auth::user()->id);
        })->orderBy('signup_date', 'desc')->with('players')->get(); 
        
         $players = Players::where('users_id', '=', Auth::user()->id)->with('lessonhours.hoursused','lessonhours.packages', 'users')->get(); 
        return view('auth.account.mylessonhours', compact('players'), compact('lessonhours'));
    }
    
    public function getMyHoursused(Lessonhours $lessonhours, Hoursused $hoursused)
    {
        return view('auth.account.myhoursused', compact('lessonhours'));
    }
    
    public function playershow(Players $players, Packages $packages)
    {
        $packages = Packages::all();
        return view('admin.player.player-profile', compact('players'), compact('packages'));
    }
    
    public function storeLessonHours(Request $request, Players $players)
    {
        $this->validate($request, [
            'packages_id' => 'required|numeric',
            'signup_date' => 'required'
        ]);
        
        $lessonhours = new Lessonhours;
        $lessonhours->packages_id = $request->packages_id;
        $lessonhours->signup_date = $request->signup_date;

        if($players->lessonhours()->save($lessonhours)){
            
            Event::fire(new MessageSent($lessonhours));
            
            return back()->with(['success' => 'Player is enrolled in new Lesson Hour Session.']);
        } else {
            return back()->with(['fail' => 'The attempt to enroll has failed.']);
        }
    }
    
    public function postCreatePlayer(Request $request)
    {
        $this->validate($request, [
                'fname' => 'required',
                'lname' => 'required',
                'gender' => 'required',
                'familyId' => 'required'
            ]);
            $player = new Players();
            $player->fname = $request['fname'];
            $player->lname = $request['lname'];
            $player->gender = $request['gender'];
            $player->familyId = $request['familyId'];
            $player->birthdate = $request['birthdate'];
            
            if($player->save()){
               return redirect()->route('admin.index', ['fname' => $request['fname'], 'lname' => $request['lname'], 'gender' => $request['gender'], 'birthdate' => $request['birthdate']])->with(['success' => 'Player successfully created!']); 
            } else {
                return redirect()->route('admin.index')->with(['fail' => 'Something went wrong!']);
            }
    }
    
    public function edit(Players $player)
    {
        return view('admin.players.playeredit', compact('player'));
    }
    
    public function update(Request $request, Players $player)
    {
       if($player->update($request->all())) {
        return back()->with(['success' => 'Player has been edited.']);
        } else {
            return back()->with(['fail' => 'The attempt to edit has failed.']);
        }
    }
    
    
}
