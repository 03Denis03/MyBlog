<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'body' => 'required'
        ]);

        $comment = new Comment();
        $comment->body = $request->input('body');
        $comment->post_id = $request->input('post_id');
        $comment->user_id = auth()->id();
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully.');
    }
}
