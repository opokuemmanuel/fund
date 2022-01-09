<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fileController extends Controller
{
    public function download($report)
    {

        //PDF file is stored under project/public/download/info.pdf
        $file= storage_path(). "/app/public/".$report;

        $headers = array(
            'Content-Type: application/pdf',
        );

        return response()->download($file, $report, $headers);
    }
}
