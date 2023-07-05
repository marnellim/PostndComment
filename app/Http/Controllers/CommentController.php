<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\comment;
use App\Models\PostCommentMap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;



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
   

    public function store(Request $request, $post_id) : RedirectResponse
    {

        $validatedData = $request->validate([
            'comment' => 'required|string',
        ]);
    
        $comment = new comment;
        $comment->comment = $validatedData['comment'];
        $comment->save();

        // Create a new user-post mapping
        $post_comment_map = new PostCommentMap();
        $post_comment_map->user_id = $request->user_id;
        $post_comment_map->post_id = $post_id;
        $post_comment_map->comment_id = $comment->id; 
        $post_comment_map->save();

        // $comment = new PostCommentMap;
        // $comment->comment = $validatedData['comment'];
        // $comment->user_id = $request->user_id;
        // $comment->post_id = $post_id;
        // $comment->save();
    
        return redirect()->route('comments.create', ['post_id' => $post_id])
            ->with('success', 'Comment posted successfully');
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
