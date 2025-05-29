<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $users = User::count();
        $categories = category::count();
        $posts = post::count();
        return view('auth.dashboard', compact('users', 'categories', 'posts'));
    }
}
