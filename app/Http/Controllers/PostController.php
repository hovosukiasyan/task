<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:1', 'max:25'],
            'description' => ['required', 'min:1', 'max:25'],
            'content' => ['required', 'max:255'],
            'picture' => ['required','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ]);

        $inputs = $request->all();       

        unset($inputs['picture']);
        unset($inputs['_token']);

        if ($request->hasFile('picture')) {
            $destinationPath = public_path('uploads\files ');
            $url = $request->file('picture')->getClientOriginalExtension();
            $filename = uniqid().'.'.$url;
            $request->file('picture')->move($destinationPath, $filename);
            $inputs['picture'] = $filename;
        }

        $inputs['user_id'] = Auth::id();
        //dd($inputs);
        $post = Post::create($inputs);

        return redirect('/home');
    }

    public function myPosts()
    {
        $user = Auth::id();
        $myposts = DB::table('posts')->where('user_id', $user)->get();
        //dd($myposts);
        return view('posts.myposts',[
            'myposts' => $myposts
        ]);
    }


    public function allPosts()
    {
        $allposts = DB::table('posts')->get();
        //dd($allposts);
        return view('posts.allposts',[
            'allposts' => $allposts
        ]);
    }
}
