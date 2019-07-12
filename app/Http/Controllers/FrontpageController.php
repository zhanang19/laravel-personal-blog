<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
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

    public function addComment(Request $request, $slug = '')
    {
        if (\Auth::check()) {
            $user = \Auth::user();
            $post = Post::whereSlug($slug)->firstOrFail();
            $request->validate([
                'comment' => ['required', 'string', 'min:10']
            ]);

            $result = Comment::create([
                'content' => $request->comment,
                'user_id' => $user->id,
                'post_id' => $post->id,
            ]);
            if ($result) {
                session()->flash('status', 'Post succesfully created.');
                session()->flash('status-type', 'success');
            } else {
                session()->flash('status', 'Something was wrong, please try again later.');
                session()->flash('status-type', 'danger');
            }
            return redirect()->route('view-post', ['slug' => $slug]);
        } else {
            abort(401, 'Sorry you must login first!');
        }
    }

    public function destroyComment($comment_id = 0)
    {
        if (\Auth::check()) {
            $user = \Auth::user();
            $comment = Comment::findOrFail($comment_id);
            $slug = Post::findOrFail($comment->post_id)->slug;
            abort_if($user->id !== $comment->user_id, 403, 'Sorry you\'re unauthorized to delete this resource');
            if ($comment->delete()) {
                session()->flash('status', 'Comment succesfully deleted.');
                session()->flash('status-type', 'success');
            } else {
                session()->flash('status', 'Something was wrong, please try again later.');
                session()->flash('status-type', 'danger');
            }
            return redirect()->route('view-post', ['slug' => $slug]);
        } else {
            abort(401, 'Sorry you must login first!');
        }
    }
}
