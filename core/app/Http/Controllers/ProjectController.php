<?php

namespace App\Http\Controllers;

use App\assign_project;
use App\profile;
use App\project;
use App\Register;
use App\searchAssign;
use App\supervisor;
use App\updateSupervisor;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function add_project(Request $request)
    {
                        $input = [];

                        $input['userid'] = trim($request->userid);
                        $input['project_id'] = trim($request->project_id);
                        $input['title'] = trim($request->title);
                        $input['description'] = trim($request->description);
                        $input['isBLocked'] = "false";
                        $input['budget'] = trim($request->budget);
                        $sign = project::create($input);
                        if ($sign){
                            return Response()->json('success');
                        }
    }

    public function assign_project(Request $request)
    {


       $checkProject_id = assign_project::where('project_id',$request->project_id)->get();

       if (sizeof($checkProject_id)!=1){
           $assign=[];
           $assign['project_id'] = trim($request->project_id);
           $assign['user_id']= trim($request->user_id);
           $assign['budget']= trim($request->budget);
           $assign['username']= trim($request->username);
           $assign['supervisor_id']= trim($request->supervisor_id);
           $assign['status']= 'enabled';

           $result = assign_project::create($assign);

           if ($result){
               $accountsCount = Register::all();
               $supervisorsCount = supervisor::all();
               $projectCount = project::all();
               $all['pro'] = supervisor::all();
               return view('admin.homepage.homepage',compact('accountsCount','supervisorsCount'),compact('projectCount'))->with($all)->with('successMsg','project assigned successfully');

           }
       }else{
           $accountsCount = Register::all();
           $supervisorsCount = supervisor::all();
           $projectCount = project::all();
           $all['pro'] = supervisor::all();
           return view('admin.homepage.homepage',compact('accountsCount','supervisorsCount'),compact('projectCount'))->with($all)->with('successMsg','project already assigned');

       }

    }

   public function all_assigned_projects ()
   {
       $all['pro'] = assign_project::all();

       return view('project.assignedProject')->with($all);
   }


   public function showEdit($id=null)
   {
         $arr = assign_project::where('project_id',$id)->first();

         $all['all'] = supervisor::all();

         return view('project.editAssignedProject')->with(compact('arr'))->with($all);
   }

    public function Update_assignedProject(Request $request)
    {

        $assign =  searchAssign::find($request->project_id);

         // dd($assign);

        $assign->supervisor_id = $request->supervisor;
        $assign->status = $request->status;

        $yourdat =  $assign->save();

        if ($yourdat){

            $all['pro'] = assign_project::all();

            return view('project.assignedProject')->with($all)->with('successMsg','project updated successful');
        }
    }

    public function delete($id=null)
    {
        assign_project::where('project_id',$id)->delete();

        $all['pro'] = assign_project::all();

        return view('project.assignedProject')->with($all)->with('successMsg','supervisor revoked');

    }



}
