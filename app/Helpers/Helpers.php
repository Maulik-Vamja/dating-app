<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Support\Str;

if (!function_exists("get_permissions")) {
    // Permission for Admins
    function get_permissions(string $user_type = "normal"): array
    {
        $permissions = array();

        if ($user_type == "admin") {
            $permissions = [
                1   =>  ["permissions" => "access"],                          // Dashboard
                2   =>  ["permissions" => "access,add,edit,view,delete"],     // Users
                3   =>  ["permissions" => "access,add,edit,delete"],          // Role Management
                4   =>  ["permissions" => "access,edit"],                     // CMS Pages
                5   =>  ["permissions" => "access"],                          // Site Configurations
                6   =>  ["permissions" => "access,edit"],                     // App Update Setting
            ];
        }

        return $permissions;
    }
}

if (!function_exists('fire_curl')) {
    function fire_curl($url, $type, $data = NULL)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => strtoupper($type),
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array("Content-Type:application/json"),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return (object) json_decode($response, true);
    }
}


if (!function_exists('number_format_short')) {
    // Show number is cool format, like 1K, 2M, 50K etc
    function number_format_short($n, $precision = 1)
    {
        if ($n < 900) {
            $n_format = number_format($n, $precision);
            $suffix = "";
        } else if ($n < 900000) {
            $n_format = number_format($n / 1000, $precision);
            $suffix = "K";
        } else if ($n < 900000000) {
            $n_format = number_format($n / 1000000, $precision);
            $suffix = "M";
        } else if ($n < 900000000000) {
            $n_format = number_format($n / 1000000000, $precision);
            $suffix = "B";
        } else {
            $n_format = number_format($n / 1000000000000, $precision);
            $suffix = "T";
        }
        if ($precision > 0) {
            $dotzero = "." . str_repeat("0", $precision);
            $n_format = str_replace($dotzero, "", $n_format);
        }
        return $n_format . $suffix;
    }
}

// old function using the db query //
// if (! function_exists('get_unique_string')) {
//     function get_unique_string(string $table, string $field = 'custom_id', int $length = NULL) : string
//     {
//         $length = $length ?? config('utility.custom_length', 12);

//         $string = \Illuminate\Support\Str::random($length);
//         $found = \Illuminate\Support\Facades\DB::table($table)->where([$field => $string])->first();

//         return ($found) ? get_unique_string($table, $field, $length) : $string;
//     }
// }

//new function using the uuid
if (!function_exists('get_unique_string')) {
    function get_unique_string(): string
    {
        return Str::uuid();
    }
}

if (!function_exists('generate_url')) {
    function generate_url(string $path = null, $fallback_url = null, string $disk = "public"): string
    {
        return (!empty($path) && Storage::disk($disk)->exists($path))
            ? Storage::url($path)
            : $fallback_url ?? '//via.placeholder.com/75/EBF4FF/7F9CF5?text=no%20image';
    }
}

if (!function_exists('get_guard')) {
    function get_guard()
    {
        //You Need to define all guard created
        if (Auth::guard("admin")->check()) {
            return "admin";
        } elseif (Auth::guard("web")->check()) {
            return "user";
        } else {
            return "Guard not match";
        }
    }
}

if (!function_exists('generate_avatar_icon')) {
    function generate_avatar_icon(string $name): string
    {
        $name = trim(collect(explode(' ', $name))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));

        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&color=7F9CF5&background=EBF4FF';
    }
}

if (!function_exists('imageUpload')) {
    function imageUpload($request, $attribute = null, $imgPath = null, $oldImgPath = null): ?string
    {
        // dd($request);
        $path = $oldImgPath ??  null;
        if ($request->hasFile($attribute)) {
            if ($oldImgPath) {
                Storage::delete($oldImgPath);
            }
            if ($attribute && $imgPath) {
                $path = $request->file($attribute)->store($imgPath);
            }
        }
        return $path;
    }
}
// old function using the db query //
if (!function_exists('get_unique_username')) {
    function get_unique_username($username, string $table = 'users'): string
    {
        $no_of_users = \Illuminate\Support\Facades\DB::table($table)->where(['user_name' => $username])->count();

        return str_slug(($no_of_users > 0) ? "{$username}{$no_of_users}" : $username);
    }
}
