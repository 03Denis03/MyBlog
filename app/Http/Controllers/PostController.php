<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/*
class PostController extends Controller
{
    public function createPost(Request $request){
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = $request->input('body');
        $incomingFields['user_id'] = auth()->id();

        Post::create($incomingFields);
        return redirect('/');
    }

    public function showEditScreen(Post $post) {
        if(auth()->user()->id !== $post['user_id']){
            return redirect('/'); // redirect to the homepage if the user is not the auth of the post
        }
        return view('edit-post', ['post' => $post]);
    }

    public function SaveChanges(Post $post, Request $request){
        if(auth()->user()->id !== $post['user_id']){
            return redirect('/'); // redirect to the homepage if the user is not the auth of the post
        }

        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']); // we didn't accept links in our blog so the link will remain but will not be active

        $post->update($incomingFields);
        return redirect('/');
    }

    public function deletePost(Post $post){
        if(auth()->user()->id === $post['user_id']){
            $post->delete();
        }
        return redirect('/'); // redirect to the homepage if the user is not the auth of the post
    }
}
*/
class PostController extends Controller
{
    public function deletePost(Post $post)
    {
        if(auth()->user()->id === $post['user_id']){
            $post->delete();
        }
        return redirect()->route('myPosts');
    }
    public function SaveChanges(Post $post, Request $request)
    {
        if(auth()->user()->id !== $post['user_id']){
            return redirect('/');
        }

        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $post->update($incomingFields);
        return redirect()->route('myPosts');
    }
    public function showEditScreen(Post $post)
    {
        if(auth()->user()->id !== $post['user_id']){
            return redirect('/');
        }
        return view('edit-post', ['post' => $post]);
    }
    use AuthorizesRequests;


    public function createPost(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['user_id'] = auth()->id();
        Post::create($incomingFields);
        return redirect('/');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('show', compact('post'));
    }
}
