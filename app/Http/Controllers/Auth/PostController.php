<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Request\CreateRequest;
use App\Models\Post;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ConditionalRules;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.post.index')->with([
            'posts' => $posts = Post::with('category')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.post.create')->with([
            'categories' => \App\Models\category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        DB::beginTransaction();
        try {
            $validatedData = $request->validated();
            $gallery = null;
            if ($request->hasFile('file')) {
                $image = $request->file('file');
                //$imageName = time() . '_' . $image->getClientOriginalName();
                $uploadedFileUrl = Cloudinary::upload($image->getRealPath(), [
                    'folder' => 'posts'
                ])->getSecurePath();
                // Optionally, save to gallery table
                $gallery = \App\Models\gallery::create([
                    'image' => $uploadedFileUrl,
                ]);
            }
            $post = new Post();
            $post->title = $request->input('title');
            $post->description = $request->input('description');
            $post->gallery_id = $gallery->id; // Use the gallery ID if it was created
            $post->category_id = $request->input('category_id');
            $post->is_published = $request->input('is_published', false);
            $post->save();
            DB::commit();
            return redirect()->route('auth.posts')->with(['success', 'Post created successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('errors', 'Validation failed: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Fetch the post with its category and gallery
        $post = Post::with(['category', 'gallery'])->findOrFail($id);
        return view('auth.post.show', compact('post'));
    }

    public function publish(string $id)
    {
        $post = Post::findOrFail($id);
        $post->is_published = true;
        $post->save();
        return redirect()->route('auth.posts')->with('success', 'Post published successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = \App\Models\category::all();
        return view('auth.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        DB::beginTransaction();
        $request->validate([
            'title' => 'string|max:255',
            'description' => 'min:10|string',
            'category_id' => 'exists:categories,id',
            'is_published' => 'boolean',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try {
            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $uploadedFileUrl = Cloudinary::upload($image->getRealPath(), [
                    'folder' => 'posts'
                ])->getSecurePath();
                $gallery = \App\Models\gallery::create(['image' => $uploadedFileUrl]);
                $post->gallery_id = $gallery->id;
            }
            $post->title = $request->input('title') ?? $post->title;
            $post->description = $request->input('description') ??  $post->description;
            $post->category_id = $request->input('category_id') ?? $post->category_id;
            $post->is_published = $request->input('is_published') ?? $post->is_published;
            $post->save();
            DB::commit();
            return redirect()->route('auth.posts')->with('success', 'Post updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Update failed: ' . $e->getMessage());
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('auth.posts')->with('success', 'Post deleted successfully!');
    }
}
