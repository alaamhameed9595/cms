<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Post;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home($category = 0)
    {
        if ($category != 0) {
            $posts = Post::where('is_published', 1)
                ->where('category_id', $category)
                ->latest()
                ->simplepaginate(3);
        } else {
            $posts = Post::where('is_published', 1)->latest()->simplepaginate(3);
        }
        $latestPosts = Post::where('is_published', 1)->latest()->take(3)->get();
        $categories = category::get();
        return view('website.blog.index', compact('posts', 'categories', 'latestPosts'));
    }
    public function search(Request $request)
    {
        $query = $request->input('q');
        $posts = Post::search($query)->get();

        return view('posts.search_results', compact('posts', 'query'));
    }


    public function blog()
    {
        $posts = Post::where('is_published', 1)->latest()->simplepaginate(3);
        $latestPosts = Post::where('is_published', 1)->latest()->take(3)->get();
        $categories = category::get();
        return view('website.blog.index', compact('posts', 'categories', 'latestPosts'));
    }
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $title = $post->title; //app()->getLocale() == 'ar' ? $post->title_ar : $post->title_en;
        $desc  = $post->excerpt; // app()->getLocale() == 'ar' ? $post->excerpt_ar : $post->excerpt_en;

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::setCanonical(route('website.post.show', $post));

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl(url()->current());
        OpenGraph::addImage($post->getImageUrlAttribute());
        OpenGraph::addProperty('type', 'article');
        // إضافة وسم اللغة الحالية واللغات البديلة
        OpenGraph::addProperty('locale', app()->getLocale());
        OpenGraph::addProperty('locale:alternate', ['ar', 'en']);

        return view('website.blog.single', compact('post'));
    }




    public function about()
    {
        return view('website.about');
    }
    public function coming_soon()
    {
        return view('website.coming_soon');
    }
    public function contact()
    {
        return view('website.contact');
    }

    public function notFound()
    {
        return view('website.404');
    }
    public function pricing()
    {
        return view('website.pricing');
    }
    public function faq()
    {
        return view('website.faq');
    }
    public function service()
    {
        return view('website.service');
    }
    public function portfolio()
    {
        // You can fetch portfolio items here if needed
        return view('website.portfolio');
    }

    public function portfolioSingle()
    {
        // You can fetch a single portfolio item here if needed
        return view('website.portfolio_single');
    }
    public function index(Request $request)
    {
        $query = $request->input('search');
        if ($query) {
            $posts = \App\Models\Post::search($query)->paginate(10);
        } else {
            $posts = \App\Models\Post::latest()->paginate(10);
        }
        $latestPosts = \App\Models\Post::latest()->take(3)->get();
        $categories = \App\Models\Category::all();

        return view('website.blog.index', compact('posts', 'latestPosts', 'categories', 'query'));
    }
}
