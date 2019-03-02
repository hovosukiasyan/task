<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\CategoryPosts;

class CategoryController extends Controller
{
    public function allPosts(Category $category)
    {
        // dd($category);
        $allposts = $category->posts;
        // dd($allposts);
        return view('categories.allposts',[
            'allposts' => $allposts,
            'category' => $category
        ]);
    }
}
