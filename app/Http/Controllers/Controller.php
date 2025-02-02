<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Post;
use App\Models\User;

abstract class Controller
{
 
    public function dashboard()
    {
        $posts = Post::paginate(5); // Fetch posts
        return view('dashboard', compact('posts'));
    }
    

    public function admindashboard()
{
    $admins = Admin::paginate(5); // Fetch posts

    return view('admindashboard', compact('admins'));
}




    public function userdashboard()
{
    $users = User::paginate(5); // Fetch posts

    return view('userdashboard', compact('users'));
    
}
}
