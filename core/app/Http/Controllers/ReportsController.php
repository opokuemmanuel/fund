<?php

namespace App\Http\Controllers;

use App\assign_project;
use App\project;
use App\Register;
use App\reports;
use App\supervisor;
use App\updateSupervisor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class   ReportsController extends Controller
{
    public function showReports(Request $request)
    {
        $all_assigned_projects['pro'] = assign_project::where('supervisor_id',$request->uuid)
                                                         ->where('status','=','enabled')->get();

        return view('supervisor.portal.addReport')->with($all_assigned_projects);
    }


    public function upload(Request $request)
    {
        $cl = $request->supervisor_id;

        if ($request->hasFile('pdf')) {

            $files = $request->file('pdf'); // will get all files

            $file_name = $files->getClientOriginalName(); //Get file original name

            $files->storeAs('/public/',$request->supervisor_id."_".$file_name);

            $course  = new reports();
            $course->supervisor_id = $request->supervisor_id;
            $course->report = $request->supervisor_id."_".$file_name;
            $course->project_id = $request->project_id;
            $course->message = $request->message;

            $course->save();

            $all_assigned_projects['pro'] = assign_project::where('supervisor_id',$request->uuid)
                ->where('status','=','enabled')->get();



            if ($course){
                return view('supervisor.portal.addReport')->with('successMsg','report Uploaded successfully')->with($all_assigned_projects);
            }else{
                return view('supervisor.portal.addReport')->with('successMsg','cannot Upload report')->with($all_assigned_projects);
            }
        }

    }

    public  function reports(Request $request)
    {
       $allReports['pro'] = reports::where('supervisor_id',$request->id)->get();
       return view('supervisor.portal.viewReport')->with($allReports);
    }

    public function supervisor()
    {
       return view ('supervisor.portal.registration');
    }

    public function LoginSupervisor()
    {
        return view('admin.login');
    }

    public function CreateSupervisor(Request $request)
    {
        $product =  updateSupervisor::find($request->ids);

        $pass1 = $request->password;
         $pass2 = $request->c_password;
        //  dd($product);
        if ($product){
            if ($pass1 != $pass2){
                return view('supervisor.portal.registration')->with('successMsg','password does not match');

            }else{
                $checkUsername = User::where('username',$request->username)
                                       ->Orwhere('ids',$request->ids)->get();
                if (sizeof($checkUsername) == 1){
                    return view('supervisor.portal.registration')->with('successMsg','username or id already exist');

                }else{
                    $input = [];
                    $input['ids'] = $request->ids;
                    $input['username'] = $request->username;
                    $input['password'] = Hash::make($request->password);
                    $input['roleStatus'] = "0";
                    $yourdat = User::create($input);

                    if ($yourdat){
                        return view('supervisor.portal.registration')->with('successMsg','registration successful');
                    }

                }

            }

        }else{
            return view('supervisor.portal.registration')->with('successMsg','invalid Id');
        }


    }

    public function LoginSuper(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if(Auth::attempt($credentials)){

            $accountsCount = Register::all();
            $supervisorsCount = supervisor::all();
            $projectCount = project::all();
            return view('admin.homepage.homepage',compact('accountsCount','supervisorsCount'),compact('projectCount'));


        }else{
            // dd($credentials);
            return view('admin.login')->with('successMsg','Incorrect username or password');
        }

    }
}
