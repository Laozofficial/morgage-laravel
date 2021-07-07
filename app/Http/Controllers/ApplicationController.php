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
        $application->bank_name = $request->input('dob');
        $application->bvn = $request->input('bvn');
        $application->driver_licence = $request->input('driver_licence');
        $application->avatar = $request->input('avatar');
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
