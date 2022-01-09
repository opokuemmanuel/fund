<?php

namespace App\Http\Controllers;

use App\project;
use App\Register;
use App\reports;
use App\supervisor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class homepageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard(){
        $accountsCount = Register::all();
        $supervisorsCount = supervisor::all();
        $projectCount = project::all();
        $all['pro'] = supervisor::all();
        return view('admin.homepage.homepage',compact('accountsCount','supervisorsCount'),compact('projectCount'))->with($all);

    }

    public function show_register(){
        return view('admin.register');
    }

    public function Register(Request $request)
    {
        $checkUsername = User::where('username',$request->user)->get();
        if (sizeof($checkUsername) == 1){
            return view('admin.register')->with('successMsg','username already exist');

        }else{
            $input = [];
            $input['ids'] = "none";
            $input['username'] = trim($request->user);
            $input['password'] = Hash::make($request->password);
            $input['role'] = "1";

            $sign = User::create($input);
            if ($sign){
                return view('admin.register')->with('successMsg','Registration successful');
            }
        }

    }

    public function Reports(Request $request)
    {
        $allReports['pro'] = reports::all();
        return view('supervisor.reports')->with($allReports);
    }

}
