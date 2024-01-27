<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnums;
use App\Models\Blog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $recent_blogs = Blog::where('is_active', StatusEnums::ACTIVE->value)->orderBy('created_at', 'DESC')->with(['tags', 'category', 'user'])->take(3)->get();
        $escorts = User::verified()->active()->with(['availability', 'home_address'])->inRandomOrder()->limit(40)->get();
        $today = Carbon::now()->format('l');
        $counts = [
            'total_escorts' => User::verified()->active()->get()->count(),
            'total_online_escorts' => User::verified()->active()->where('availibility->' . $today, 'true')->count(),
            'total_female_escorts' => User::verified()->active()->where('gender', 'female')->where('availibility->' . $today, 'true')->count(),
            'total_male_escorts' => User::verified()->active()->where('gender', 'male')->where('availibility->' . $today, 'true')->count(),
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
        $blogs = Blog::where('is_active', StatusEnums::ACTIVE->value)->orderBy('created_at', 'DESC')->with(['tags', 'category', 'user'])->take(3)->get();
        return view('frontend.about-us', [
            'blogs' => $blogs,
        ]);
    }
}
