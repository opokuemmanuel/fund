<?php

namespace App\Http\Controllers;

use App\assign_project;
use App\project;
use App\Register;
use App\supervisor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        $name = $request->username;

        if(Auth::attempt($credentials)){
            $user = User::where('username',$request->username)->first();
            if ($user->is_admin())
            {
                $accountsCount = Register::all();
                $supervisorsCount = supervisor::all();
                $projectCount = project::all();
                $all['pro'] = supervisor::all();
                return view('admin.homepage.homepage',compact('accountsCount','supervisorsCount'),compact('projectCount'))->with($all);

            }else{

                $id = Auth::user()->ids;

                $projectCount = assign_project::all();

                $all['pro'] = assign_project::where('supervisor_id',$id)
                    ->where('status','=','enabled')->get();
                return  view('supervisor.portal.homepage',compact('projectCount'))->with($all);
            }

        }else{
            // dd($credentials);
            return view('admin.login')->with('successMsg','Incorrect username or password');
        }
    }
}
