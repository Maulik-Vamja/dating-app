<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\AppUpdateSettingsRequest;
use App\Models\AppUpdateSetting;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class UserController extends Controller
{

    private $version = "v.1.0";

    public function getVersion()
    {
        return $this->version;
    }

    public function isAppUpdate(AppUpdateSettingsRequest $request)
    {
        // check AppUpdateSetting  update is 1 or not


        // $is_force= AppUpdateSetting::where('slug', $request->platform)->where('is_force_update',1)->first();
        // if($is_force){
        //     $is_force_update = true;
        // }
        $is_force_update = false;
        $isUpdated = true;
        $versionDetails = AppUpdateSetting::where('slug', $request->platform)->first();
        if ($versionDetails != null) {
            $isUpdated = true;

            if ($versionDetails->build_version > $request->build_version) {
                $isUpdated = false;
            }

            if ($versionDetails->app_version != $request->app_version) {

                $request_app_version = explode('.', $request->app_version);
                $app_version = explode('.', $versionDetails->app_version);

                $isUpdated = false;

                foreach ($request_app_version as $key => $value) {
                    $isUpdated = false;
                    // check 3 argument if any one is greater than return true
                    if ($value > $app_version[$key]) {
                        $isUpdated = true;
                        break;
                    }
                }
            }

            if ($isUpdated == false) {
                if ($versionDetails->is_force_update == 1) {
                    $is_force_update = true;
                }
            }
        }
        // $is_force_update = false;

        // $versionDetails = AppUpdateSetting::where('slug', $request->platform)->first();

        // if ($versionDetails != null) {
        //     $isUpdated = version_compare($request->app_version, $versionDetails->app_version, '<') || $versionDetails->build_version > $request->build_version;

        //     if ($versionDetails->is_force_update == 1 && $isUpdated) {
        //         $is_force_update = true;
        //     }
        // }

        $this->response['data']['is_updated'] = $isUpdated;
        $this->response['data']['is_force_update'] = $is_force_update;
        $this->response['meta']['message'] = "Success";
        $this->status = Response::HTTP_OK;
        return $this->return_response();
    }
}
