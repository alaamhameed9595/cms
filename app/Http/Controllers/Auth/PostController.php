<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Request\CreateRequest;
use App\Models\gallery;
use App\Models\Post;
use App\Models\Tag;
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Configuration\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ConditionalRules;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($tag = null)
    {
        //dd(config('cloudinary.cloudinary_url'));
        // If a tag is provided, filter posts by that tag

        if ($tag) {
            $posts = Post::with('category')
                ->whereHas('tags', function ($query) use ($tag) {
                    $query->where('id', $tag);
                })->paginate();
        } else {
            // Otherwise, get all posts
            $posts = Post::with('category')->paginate();
        }
        return view('auth.post.index')->with([
            'posts' => $posts,
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
        $validatedData = $request->validated();
        //dd($request->all());



        $post = new Post();

        $post->title = $request->input('title');
        $post->slug = Str::slug($post->title);
        $post->description = $request->input('description');
        if ($request->hasFile('file')) {
            if (!$request->file('file')->isValid()) {
                abort(400, 'Invalid upload');
            }
            $image = $request->file('file');
            $cloudinaryImage = (new UploadApi())->upload($image->getRealPath(), [
                'folder' => 'posts'
            ])['secure_url'];
            // Optionally, save to gallery table
            $gallery = \App\Models\gallery::create([
                'image' => $cloudinaryImage,
            ]);
            $post->gallery_id = $gallery->id; // Use the gallery ID if it was created
        }

        $post->category_id = $request->input('category_id');
        $post->is_published = $request->input('is_published', false);
        $post->save();
        $this->syncTags($post, $request->input('tags'));
        return redirect()->route('auth.posts')->with(['success', 'Post created successfully!']);
    }
    private function syncTags(Post $post, $tagsInput)
    {
        $tags = collect(explode(',', $tagsInput))
            ->map(fn($tag) => trim($tag))
            ->filter()
            ->map(function ($tagName) {
                $slug = Str::slug($tagName);
                return Tag::firstOrCreate(
                    ['slug' => $slug],
                    ['name' => $tagName]
                )->id;
            });

        $post->tags()->sync($tags);
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
        $request->validate([
            'title' => 'string|max:255',
            'description' => 'min:10|string',
            'category_id' => 'exists:categories,id',
            'is_published' => 'boolean',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $cloudinaryImage = (new UploadApi())->upload($image->getRealPath(), [
                'folder' => 'posts'
            ])['secure_url'];
            $gallery = gallery::findorFail($post->gallery_id);
            if (!$gallery) {
                $gallery = new gallery();
                $gallery->image = $cloudinaryImage;
            } else
                $gallery->image = $cloudinaryImage;
            $gallery->save();
            $post->gallery_id = $gallery->id;
        }
        $title = $request->input('title') ?? $post->title;
        $post->title = $request->input('title') ?? $post->title;
        $post->slug = Str::slug($title);
        $post->description = $request->input('description') ??  $post->description;
        $post->category_id = $request->input('category_id') ?? $post->category_id;
        $post->is_published = $request->input('is_published') ?? $post->is_published;
        $post->save();
        $this->syncTags($post, $request->input('tags'));
        return redirect()->route('auth.posts')->with('success', 'Post updated successfully!');
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

    public function acceptComment($commentId)
    {
        $comment = \App\Models\Comment::findOrFail($commentId);
        $comment->is_approved = true;
        $comment->save();
        return redirect()->back()->with('success', 'Comment accepted!');
    }

    public function rejectComment($commentId)
    {
        $comment = \App\Models\Comment::findOrFail($commentId);
        $comment->is_approved = false;
        $comment->save();
        return redirect()->back()->with('success', 'Comment rejected!');
    }
}
