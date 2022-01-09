<?php

namespace App\Http\Controllers;

use App\Register;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function Register(Request $request)
    {
                    $input = [];
                    $input['userid'] = trim($request->userid);
                    $input['username'] = trim($request->username);
                    $input['email'] = trim($request->email);
                    $input['isVerified'] = "false";
                    $input['dob'] = trim($request->dob);
                    $input['isBlocked'] = "false";
                    $sign = Register::create($input);
                    if ($sign){
                        return Response()->json('success');
                    }
    }


}
