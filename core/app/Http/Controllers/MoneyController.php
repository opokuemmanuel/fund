<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoneyController extends Controller
{
     public function money()
     {
         $url = 'https://client.teamcyst.com/api_call.php';

         $additional_headers = array(
             'Content-Type: application/json'
         );

         $data = array(
             "price" => 1.0,
             "network" => "mtn",
             "recipient_number" => "+233559565910",
             "sender" => "+233552686375",
             "option" => "rmta",
             "apikey" => "e03101aa27a1194630816c2af91970fdea4669eab417d81ade685f383bcaf807"
         );
         $data = json_encode($data);

         $ch = curl_init($url);
         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
         curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // $data is the request payload in JSON format
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_HTTPHEADER, $additional_headers);

         $server_output = curl_exec($ch);



     }
}
