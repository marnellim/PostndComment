<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);
        return view('comments.create', compact('post'));
    }

    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'post_id' => 'required|exists:posts,id',
        'comment' => 'required|string|max:255',
    ]);

    $comment = new Comment();
    $comment->post_id = $validatedData['post_id'];
    $comment->comment = $validatedData['comment'];

    $comment->save();

    return redirect()->back()->with('success', 'Comment submitted successfully.');
    }

    public function show(comment $comment)
    {
        //
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
