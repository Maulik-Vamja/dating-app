<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getProfile()
    {
        $user = auth()->user();
        $user->load('availability', 'rates', 'policies', 'contacts', 'addresses', 'primary_address', 'gallery_images');
        return view('frontend.user.profile', [
            'user' => $user,
        ]);
    }
    public function updateProfile()
    {
        $user = auth()->user();
        $user->load('availability', 'rates', 'policies', 'contacts', 'addresses', 'primary_address', 'gallery_images');
        return view('frontend.user.updateProfile', [
            'user' => $user,
        ]);
    }
    public function update(Request $request)
    {
        $user = auth()->user();
        $user->load('availability', 'rates', 'policies', 'contacts', 'addresses', 'primary_address', 'gallery_images');
        $user->update($request->all());
        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
