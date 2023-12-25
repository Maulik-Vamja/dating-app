<?php

namespace App\Http\ViewComposers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\View\View;

/**
 * To Manage View Details
 */
class FrontendComposer
{
    public $recent_blogs = '';
    public $latest_escorts = '';

    public function __construct()
    {
        $this->recent_blogs = Blog::orderBy('created_at', 'DESC')->with(['tags', 'category', 'user'])->take(4)->get();
        $this->latest_escorts = User::latest()->with(['availability', 'primary_address'])->limit(4)->get();
    }

    public function compose(View $view)
    {

        $view->with([
            'recent_blogs' => $this->recent_blogs,
            'latest_escorts' => $this->latest_escorts,
        ]);
    }
}
