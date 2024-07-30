<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Tags;
use App\Posts;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|integer',
            'comment' => 'required|string'
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $request->post_id,
            'comment' => $request->comment
        ]);

        return back()->with('success', 'Comment added successfully.');
    }

    public function index()
    {
        $comments = Comment::with('user', 'post')->paginate();  // Paginate the comments
        $post = Posts::all();
        return view('admin.comment.index', compact('comments', 'post'));
    }

    public function destroy($id)
    {
        $comments = Comment::find($id);

        if ($comments) {
            $comments->delete();
            return back()->with('success', 'Comment deleted successfully.');
        }

        return back()->with('error', 'Comment not found.');
    }
}