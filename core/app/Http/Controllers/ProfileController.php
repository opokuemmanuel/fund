<?php

namespace App\Http\Controllers;

use App\profile;
use App\project;

use Illuminate\Http\Request;
use Image;


class ProfileController extends Controller
{
    public function Profile(Request $request)
    {

            $image = $request->file('image');

            $imageName = $image->getClientOriginalExtension();

            Image::make($image)->save(public_path('/post/'.$imageName));

            $input = [];
            $input['user_id'] = trim($request->user_id);
            $input['username'] = trim($request->username);
            $input['user_image'] = $imageName;
            $input['status'] = "pending";

            $sign = profile::create($input);
            if ($sign){
                return Response()->json('success');
            }

    }
}
