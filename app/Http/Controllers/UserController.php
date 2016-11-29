<?php

namespace App\Http\Controllers;

use DB;
use App\Players;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // public function getusers()
    // {
    //      $users = User::orderBy('famname')->get();
    //     return view('admin.users.users', compact('users'));
    // }
    
    public function storePlayer(Request $request, User $users)
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
        
        if($users->players()->save($players)){
            return back()->with(['success' => 'Player successfully added.']);
        } else {
            return back()->with(['fail' => 'The attempt to save failed.']);
        }
    }
    

    
    public function edit(user $user)
    {
        return view('admin.user.edit', compact('user'));
    }
    
    public function update(Request $request, user $user)
    {
       if($user->update($request->all())) {
               return back()->with(['success' => 'user successfully edited.']);
        } else {
            return back()->with(['fail' => 'The attempt to edit failed.']);
        }
    }
        
    
}