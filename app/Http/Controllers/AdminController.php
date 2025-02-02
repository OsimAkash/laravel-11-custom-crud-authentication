<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create()
    {
        return view('admin.create');
    }

    public function OurfileStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,png,webp',
        ]);

        // image Uploaded
        $imageName = null;
        if (isset($request->image)) {
            $imageName = time() . ' . ' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        //  Add New admin
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->description = $request->description;
        $admin->image = $imageName;
        $admin->save();


        return redirect()->route('home')->with('success', 'Your User has been created');
    }


    public function admineditData($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.edit', ['ourAdmin' => $admin]);
    }



    public function adminupdateData($id, Request $request)
    {


        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,png,webp',
        ]);


        //  Add New admin
        $admin = Admin::findOrFail($id);
        $admin->name = $request->name;
        $admin->description = $request->description;
        $admin->save();

        // image Uploaded
        if (isset($request->image)) {
            $imageName = time() . ' . ' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $admin->image = $imageName;
        }

        return redirect()->route('admindashboard')->with('success', 'Your User has been Updated');
    }


    public function admindeleteData($id)
    {
        $admin = Admin::findOrFail($id);

        $admin->delete();

        return redirect()->route('admindashboard')->with('success', 'Your User has been Deleted');
    }





    public function admincloneData($id)
    {
        // Find the original admin
        $originaladmin = Admin::findOrFail($id);

        // Replicate the admin
        $admin = $originaladmin->replicate();

        // Modify attributes
        $admin->name = $originaladmin->name . ' (Copy)'; // Append "(Copy)" to the name
        $admin->created_at = now(); // Set current timestamp for created_at
        $admin->updated_at = now(); // Set current timestamp for updated_at

        // Save the cloned admin
        $admin->save();

        // Handle image cloning
        if ($originaladmin->image && file_exists(public_path('images/' . $originaladmin->image))) {
            $newImageName = time() . '_copy.' . pathinfo($originaladmin->image, PATHINFO_EXTENSION);
            copy(public_path('images/' . $originaladmin->image), public_path('images/' . $newImageName));
            $admin->image = $newImageName;
            $admin->save();
        }

        // Redirect with success message
        // Fix the route name from 'admindashbord' to 'admindashboard'
        return redirect()->route('admindashboard')->with('success', 'User cloned successfully!');
    }
    public function listAdmins()
    {
        // Retrieve all admins ordered by creation date
        $admins = Admin::orderBy('created_at', 'desc')->get();

        // Return the view with the admins
        return view('admin_list', ['admins' => $admins]);
    }
}
