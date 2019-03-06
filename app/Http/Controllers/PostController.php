<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Category;
use App\CategoryPosts;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function create()
    {
        $categories = Category::all(); 
        return view('posts.create',[
            'categories' => $categories
        ]);
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
        // dd($inputs);

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
        
        /////////getting the categories///////
        // dd($inputs);

        $post = Post::create($inputs);

        $category_list = $inputs['category_list'];
        // dd($category_list);
        $count = count($category_list);
        // dd($count);
        $post_id = $post->id;

        for ($i=1; $i < $count ; $i++) { 
            $post->categories()->sync($category_list);
        }

        return redirect('/my-posts');
    }

    public function myPosts()
    {
        $user = Auth::id();
        $myposts = Post::where('user_id', $user)->get();
        //dd($myposts);
        return view('posts.myposts',[
            'myposts' => $myposts
        ]);
    }


    public function allPosts()
    {
        $allposts = Post::all();
        //dd($allposts);
        return view('posts.allposts',[
            'allposts' => $allposts
        ]);
    }

    public function show(Post $post)
    {
        // dd($post);
        $selected_categories = $post->categories;
        // dd($selected_categories);
        return view('posts.show',[
            'post' => $post,
            'selected_categories' => $selected_categories
        ]);
    }

    public function edit(Post $post)
    {
        $selected_categories = $post->categories;
        $selected_ids = $selected_categories->pluck("id");
        $not_selected_ids = Category::whereNotIn("id", $selected_ids)->pluck("id");
        $not_selected_categories = Category::whereNotIn("id", $selected_ids)->get();

        return view('posts.edit',[
            'post' => $post,
            'selected_categories' => $selected_categories,
            'selected_ids' => $selected_ids,
            'not_selected_ids' => $not_selected_ids,
            'not_selected_categories' => $not_selected_categories
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => ['required','string', 'max:255'],
            'description' => ['required','string', 'max:255'],
            'content'  => ['required','string', 'max:255'],
        ]);
        $inputs = $request->all();
        

        // dd($post);
        unset($inputs['_token']);
        unset($inputs['_method']);
        unset($inputs['category_list']);
        $post_id = $post->id;
        $post = Post::whereId($post->id)->first();
        
        $post->update($inputs);

        $category_list = $request->get('category_list');
        $count = count($category_list);

        for ($i=1; $i < $count ; $i++) { 
            $post->categories()->sync($category_list);
        }

        return redirect()->back();
    }

    public function destroy(Post $post)
    {
        // dd($post); 
        $post = Post::findOrFail($post->id);
        $post->delete();
        return redirect()->back();
    }
}






        // $checked = CategoryPosts::where(['post_id', $post->id]);
        // $categories = Post::find($post->id);
        // $selected_categories = $categories->categories();
        // $categories = CategoryPosts::all();
        // $categories = $model->categories();   // returns what you defined it to return
        // $model->categories()->where(['post_id', $post->id])->get();

        // $model->categories;   // loaded relationship via dynamic property