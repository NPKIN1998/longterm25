<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use GuzzleHttp\Client;

class DepositController extends Controller
{
    public function index()
    {
        return Inertia::render("User/Deposit");
    }
    public function makeRequest()
    {
        $client = new Client();

        $apikey = 'rbiHBSXY0iMlXRFgsyWKV3IFu5TpHOQVlBR93JoE38ITBzC5jZ';
        $username = 'kintech';
        $channel_id = '272';

        // Extract the required data from the GET parameters
        $amount = $_GET['amount'];
        $phone = $_GET['phone'];
        $user_reference = 'user'; // Replace with your desired user reference
        $callback_url = 'https://grabinternational.com.ng';
        $option = [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'api_key' => $apikey,
                'username' => $username,
                'amount' => $amount,
                'phone' => $phone,
                'user_reference' => $user_reference,
                'channel_id' => $channel_id,
                'callback' => $callback_url,
            ]
        ];

        $response = $client->post('https://payherokenya.com/sps/portal/app/external_express', $option);
        $responseBody = $response->getBody()->getContents();
        $data = json_decode($responseBody, true);
        dd($data);
    }


}

  