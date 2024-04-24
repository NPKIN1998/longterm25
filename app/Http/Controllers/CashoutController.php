<?php

namespace App\Http\Controllers;

use App\Models\Cashout;
use Illuminate\Http\Request;
use Carbon\Carbon;
use AfricasTalking\SDK\AfricasTalking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Inertia\Inertia;

class CashoutController extends Controller
{
   
    protected $apiUrl = 'https://backend.payhero.co.ke/api/v2/withdraw';
    protected $apiUsername = 'rJo6L9wz8O7P4n3ZA09q';
    protected $apiPassword = 'Tbcr7CtGcBTcEtnQbe8guwGtckGzU2i1OeoTcrRX';

     public function getCountry($request)
    {
        // Get user's IP address
        $ip = $request->ip();

        // Make request to FreeGeoIP API
        $response = Http::get("https://freegeoip.app/json/$ip");

        // Check if request was successful
        if ($response->successful()) {
            // Parse response JSON
            $data = $response->json();

            // Get user's country
            $country = $data['country_name'];

            return $country;
        } else {
            // Handle error
            return "Kenya";
        }
    }
   
    public function CashoutIndex()
    {
        return Inertia::render('User/Cashout');
    }
    
    public function handleRequest($request)
    {
        // Get the IP address of the requester
        $ip = $request->ip();
    
        // Get the user ID (if authenticated)
        $userId = auth()->id();
    
        // Generate a unique token for the request
        $utoken =$request->uniquekey; // Adjust the length of the token as needed
    
        // Retrieve amount from the request
        $amount = $request->input('amount');
    
        // Check for similar requests within the last 10 minutes
        $similarRequests = DB::table('request_logs')->where('ip', $ip)
            ->where('user_id', $userId)
            ->where('amount', $amount)
            ->where('token', $utoken)
            ->where('created_at', '>=', now()->subMinutes(10))
            ->exists();
    
        // If similar requests found, handle accordingly (e.g., update status, return error response)
        if ($similarRequests) {
            // Handle similar requests
            return true;
        } else {
            // Insert the request data into the database
            DB::table('request_logs')->insert([
                'ip' => $ip,
                'user_id' => $userId,
                'token' => $utoken,
                'amount' => $amount,
                'status' => 'received',
                'created_at' => now(),
                // Set default status to 'received'
                // Add other data as needed
            ]);
            
            // Process the request further
            return false;
        }
        return false;
    }


    public function withdrawMoney(Request $req)
    {

        //entry method
         
        //
        $isNotSafe = $this->handleRequest($req);
        
        if($isNotSafe)
        {
            return back()->with('error', "Invalid request, Retry later!");
        }
        
      
        $key = Auth::user()->pin;
        $pin = $req->pin;
        $phone = $req->phone;
        $balance = Auth::user()->balance;
        $name = Auth::user()->username;
        
        $ip = $req->ip();
        //dd($ip);

        $amt = ($req->amount) * 0.9;
        $amount = (float) $amt;
        $bal = $balance - ($req->amount);
        
        //dd($amount);

        // Get the phone number from the request
        $phoneNumber = $phone;

        // Check if the phone number already has the country code
        if (!Str::startsWith($phoneNumber, '254')) {
            // Add the country code if not present
            $phoneNumber = '254' . ltrim($phoneNumber, '0');
        }



        // Check if a withdrawal has already been made on the current day
        $existingWithdrawal = DB::table('cashouts')
            ->where('username', Auth::user()->username)
            ->whereDate('created_at', Carbon::today())
            ->get();

        if ($existingWithdrawal->count() > 5)  {
            return back()->with('error', "you are allowed to transact 6times daily");
        }


        if ($amount > $balance) {
            return back()->with('error', "You do not have enough amount to withdraw ksh. $amount ");
        }
        if ($amount < 89) {
            return back()->with('error', "Minimun amount to withdraw is ksh.100");
        }

        $grabs = DB::table('invest')->where('user_id', Auth::user()->id)->get()->count();

        if ($grabs == 0) {
            return back()->with('error', 'You are inactive member, buy package');
        }

        $up = DB::table('users')->where('id', Auth::user()->id)->update([
            'balance' => $bal,

        ]);


        if ($up) {
            if ($amount < 801) {
                // Call makePayment method with Basic Auth token
                $response = $this->makePayment($amount, $phoneNumber);
                //dd($response);
                // Check if the payment was successful
                if ($response['success']) {
                    // Payment was successful
                    $paymentData = $response['data'];
                    // Further processing or actions based on successful payment
                    $status = "approved";
                } else {
                    // Payment failed
                    $errorData = $response['data'];
                    // Further processing or actions based on failed payment
                    $status = "pending";
                }
            } else {
                $status = "pending";
            }
            
            $msg = "Status: Failed; user:$name :amount:$amount";
            if($status == 'pending'){
                //$this->sendAfricaSms('0708181635', "Check:$msg");
            }

            //cashout
            DB::table('cashouts')->insert([
                'amount' => $amount,
                'phone' => $req->phone,
                'status' => "$status",
                'username' => Auth::user()->username,
                'created_at' => Carbon::now(),
            ]);
        }


        //ennd of email
        return back()->with('success', "request successful");
    }
    public function payMember($receiver, $amount)
    {
        $url = 'https://payherokenya.com/sps/portal/app/sasa_pay_send_to_mobile';

        $data = [
            "api_key" => "OH4BLuUhWAUobRu78Cq6Lg1659xEJ8LobH9azKFBw76OYJ2aZC",
            "username" => "dchumba",
            "ReceiverNumber" => "$receiver",
            "ChannelCode" => "63902",
            "Amount" => "$amount",
            "PaymentReference" => "withdaw",
            "callback_url" => "https://payherokenya.com"
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($url, $data);

        // Handle the response as needed
        return $response->body();
    }

    protected function makePayment($amount, $receiverPhoneNumber)
    {
        // Generate Basic Auth token
        $basicAuthToken = $this->generateBasicAuthToken();

        $data = [
            "external_reference" => "mpesa101",
            "amount" => $amount,
            "phone_number" => $receiverPhoneNumber,
            "network_code" => "63902",
            "callback_url" => "https://trustline.co.ke/api/sasapay",
            "channel" => "mobile"
        ];

        $headers = [
            'Content-Type: application/json',
            'Authorization: ' . $basicAuthToken
        ];

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $this->apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => $headers,
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            return ['error' => $error];
        } else {
            $decodedResponse = json_decode($response, true);

            // Check for success or failure
            if (isset($decodedResponse['status']) && $decodedResponse['status'] == 'QUEUED' && isset($decodedResponse['response_code']) && $decodedResponse['response_code'] == '0') {
                // Payment successful
                return ['success' => true, 'data' => $decodedResponse];
            } else {
                // Payment failed
                return ['success' => false, 'data' => $decodedResponse];
            }
        }
    }

    protected function generateBasicAuthToken()
    {
        // Concatenate username and password with colon
        $credentials = $this->apiUsername . ':' . $this->apiPassword;
        // Base64 encode the credentials
        $encodedCredentials = base64_encode($credentials);
        // Creating the Basic Auth token
        return 'Basic ' . $encodedCredentials;
    }
    
        public function sendAfricaSms($recipient, $message)
    {


        $username = env('AFRICAN_TALKING_USERNAME');
        // use 'sandbox' for development in the test environment
        $apiKey   = env('AFRICAN_TALKING_API');
        // use your sandbox app API key for development in the test environment
        $AT       = new AfricasTalking($username, $apiKey);

        // Get one of the services
        $sms      = $AT->sms();

        // Use the service
        $result   = $sms->send([
            'to'      => $recipient,
            'message' => $message
        ]);

        return $result;
    }
}
