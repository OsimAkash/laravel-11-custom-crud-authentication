<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create () {
        return view('product.create');
    }

    public function OurfileStore(Request $request) {
            $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,png,webp',
        ]);

        // image Uploaded
        $imageName = null;
        if (isset($request->image)) {
            $imageName = time(). ' . ' .$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        //  Add New Post
        $post = new Post();
        $post->name = $request->name;
        $post->description = $request->description;
        $post->image = $imageName;
        $post->save();


        return redirect()->route('dashboard')->with('success', 'Your product has been created');
    }


    public function editData ($id) {
       $post = Post::findOrFail($id);
        return view('product.edit',['ourPost' => $post ]);
    }


    
    public function updateData($id , Request $request)  {


        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,png,webp',
        ]);

        
        //  Add New Post
        $post = Post::findOrFail($id);
        $post->name = $request->name;
        $post->description = $request->description;
        $post->save();
        
        // image Uploaded
        if (isset($request->image)) {
            $imageName = time(). ' . ' .$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $post->image = $imageName;

        }

        return redirect()->route('dashboard')->with('success', 'Your post has been Updated');
    }
    
    
    public function deleteData($id) {
        $post = Post::findOrFail($id);
        
        $post->delete();
        
        return redirect()->route('dashboard')->with('success', 'Your post has been Deleted');
    }





    public function cloneData($id)
    {
        // Find the original post
        $originalPost = Post::findOrFail($id);
    
        // Replicate the post
        $post = $originalPost->replicate();
    
        // Modify attributes
        $post->name = $originalPost->name . ' (Copy)'; // Append "(Copy)" to the name
        $post->created_at = now(); // Set current timestamp for created_at
        $post->updated_at = now(); // Set current timestamp for updated_at
    
        // Save the cloned post
        $post->save();
    
        // Handle image cloning
        if ($originalPost->image && file_exists(public_path('images/' . $originalPost->image))) {
            $newImageName = time() . '_copy.' . pathinfo($originalPost->image, PATHINFO_EXTENSION);
            copy(public_path('images/' . $originalPost->image), public_path('images/' . $newImageName));
            $post->image = $newImageName;
            $post->save();
        }
    
        // Redirect with success message
        return redirect()->route('dashboard')->with('success', 'Post cloned successfully!');
    }
    public function listProducts()
    {
        // Retrieve all posts ordered by creation date
        $posts = Post::orderBy('created_at', 'desc')->get();
        
        // Return the view with the posts
        return view('product_list', ['posts' => $posts]);
    }
    

}
