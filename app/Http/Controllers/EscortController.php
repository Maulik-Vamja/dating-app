<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EscortController extends Controller
{
    public function getEscort(User $user)
    {
        $user->load('availability', 'rates', 'policies', 'contacts', 'addresses', 'home_address', 'home_addresses', 'based_in_addresses', 'gallery_images');

        $similar_escorts = User::whereHas('based_in_addresses', function ($query) use ($user) {
            $query->where('country_id', $user->home_address->country_id ?? 1)->groupBy('country_id');
        })->where('id', '!=', $user->id)->limit(10)->get();
        // dd($user->id, $user->home_address->country_id);
        return view('frontend.escorts.view', ['escort' => $user, 'similar_escorts' => $similar_escorts]);
    }
}
