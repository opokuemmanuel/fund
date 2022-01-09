<?php

namespace App\Http\Controllers;

use App\assign_project;
use App\Register;
use App\supervisor;
use App\updateSupervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;
use test\Mockery\ReturnTypeObjectTypeHint;

class SupervisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showHomePage()
    {
        $id = Auth::user()->ids;

        $projectCount = assign_project::all();

        $all['pro'] = assign_project::where('supervisor_id',$id)
            ->where('status','=','enabled')->get();
        return  view('supervisor.portal.homepage',compact('projectCount'))->with($all);
    }


    public function index()
    {
       return view('supervisor.add');
    }

    public function all()
    {
        $all['pro'] = supervisor::all();

       return view('supervisor.all')->with($all);
    }

    public function all_supervisors()
    {
       $all_super['sup'] = supervisor::all();
       return view('homepage.homepage')->with($all_super);
    }

    public function add(Request $request)
    {
        $card_image      = $request->file('card_image');
        $photo      = $request->file('photo');

        $card_img  = $card_image->getClientOriginalName();
        $image  = $card_image->getClientOriginalName();

        Image::make($card_image)->save(public_path('/post/'.$card_img));
        Image::make($photo)->save(public_path('/post/'.$image));



        $check_name = supervisor::where('name',$request->name)->get();

         $check_id = supervisor::where('id',$random_number)->get();

         if (sizeof($check_name) == 1){
             return view('supervisor.add')->with('successMsg','name already exist');
         }else{
             while ($istrue){
                 if (sizeof($check_id) == 0){

                     $input = [];
                     $input['ids'] =  "SP".$random_number;
                     $input['name'] = trim($request->name);
                     $input['staff_id'] = trim($request->staff_id);
                     $input['gender'] = trim($request->gender);
                     $input['date'] = trim($request->dob);
                     $input['house_no'] = trim($request->house_no);
                     $input['work'] = trim($request->work);
                     $input['card'] = trim($request->card);
                     $input['card_no'] = trim($request->card_no);
                     $input['card_image'] = $card_img;
                     $input['photo'] = $image;
                     $sign = supervisor::create($input);
                     if ($sign){
                         return view('supervisor.add')->with('successMsg','successful');
                         $istrue = true;
                     }
                 }
             }

         }

    }

    public function delete($id=null)
    {
        supervisor::where('ids',$id)->delete();

        $all['pro'] = supervisor::all();

        return view('supervisor.all')->with($all)->with('successMsg','deleted successful');

    }

    public function ShowEdit($id=null)
    {

        $arr = supervisor::where('ids',$id)->first();

        return view('supervisor.edit')->with(compact('arr'));

    }

    public function assigned(Request $request)
    {
        $all['pro'] = assign_project::where('supervisor_id',$request->ids)
                                    ->where('status','=','enabled')->get();

       // dd($all);
        return view('supervisor.portal.assignedProjects')->with($all);
    }

    public function Update(Request $request)
    {

        $image      = $request->file('card_image');

        $filename    = $image->getClientOriginalName();

        Image::make($image)->save(public_path('/post/'.$filename));

        $product =  updateSupervisor::find($request->ids);

      //  dd($product);

        $product->name = $request->name;
        $product->staff_id = $request->staff_id;
        $product->house_no = $request->house_no;
        $product->work = $request->work;
        $product->card = $request->card_no;
        $product->card_image = $filename;

        $yourdat =  $product->save();

        if ($yourdat){

            $all['pro'] = supervisor::all();

            return view('supervisor.all')->with($all)->with('successMsg','update successful');
        }
    }


}
