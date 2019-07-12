<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class FrontpageController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(3);
        $categories = Category::limit(5)->get();
        return view('welcome', compact('posts', 'categories'));
    }

    public function view($slug = '')
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        $post->increment('views');
        return view('post', compact('post'));
    }
}