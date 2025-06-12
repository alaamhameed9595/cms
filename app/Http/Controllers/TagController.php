<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->latest()->paginate(10);
        $posts = $tag->posts()->where('is_published', 1)->latest()->simplepaginate(3);
        $latestPosts = Post::where('is_published', 1)->latest()->take(3)->get();
        $categories = category::get();
        return view('website.blog.index', compact('tag', 'posts', 'categories', 'latestPosts'));
    }

    public function index()
    {
        $tags = Tag::all();
        return view('auth.tag.index', compact('tags'));
    }

    public function create()
    {
        return view('auth.tag.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tags,name',
            'slug' => 'required|string|max:255|unique:tags,slug',
        ]);

        Tag::create($request->only('name', 'slug'));

        return redirect()->route('auth.tags.index')->with('success', 'Tag created successfully!');
    }
    public function edit(Tag $tag)
    {
        return view('auth.tag.edit', compact('tag'));
    }
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tags,name,' . $tag->id,
            'slug' => 'required|string|max:255|unique:tags,slug,' . $tag->id,
        ]);

        $tag->update($request->only('name', 'slug'));

        return redirect()->route('auth.tags.index')->with('success', 'Tag updated successfully!');
    }
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return redirect()->route('auth.tags.index')->with('success', 'Tag deleted successfully!');
    }
    public function updateName(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tags,name,' . $tag->id,
        ]);
        $tag->name = $request->name;
        $tag->save();

        return response()->json(['success' => true]);
    }
    public function posts(Tag $tag)
    {

        $posts = $tag->posts()->latest()->paginate(10);
        return view('auth.tag.posts', compact('tag', 'posts'));
    }
}
