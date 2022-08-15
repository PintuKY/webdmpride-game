<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestapiIntegrationController extends Controller
{

    public function execCurl($method, $url, $body = []){

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => empty($body) ? null : json_encode($body),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return response(json_decode($response, true));
    }

    public function index()
    {
        
        return $this->execCurl("GET", "http://learning.test/api/student");
    }

    public function ApiPost(Request $request)
    {
        
        return $this->execCurl("POST", "http://learning.test/api/student", $request->all());
    }
}
