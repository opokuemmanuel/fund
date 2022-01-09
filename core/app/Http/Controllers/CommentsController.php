<?php

namespace App\Http\Controllers;

use App\comments;
use App\Register;
use Egulias\EmailValidator\Warning\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function add_comments(Request $request)
    {
        $input = [];
        $input['userid'] = trim($request->userid);
        $input['message'] = trim($request->message);
        $input['project_id'] = trim($request->project_id);
        $sign = comments::create($input);
        if ($sign){
            return Response()->json('success');
        }
    }
}
