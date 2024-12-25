<?php

namespace App\Http\Controllers\backend;
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function dashboard(){
        return view('backend.dashboard');
    }
    public function option(){
        return view('backend.option');
    }
    public function create()
    {
        $authors = User::all(); // Get all authors
        $posts = Post::all(); // Get all posts for parent selection
        return view('posts.create', compact('authors', 'posts'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'authorId' => 'required|exists:users,id',
            'parentId' => 'nullable|exists:posts,id',
            'title' => 'required|string|max:75',
            'metaTitle' => 'nullable|string|max:100',
            'slug' => 'required|string|max:100|unique:posts,slug',
            'summary' => 'nullable|string',
            'published' => 'boolean',
            'createdAt' => 'required|date',
            'updatedAt' => 'nullable|date',
            'publishedAt' => 'nullable|date',
            'content' => 'nullable|string',
        ]);

        Post::create($validated);

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }
}
