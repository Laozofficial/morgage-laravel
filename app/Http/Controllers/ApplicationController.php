<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function save_application(Request $request)
    {
        $application = new Application;
        $application->full_name = $request->input('full_name');
        $application->work_place = $request->input('work_place');
        $application->bank_name = $request->input('bank_name');
        $application->bvn = $request->input('bvn');
        $application->dob = $request->input('dob');
        if ($request->hasFile('driver_licence')) {
            $file = $request->file('driver_licence');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $driver_licence =  '-1-' . time() . '.' . $extension;
            $path = Env('PUBLIC_IMAGE_PATH');
            $upload = $file->move($path, $driver_licence);

            $application->driver_licence = $driver_licence;
        }
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $avatar =  '-1-' . time() . '.' . $extension;
            $path = Env('PUBLIC_IMAGE_PATH');
            $upload = $file->move($path, $avatar);

            $application->avatar = $avatar;
        }
        $application->address = $request->input('address');
        $application->email = $request->input('email');
        $application->phone_number = $request->input('phone_number');
        $application->save();

        $response = [
            'success' => 'application saved'
        ];

        return response($response, 200);
    }
}
