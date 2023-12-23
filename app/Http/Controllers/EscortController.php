<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EscortController extends Controller
{
    public function getEscort(User $user)
    {
        $user->load('availiability', 'rates', 'policies', 'contacts', 'addresses', 'primary_address', 'gallery_images');

        $similar_escorts = User::whereHas('addresses', function ($query) use ($user) {
            $query->where('country_id', $user->primary_address->country_id ?? 1)->groupBy('country_id');
        })->where('id', '!=', $user->id)->limit(12)->get();

        return view('frontend.escorts.view', ['escort' => $user, 'similar_escorts' => $similar_escorts]);
    }

    public function getProfile(User $user)
    {
        $user->load('availiability', 'rates', 'policies', 'contacts', 'addresses', 'primary_address', 'gallery_images');
        return view('frontend.escorts.profile', ['escort' => $user]);
    }
}
