<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\OrganizationProfile;
use App\Models\Member;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $posts = Post::where('is_published', true)
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        $profile = OrganizationProfile::first();

        return view('welcome', compact('posts', 'profile'));
    }

    public function profile()
    {
        $profile = OrganizationProfile::firstOrFail();
        return view('public.profile', compact('profile'));
    }

    public function structure()
    {
        $allMembers = Member::orderBy('order')->get();

        $bph = $allMembers->filter(function ($member) {
            return strtoupper($member->division) === 'BPH';
        });

        $divisions = $allMembers->reject(function ($member) {
            return strtoupper($member->division) === 'BPH';
        })->groupBy('division');

        return view('public.structure', compact('bph', 'divisions'));
    }

    /**
     * Display a listing of published news.
     */
    public function news()
    {
        $posts = Post::where('is_published', true)
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        return view('public.news.index', compact('posts'));
    }

    /**
     * Display the specified news.
     */
    public function newsDetail($slug)
    {
        $post = \App\Models\Post::where('slug', $slug)->firstOrFail();
        $recentPosts = \App\Models\Post::where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get();

        return view('public.news-detail', compact('post', 'recentPosts'));
    }

    public function gallery()
    {
        $galleries = \App\Models\Gallery::latest()->get();
        return view('public.gallery', compact('galleries'));
    }
}
