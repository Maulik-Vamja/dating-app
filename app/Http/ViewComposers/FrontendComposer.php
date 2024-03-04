<?php

namespace App\Http\ViewComposers;

use App\Enums\StatusEnums;
use App\Models\Blog;
use App\Models\City;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\View\View;

/**
 * To Manage View Details
 */
class FrontendComposer
{
    public $recent_blogs = '';
    public $latest_escorts = '';
    public $settings = '';
    public $top12CitiesOfUserRegistered = '';

    public function __construct()
    {
        $this->recent_blogs = Blog::where('is_active', StatusEnums::ACTIVE->value)->orderBy('created_at', 'DESC')->with(['tags', 'category', 'user'])->take(4)->get();

        $this->latest_escorts = User::latest()->with(['availability', 'addresses'])->limit(4)->get();
        $this->settings = Setting::pluck('value', 'constant');
        $this->top12CitiesOfUserRegistered = City::whereHas('users', function ($query) {
            return $query->where('address_type_id', 1);
        })->withCount(['users' => function ($query) {
            return $query->where('address_type_id', 1);
        }])->with('state', 'country')->orderByDesc('users_count')->limit(12)->get();
    }

    public function compose(View $view)
    {

        $view->with([
            'recent_blogs' => $this->recent_blogs,
            'latest_escorts' => $this->latest_escorts,
            'sitesetting' => $this->settings,
            'mend_sign' => '<span class="mendatory">*</span>',
            'top12CitiesOfUserRegistered' => $this->top12CitiesOfUserRegistered
        ]);
    }
}
