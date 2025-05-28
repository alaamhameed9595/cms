<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Post;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home()
    {
        $posts = Post::where('is_published', 1)->latest()->simplepaginate(3);
        $latestPosts = Post::where('is_published', 1)->latest()->take(3)->get();
        $categories = category::get();
        return view('website.blog.index', compact('posts', 'categories', 'latestPosts'));
    }
    public function blog()
    {
        $posts = Post::where('is_published', 1)->latest()->simplepaginate(3);
        $latestPosts = Post::where('is_published', 1)->latest()->take(3)->get();
        $categories = category::get();
        return view('website.blog.index', compact('posts', 'categories', 'latestPosts'));
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $p = Post::where('id', $id); //->increment('views');
        // dd($p);
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
}
