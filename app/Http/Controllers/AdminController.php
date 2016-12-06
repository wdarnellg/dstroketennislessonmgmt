<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Players;
use App\Packages;
use App\Lessonhours;
use App\Hoursused;
use Illuminate\Support\Facades\Event;
use App\Events\MessageSent;
use App\Events\DStrokeMail;

class AdminController extends Controller
{
    public function getusers()
    {
         $users = User::orderBy('famname')->get();
        return view('admin.users.users', compact('users'));
    }
    
    public function FamilyEdit(User $families)
    {
        return view('admin.users.familyedit', compact('families'));
    }
    
    public function FamilyUpdate(Request $request, User $users)
    { 
        if($users->update($request->all())) {
               return back()->with(['success' => 'Family successfully edited.']);
        } else {
            return back()->with(['fail' => 'The attempt to edit failed.']);
        }
    }
    
    public function getPackageform()
    {
        $packages = Packages::orderBy('type')->orderBy('name')->paginate(4);
        return view('admin.packages.packageform', compact('packages'));
    }
    
    public function getplayers()
    {
        $players = Players::orderBy('lname')->get();
        return view('admin.players.players', compact('players'));
    }
    
    public function playershow(Players $players, Packages $packages)
    {
        $packages = Packages::all();
        
        return view('admin.players.playerprofile', compact('players'), compact('packages'));
    }
    
    public function Lessonhoursshow(Lessonhours $lessonhours)
    {
        return view('admin.lessonhours.lessonhours', compact('lessonhours'));
    }
    
    public function getLessonhours()
    {
        $lessonhours = Lessonhours::orderBy('signup_date', 'desc')->get();
        
        return view('admin.lessonhours.lessonhours', compact('lessonhours'));
    }
    
    public function postCreatePackage(Request $request)
    {
        $this->validate($request, [
                'name' => 'required',
                'cost' => 'required|numeric',
                'numberofhours' => 'required|numeric',
                'type' => 'required'
            ]);
            $packages = new Packages();
            $packages->name = $request['name'];
            $packages->cost = $request['cost'];
            $packages->numberofhours = $request['numberofhours'];
            $packages->type = $request['type'];
            
            if($packages->save()){
               return back()->with(['success' => 'Package successfully created!']); 
            } else {
                return back()->with(['fail' => 'Something went wrong!']);
            }
    }
    
    public function showFamily(User $families)
    {
        return view('admin.users.familyshow', compact('families'));
    }
    
    public function show(User $user)
    {
        return view('admin.user.user-profile', compact('user'));
    }
    
       public function storeUser(Request $request)
    {
        $this->validate($request, [
                'famname' => 'required|unique:users',
                'phone' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:4'
            ]);
            $user = new User();
            $user->famname = $request['famname'];
            $user->phone = $request['phone'];
            $user->email = $request['email'];
            $user->password = bcrypt($request->input('password'));
            
            if($user->save()){
               return back()->with(['success' => 'user successfully created.']);
        } else {
            return back()->with(['fail' => 'The attempt to create failed.']);
        }
            
    }
    
    public function storePlayer(Request $request, User $families)
    {
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'birthdate' => 'required'
        ]);
        $players = new Players;
        $players->fname = $request->fname;
        $players->lname = $request->lname;
        $players->gender = $request->gender;
        $players->birthdate = $request->birthdate;
        
        if($families->players()->save($players)){
            return back()->with(['success' => 'Player successfully added.']);
        } else {
            return back()->with(['fail' => 'The attempt to save failed.']);
        }
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
    
    public function storeHoursUsed(Request $request, Lessonhours $lessonhours)
    { 
        $this->validate($request, [
            'date_time' => 'required',
            'numberofhours' => 'required|numeric',
            'comments' => 'required|max:700'
        ]);
        $hoursused = new Hoursused();
        $hoursused->date_time = $request['date_time'];
        $hoursused->numberofhours = $request['numberofhours'];
        $hoursused->comments = $request['comments'];
        
        if($lessonhours->hoursused()->save($hoursused)){
            Event::fire(new DStrokeMail($hoursused));
               return back()->with(['success' => 'Hours Used successfully added!']); 
            } else {
                return back()->with(['fail' => 'Something went wrong!']);
            }
    }
}
