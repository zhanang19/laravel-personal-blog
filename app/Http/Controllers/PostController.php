<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->is_admin) {
            $posts = Post::all();
            return view('post.index', compact('posts'));
        } else {
            abort(403, 'Only admin can access this resource!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->is_admin) {
            $categories = Category::all()->pluck('name', 'id');
            return view('post.create', compact('categories'));
        } else {
            abort(403, 'Only admin can access this resource!');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'numeric', Rule::in(Category::all()->pluck('id'))],
            'content' => ['required', 'string'],
            'photo' => ['required', 'file', 'image'],
        ]);

        $photo = $request->photo;
        $photoName = time() . md5($photo->getClientOriginalName()) . '.' . $photo->extension();
        $photo->storeAs('public/images', $photoName);
        
        $result = Post::create([
            'user_id' => \Auth::id(),
            'title' => $request->title,
            'slug' => \Str::slug($request->title, '-'),
            'category_id' => $request->category_id,
            'content' => $request->content,
            'photo' => $photoName
        ]);

        if ($result) {
            session()->flash('status', 'Post succesfully created.');
            session()->flash('status-type', 'success');
        } else {
            session()->flash('status', 'Something was wrong, please try again later.');
            session()->flash('status-type', 'danger');
        }
        return redirect()->route('posts.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        foreach ($post->comments as $comment) {
            $comment->delete();
        }
        if ($post->delete()) {
            session()->flash('status', 'Post succesfully deleted.');
            session()->flash('status-type', 'success');
        } else {
            session()->flash('status', 'Something was wrong, please try again later.');
            session()->flash('status-type', 'danger');
        }
        return redirect()->route('posts.index');
    }
}
