<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $recent_blogs = Blog::orderBy('created_at', 'DESC')->with(['tags', 'category', 'user'])->take(3)->get();
        $escorts = User::with(['availability', 'primary_address'])->limit(10)->latest()->get();
        $today = strtolower(Carbon::now()->format('l'));
        $counts = [
            'total_escorts' => User::all()->count(),
            'total_online_escorts' => User::where('availibility->' . $today, true)->count(),
            'total_female_escorts' => User::where('gender', 'female')->count(),
            'total_male_escorts' => User::where('gender', 'male')->count(),
        ];
        return view('welcome', [
            'blogs' => $recent_blogs, 'escorts' => $escorts, 'counts' => $counts
        ]);
    }

    public function contactUs()
    {
        return view('frontend.contact-us');
    }

    public function aboutUs()
    {
        $blogs = Blog::orderBy('created_at', 'DESC')->with(['tags', 'category', 'user'])->take(3)->get();
        return view('frontend.about-us', [
            'blogs' => $blogs,
        ]);
    }
}
