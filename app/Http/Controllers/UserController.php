<?php

namespace App\Http\Controllers;

use App\Models\TempImage;
use App\Models\UserPolicy;
use App\Models\UserRate;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function getProfile()
    {
        $user = auth()->user();
        $user->load('availability', 'rates', 'policies', 'contacts', 'addresses', 'home_addresses', 'based_in_addresses', 'gallery_images');
        return view('frontend.user.profile', [
            'user' => $user,
        ]);
    }
    public function updateProfile()
    {
        $user = auth()->user();
        $user->load('availability', 'rates', 'policies', 'contacts', 'addresses', 'home_address', 'gallery_images');
        return view('frontend.user.updateProfile', [
            'user' => $user,
        ]);
    }
    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = request()->user()->load('availability', 'rates', 'policies', 'contacts', 'addresses', 'home_address', 'gallery_images');
            switch ($request->input('action')) {
                case 'update_basic':
                    $user->fill($request->all());
                    // $user->primary_address()->delete();
                    // $user->primary_address()->create([
                    //     'custom_id'   => get_unique_string(),
                    //     'country_id' => $request->input('country'),
                    //     'state_id' => $request->input('state'),
                    //     'city_id' => $request->input('city'),
                    //     'is_primary'    => 'y',
                    // ]);
                    break;
                case 'update_personal_details':
                    $user->fill([
                        'availibility'  =>  json_encode($request->input('availibility')),
                        'availibility_description'  =>  $request->input('availibility_description'),
                        'caters_to' => implode(',', $request->input('caters_to')),
                        'age'   => $request->input('age'),
                        'height'    => $request->input('height'),
                        'body_type' => $request->input('body_type'),
                        'ethnicity' => $request->input('ethnicity'),
                        'cup_size' => $request->input('cup_size'),
                        'hair_colour' => $request->input('hair_color'),
                        'eye_colour' => $request->input('eye_color'),
                        'is_trans'  => $request->input('is_trans'),
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
                    $user->policies()->delete();
                    foreach ($request->input('policies') as $policy) {
                        $user->policies()->create([
                            'custom_id' => get_unique_string(),
                            'policy_type_id'  =>  $policy['policy_type_id'],
                            'description'   =>  $policy['description'],
                        ]);
                    }
                    break;
                case 'update_contacts':
                    $user->contacts()->delete();
                    $user->fill(['contact_disclaimer'    =>  $request->input('contact_disclaimer')]);
                    foreach ($request->input('contacts') as $contact) {
                        $user->contacts()->create([
                            'custom_id' => get_unique_string(),
                            'contact_media_id'  =>  $contact['contact_media_id'],
                            'value'   =>  $contact['value'],
                        ]);
                    }
                    break;
                case 'update_gallery_images':
                    if ($request->has('deleted_images') && $request->deleted_images != null) {
                        $deleted_images = explode(',', $request->deleted_images);
                        foreach ($deleted_images as $image) {
                            $user->gallery_images()->where('image', $image)->delete();
                        }
                    }
                    if ($request->images) {
                        $images = explode(',', $request->images);
                        foreach ($images as $image) {
                            $user->gallery_images()->create([
                                'custom_id' => get_unique_string(),
                                'image' => $image,
                            ]);
                        }
                        TempImage::where('user_id', $user->id)->delete();
                    }
                    break;
                case 'update_addresses':
                    $user->addresses()->delete();
                    foreach ($request->input('addresses') as $address_type_id =>  $addresses_of_types) {
                        foreach ($addresses_of_types as $address) {
                            $user->addresses()->create([
                                'custom_id' => get_unique_string(),
                                'address_type_id' => $address_type_id,
                                'country_id' => $address['country'],
                                'state_id' => $address['state'],
                                'city_id' => $address['city'],
                            ]);
                        }
                    }
                    break;
                default:
                    return redirect()->back()->with('error', 'Invalid action');
                    break;
            }
            if (!$user->save()) throw new Exception();
            DB::commit();
            return redirect()->back()->with(['success' => 'Profile updated successfully', 'form_action' => $request->input('action')]);
        } catch (Exception $th) {
            DB::rollBack();
            // dd($th->getMessage());
            return redirect()->back()->with(['errorMsg' => 'Something went wrong', 'form_action' => $request->input('action')]);
        }
    }

    public function storeImage(Request $request)
    {
        try {
            $auth_user = auth()->id();
            $path = $request->file('file')->store("escorts/gallery/{$auth_user}");
            $image = TempImage::create(['custom_id' => get_unique_string(), 'user_id'   =>  $auth_user, 'image' =>  $path]);
            return response()->json(['success'   =>  true, 'image' =>  $path,]);
        } catch (\Throwable $th) {
            return response()->json(['success'   =>  false, 'message'   =>  $th->getMessage(),], 500);
        }
    }

    public function removeImage(Request $request)
    {
        try {
            if (Storage::exists($request->path)) {
                Storage::delete($request->path);
            } else {
                throw new Exception('Image not found');
            }
            return response()->json(['success'   =>  true, 'message'   =>  'Image removed successfully', 'image' => $request->image]);
        } catch (\Throwable $th) {
            return response()->json(['success'   =>  false, 'message'   =>  $th->getMessage(),], 500);
        }
    }
}
