<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function usereditData($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', ['ourUser' => $user]);
    }





    public function userupdateData($id, Request $request)
    {


        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ]);


        //  Add New user
        $user = User::findOrFail($id);
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = $request->password;
        $user->phone    = $request->phone;
        $user->save();



        return redirect()->route('userdashboard')->with('success', 'Your user has been Updated');
    }


    public function userdeleteData($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('userdashboard')->with('success', 'Your user has been Deleted');
    }





    public function listUsers()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('home', compact('users')); 
    }
    
}
