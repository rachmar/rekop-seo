<?php

namespace App\SEO;

use Exception;

class SignalWire
{   
    public static function call(string $endpoint, string $method = 'GET', array $postData = [])
    {
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
        ];

        $curl = curl_init();

        $url = 'https://'.env('SIGNAL_WIRE_SPACE').$endpoint;
        $authToken =  env('SIGNAL_WIRE_PROJECT').':'.env('SIGNAL_WIRE_TOKEN');

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_USERPWD, $authToken);

        if (count($postData) > 0) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postData));
        }

        $response = curl_exec($curl);

        curl_close($curl);

        if ( curl_errno($curl) ) {
            throw new Exception('Signal Wire Error: '.curl_error($curl) );
        }
        
        return json_decode($response, true);
    }
    
}