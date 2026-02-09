<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalNews = Post::count();
        $publishedNews = Post::where('is_published', true)->count();
        $draftNews = Post::where('is_published', false)->count();
        $latestPosts = Post::latest()->take(5)->get();

        return view('dashboard', compact('totalNews', 'publishedNews', 'draftNews', 'latestPosts'));
    }
}
