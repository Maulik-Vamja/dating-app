<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\User;
use App\Enums\StatusEnums;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\UserRequest;
use App\Models\TempImage;
use App\Models\UserRate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            extract($this->DTFilters($request->all()));
            $records = [];
            $users = User::query();

            if ($search != '') {
                $users->where(function ($query) use ($search) {
                    $query->where('full_name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            }

            $count = $users->count();

            $records['recordsTotal'] = $count;
            $records['recordsFiltered'] = $count;
            $records['data'] = [];

            $users = $users->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order)->latest()->get();

            foreach ($users as $user) {

                $params = [
                    'checked' => ($user->is_active ? 'checked' : ''),
                    'getaction' => $user->is_active,
                    'class' => '',
                    'id' => $user->custom_id,
                ];

                $records['data'][] = [
                    'id' => $user->id,
                    'full_name' => $user->full_name,
                    'email' => '<a href="mailto:' . $user->email . '" >' . $user->email . '</a>',
                    'contact_no' => '',
                    'is_active' => view('admin.layouts.includes.switch', compact('params'))->render(),
                    'action' => view('admin.layouts.includes.actions')->with(['custom_title' => 'User', 'id' => $user->custom_id], $user)->render(),
                    'updated_at' => $user->updated_at,
                    'checkbox' => view('admin.layouts.includes.checkbox')->with('id', $user->custom_id)->render(),
                ];
            }
            return $records;
        }
        return view('admin.pages.users.index')->with(['custom_title' => 'Escorts']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.users.create')->with(['custom_title' => 'Escort']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try {
            $userRequest = $request->validated();
            $userRequest['custom_id']   =   get_unique_string();
            $userRequest['password']    =   Hash::make(str_random(config('utility.default_password')));
            $image = imageUpload($request, "profile_photo", "users/profile_photo");
            $userRequest['profile_photo'] = $image;
            User::create($userRequest);
            flash('User account created successfully!')->success();
        } catch (Exception $e) {
            Log::channel("custom_log")->info($e->getMessage() . $e->getFile() . $e->getLine());
            flash('Unable to save avatar. Please try again later.')->error();
        }
        return redirect(route('admin.escorts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $escort)
    {
        return view('admin.pages.users.show', ['user' => $escort])->with(['custom_title' => 'Escort']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $escort)
    {
        return view('admin.pages.users.edit', ['user' => $escort])->with(['custom_title' => 'Escort']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(UserRequest $request, User $escort)
    public function update(Request $request, User $escort)
    {
        try {
            DB::beginTransaction();
            if (!empty($request->action) && $request->action == 'change_status') {
                $content = ['status' => 204, 'message' => "something went wrong"];
                if ($escort) {
                    $escort->is_active = ($request->value) ? StatusEnums::ACTIVE : StatusEnums::INACTIVE;
                    if ($escort->save()) {
                        DB::commit();
                        $content['status'] = 200;
                        $content['message'] = "Status updated successfully.";
                    }
                }
                return response()->json($content);
            } else {
                $escort->load('availability', 'rates', 'policies', 'contacts', 'addresses', 'home_address', 'gallery_images');
                switch ($request->input('action')) {
                    case 'update_basic':
                        $escort->fill($request->all());
                        // $escort->primary_address()->delete();
                        // $escort->primary_address()->create([
                        //     'custom_id'   => get_unique_string(),
                        //     'country_id' => $request->input('country'),
                        //     'state_id' => $request->input('state'),
                        //     'city_id' => $request->input('city'),
                        //     'is_primary'    => 'y',
                        // ]);
                        break;
                    case 'update_personal_details':
                        $escort->fill([
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
                        // dd($escort);
                        break;
                    case 'update_rates':
                        UserRate::where('user_id', $escort->id)->delete();
                        foreach (array_reduce($request->input('rates'), 'array_merge', array()) as $rate) {
                            $escort->rates()->create([
                                'custom_id' => get_unique_string(),
                                'rate_type_id'  =>  $rate['rate_type_id'],
                                'rate'  =>  $rate['rate'],
                                'duration'  =>  $rate['duration'],
                                'description'   =>  $rate['description'],
                            ]);
                        }
                        break;
                    case 'update_policies':
                        $escort->policies()->delete();
                        foreach ($request->input('policies') as $policy) {
                            $escort->policies()->create([
                                'custom_id' => get_unique_string(),
                                'policy_type_id'  =>  $policy['policy_type_id'],
                                'description'   =>  $policy['description'],
                            ]);
                        }
                        break;
                    case 'update_contacts':
                        $escort->contacts()->delete();
                        $escort->fill(['contact_disclaimer'    =>  $request->input('contact_disclaimer')]);
                        foreach ($request->input('contacts') as $contact) {
                            $escort->contacts()->create([
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
                                $escort->gallery_images()->where('image', $image)->delete();
                            }
                        }
                        if ($request->images) {
                            $images = explode(',', $request->images);
                            foreach ($images as $image) {
                                $escort->gallery_images()->create([
                                    'custom_id' => get_unique_string(),
                                    'image' => $image,
                                ]);
                            }
                            TempImage::where('user_id', $escort->id)->delete();
                        }
                        break;
                    case 'update_addresses':
                        $escort->addresses()->delete();
                        foreach ($request->input('addresses') as $address_type_id =>  $addresses_of_types) {
                            foreach ($addresses_of_types as $address) {
                                $escort->addresses()->create([
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
                if (!$escort->save()) throw new Exception();
                flash('Escort details updated successfully!')->success();
                DB::commit();
                // return redirect(route('admin.escorts.index'));
                return redirect()->back();
            }
        } catch (QueryException $e) {
            Log::channel("custom_log")->info($e->getMessage() . $e->getFile() . $e->getLine());
            DB::rollback();
            return redirect()->back()->flash('error', "Something went wrong");
        } catch (Exception $e) {
            DB::rollback();
            Log::channel("custom_log")->info($e->getMessage() . $e->getFile() . $e->getLine());
            return redirect()->back()->with('error', "Something went wrong");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (!empty($request->action) && $request->action == 'delete_all') {
            $content = ['status' => 204, 'message' => "something went wrong"];

            $users_profile_photos = User::whereIn('custom_id', explode(',', $request->ids))->pluck('profile_photo')->toArray();
            foreach ($users_profile_photos as $image) {
                if (!empty($image)) {
                    Storage::delete($image);
                }
            }
            User::whereIn('custom_id', explode(',', $request->ids))->delete();
            $content['status'] = 200;
            $content['message'] = "Escort deleted successfully.";
            $content['count'] = User::all()->count();
            return response()->json($content);
        } else {
            $escort = User::where('custom_id', $id)->firstOrFail();
            if ($escort->profile_photo) {
                Storage::delete($escort->profile_photo);
            }
            $escort->delete();
            if (request()->ajax()) {
                $content = array('status' => 200, 'message' => "Escort deleted successfully.", 'count' => User::all()->count());
                return response()->json($content);
            } else {
                flash('Escort deleted successfully.')->success();
                return redirect()->route('admin.escorts.index');
            }
        }
    }

    public function trashed()
    {
        $users = User::onlyTrashed()->get();
        return view('admin.pages.users.trashed', compact('users'))->with(['custom_title' => 'TRASHED']);
    }

    public function trashedData(Request $request)
    {
        extract($this->DTFilters($request->all()));
        $records = [];
        $users = User::orderBy($sort_column, $sort_order);

        if ($search != '') {
            $users->where(function ($query) use ($search) {
                $query->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('contact_number', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $count = $users->count();

        $records['recordsTotal'] = $count;
        $records['recordsFiltered'] = $count;
        $records['data'] = [];

        $users = $users->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

        $users = $users->onlyTrashed()->get();
        foreach ($users as $user) {

            $params = [
                'checked' => ($user->is_active ? 'checked' : ''),
                'display' => ($user->is_display == 'y' ? 'checked' : ''),
                'getaction' => $user->is_active,
                'class' => '',
                'id' => $user->id,
            ];

            $records['data'][] = [
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => '<a href="mailto:' . $user->email . '" >' . $user->email . '</a>',
                'contact_number' => $user->contact_number ? '<a href="tel:' . $user->contact_number . '" >' . $user->contact_number . '</a>' : 'N/A',
                'active' => view('admin.layouts.includes.switch', compact('params'))->render(),
                'display' => view('admin.layouts.includes.switchDisplay', compact('params'))->render(),
                'action' => view('admin.layouts.includes.actions')->with(['custom_title' => 'User', 'id' => $user->id], $user)->render(),
                'checkbox' => view('admin.layouts.includes.checkbox')->with('id', $user->id)->render(),
            ];
        }
        // dd($records);

        return $records;
    }

    public function changePassword(Request $request, User $escort)
    {
        $request->validate([
            'password' => 'required|min:8|max:15',
            'confirm_password' => 'required|min:8|max:15|same:password',
        ]);
        $escort->password = Hash::make($request->password);
        $escort->save();
        flash('Password changed successfully!')->success();
        return redirect()->back();
    }
}
