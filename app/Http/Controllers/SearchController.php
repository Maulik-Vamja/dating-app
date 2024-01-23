<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        // dd($request->all());
        $escorts = User::with('availability', 'addresses', 'based_in_addresses', 'gallery_images')
            ->when($request->has('gender'), function ($query) use ($request) {
                $query->where('gender', $request->gender);
            })
            ->when($request->has(['min_age', 'max_age']), function ($query) use ($request) {
                $query->whereBetween('age', [$request->min_age, $request->max_age]);
            })
            ->when($request->country !== null, function ($query) use ($request) {
                $query->whereHas('based_in_addresses', function ($query) use ($request) {
                    $query->where('country_id', $request->country);
                });
            })
            ->when($request->state !== null, function ($query) use ($request) {
                $query->whereHas('based_in_addresses', function ($query) use ($request) {
                    $query->where('state_id', $request->state);
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(12);
        $countries = Country::all();
        return view('frontend.escorts.escorts-list', [
            'escorts' => $escorts,
            'countries' => $countries,

        ]);
    }
}
