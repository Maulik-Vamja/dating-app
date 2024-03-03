<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $countries = Country::with(['states', 'states.cities']);
        return view('frontend.locations.index', ['countries' => $countries]);
    }
    public function getEscortsByLocation($country, $state = null, $city = null)
    {
        $country = Country::where('iso2', str_replace('_', ' ', $country))->first();
        if ($state !== null) $state = State::where('name', str_replace('_', ' ', $state))->first();
        if ($city !== null) $city = City::where('name', str_replace('_', ' ', $city))->first();
        $escorts = User::with('availability', 'addresses', 'based_in_addresses', 'gallery_images')->whereHas('based_in_addresses', function ($query) use ($country, $state, $city) {
            $query->when($country->id !== null, function ($query) use ($country) {
                $query->where('country_id', $country->id);
            })
                ->when($state->id !== null, function ($query) use ($state) {
                    $query->where('state_id', $state->id);
                })
                ->when($city->id !== null, function ($query) use ($city) {
                    $query->where('city_id', $city->id);
                });
        })->orderBy('created_at', 'desc')
            ->paginate(36);
        $countries = Country::all();
        $location_name = $city->name ?? ($state->name ?? $country->name);
        return view('frontend.escorts.escorts_by_location', compact('escorts', 'countries', 'location_name'));
    }
}
