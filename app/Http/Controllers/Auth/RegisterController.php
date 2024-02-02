<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('frontend.auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_name' => ['required', 'string', 'max:255', 'unique:users,user_name'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'full_name' => ['required', 'string', 'max:255'],
            'short_description' => ['nullable', 'string', 'max:255'],
            'pronouns' => ['nullable', 'string', 'max:255'],
            'user_age'   => ['required', 'numeric', 'between:18,60'],
            'body_type' => ['nullable'],
            'height' => ['required', 'numeric'],
            'ethnicity' => ['nullable'],
            'gender'    => ['required', 'string', 'in:male,female,non-binary'],
        ], [
            'user_age.required' =>  trans('validation.required', ['attribute' => 'age']),
            'user_age.numeric'  => trans('validation.numeric', ['attribute' => 'age']),
            'user_age.between'    =>  trans('validation.numeric.between', ['attribute' => 'age', 'min' => 18, 'max' => 60]),
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'custom_id' => get_unique_string(),
            'user_name' => $data['user_name'] ?? null,
            'email' => $data['email'] ?? null,
            'password' => Hash::make($data['password']),
            'full_name' => $data['full_name'] ?? null,
            'short_description' => $data['short_description'] ?? null,
            'pronouns' => $data['pronouns'] ?? null,
            'age'   => $data['user_age'],
            'body_type' => $data['body_type'] ?? null,
            'height' => $data['height'] ?? null,
            'ethnicity' => $data['ethnicity'] ?? null,
            'gender' => $data['gender'] ?? null,
        ]);
    }
}
