<?php

namespace App\Http\Controllers;

use App\Models\UserRate;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // dd($request->all());
        DB::beginTransaction();
        try {
            $user = request()->user()->load('availability', 'rates', 'policies', 'contacts', 'addresses', 'primary_address', 'gallery_images');
            switch ($request->input('action')) {
                case 'update_basic':
                    $user->fill($request->all());
                    break;
                case 'update_personal_details':
                    $request['availibility'] = json_encode($request->input('availibility'));
                    $user->fill([
                        'availibility'  =>  json_encode($request->input('availibility')),
                        'availibility_description'  =>  $request->input('availibility_description'),
                        'caters_to' => $request->input('caters_to'),
                        'age'   => $request->input('age'),
                        'height'    => $request->input('height'),
                        'body_type' => $request->input('body_type'),
                        'ethnicity' => $request->input('ethnicity'),
                        'cup_size' => $request->input('cup_size'),
                        'hair_colour' => $request->input('hair_color'),
                        'eye_colour' => $request->input('eye_color'),
                    ]);
                    // dd($user);
                    break;
                case 'update_rates':
                    UserRate::where('user_id', $user->id)->delete();
                    foreach (array_reduce($request->input('rates'), 'array_merge', array()) as $rate) {
                        $user->rates()->create([
                            'custom_id' => get_unique_string(),
                            'rate_type_id'  =>  $rate['rate_type_id'],
                            'rate'  =>  $rate['rate'],
                            'duration'  =>  $rate['duration'],
                            'description'   =>  $rate['description'],
                        ]);
                    }
                    break;
                case 'update_policies':
                    break;
                case 'update_contacts':
                    break;
                case 'update_addresses':
                    return $this->updateAddresses($request);
                    break;
                case 'update_gallery_images':
                    return $this->updateGalleryImages($request);
                    break;
                default:
                    return redirect()->back()->with('error', 'Invalid action');
                    break;
            }
            if (!$user->save()) throw new Exception();
            DB::commit();
            return redirect()->back()->with('success', 'Profile updated successfully');
        } catch (Exception $th) {
            DB::rollBack();
            dd($th->getMessage());
            return redirect()->back()->with('errorMsg', 'Something went wrong');
        }
    }
}
