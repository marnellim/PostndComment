<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\UserPostMap;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        
        $selectedCategory = $request->input('category');
        $filter = $request->input('filter');
        $myPosts = $request->has('my_posts') && $filter === 'my_posts';
    
        $postsQuery = Post::query();
    
        if ($selectedCategory) {
            $postsQuery->where('category', $selectedCategory);
        }
    
        // if ($myPosts && $filter === 'my_posts') {
        //     $postsQuery->where('user_id', Auth::id());
        // }
    
        if ($myPosts) {
            $postsQuery->where('user_id', Auth::id());
        }
   
        $posts = $postsQuery->get();
    
        $posts = $postsQuery->latest()->paginate(10);
    
        return view('posts.index', compact('posts', 'myPosts', 'selectedCategory'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1500',
            'category' => 'required',
        ]);
    
        $user_id = auth()->user()->id;
    
        // Create a new post
        $post = new Post();
        $post->name = Auth::user()->name;
        $post->title = $validated['title'];
        $post->description = $validated['description'];
        $post->category = $validated['category'];
        $post->user_id = $user_id;
        $post->save();
    
        // Create a new user-post mapping
        $user_post_map = new UserPostMap();
        $user_post_map->user_id = $user_id;
        $user_post_map->post_id = $post->id;
        $user_post_map->save();
    
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }
    public function edit(Post $post): View
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post): RedirectResponse
            {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'description' => 'required',
            ]);
        
            $post->update($validatedData);
        
            return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
