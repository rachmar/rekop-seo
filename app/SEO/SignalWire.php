<?php

namespace App\SEO;

use Exception;

class SignalWire
{   
    public $apiKeys = [
        ''
    ];

    public static function getVoiceLogs()
    {
        $url = 'https://riztheseowiz.signalwire.com/api/voice/logs?created_after=2023-01-27&page_size=1000';
        $token = 'MzQxYzg5ZmUtMjRmMC00MjY1LThjMWYtYmE5OTNiMjc3ZDBjOlBUNTgxNWJhMmFkMWZkYjRjYmZkNTljNWE1ZmU1YzMwOGI3MjFkMzczMjMxNzU3YWJj';

        $response = self::curl($url, $token);
        $response['summary'] = self::getVoiceSummary($response);

        return $response;
    }

    public static function getVoiceSummary(array $calls)
    {   
        $summary = [
            'outbound' => 0,
            'inbound' => 0,
            'call_completed' => 0,
            'call_no_answer' => 0,
            'charge' => 0,
            'total_calls' => 0,
        ];

        foreach ($calls['data'] as $call) {

            if (isset($call['direction']) &&  $call['direction'] == 'outbound-dial') {
                $summary['outbound'] += 1;
            }

            if (isset($call['direction']) &&  $call['direction'] == 'inbound') {
                $summary['inbound'] += 1;
            }

            if (isset($call['status']) &&  $call['status'] == 'no-answer') {
                $summary['call_completed'] += 1;
            }

            if (isset($call['status']) &&  $call['status'] == 'completed') {
                $summary['call_no_answer'] += 1;
            }

            if (isset($call['charge']) &&  $call['charge'] > 0) {
                $summary['charge'] += $call['charge'];
            }
        }

        $summary['total_calls'] = count($calls['data']);

        return $summary;
    }

    public static function curl($url, $token)
    {
        $ch = curl_init();

        $headers = [
            'Accept: application/json',
            'Authorization: Basic '.$token,
        ];

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $response = curl_exec($ch);

        if ( curl_errno($ch) ) {
            throw new Exception('Signal Wire Error: '.curl_error($ch) );
        }

        curl_close($ch);

        return json_decode($response, true);
    }
    
}