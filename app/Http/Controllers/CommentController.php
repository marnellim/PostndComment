<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\post;
use Illuminate\Http\Request;

class CommentController extends Controller
{ 
    public function index(Request $request)
    {
        $selectedCategory = $request->query('category');
        $posts = Post::where('category', $selectedCategory)->get();
        return view('comments.index', compact('posts', 'selectedCategory'));
    }
    
    
    public function create(Request $request)
    {
        $post_id = $request->input('post_id');
        $post = Post::findOrFail($post_id);
        $user_id = auth()->user()->id;

        return view('comments.create', [
            'post' => $post,
            'user_id' => $user_id
        ]);
    }
   

    public function store(Request $request, $post_id)
    {
        $validatedData = $request->validate([
        'user_id' => 'required',
        'post_id' => 'required',
        'comment' => 'required',
    ]);

        $comment = new Comment();
        $comment->user_id = $validatedData['user_id'];
        $comment->post_id = $post_id;
        $comment->comment = $validatedData['comment'];

        $comment->save();

        return view('comments.index', compact('post'));

    }

    public function show($post_id)
    {
        $post = Post::findOrFail($post_id);
    
        return view('comments.show', compact('post'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(comment $comment)
    {
        //
    }
}
