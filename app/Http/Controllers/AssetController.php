<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AssetController extends Controller
{
    public function index()
    {
        return Inertia::render("User/Product");
    }


    public function quickPackage()
    {
        //e.g example.com/product?p={id}
        $p = request()->query('p');
        $p_details = DB::table('packages')->where('id', $p)->first();
        $price = $p_details->price;
        $returns = $p_details->daily_income;
        $amount = $price;
        $day = Carbon::now();
        $dayPay = Carbon::now()->addDays(1);
        $balance = Auth::user()->balance;
        $id = Auth::user()->id;
         $new_cash = $balance - $amount;
         $new_invs = Auth::user()->investments + $amount;
        //nge createn investment
        
        //validate investments 10k < 1k
         if($new_cash < 0)
         {
            return back()->with('error','insufficient account balance!');
         }
        
      //create new investment instance
      $invest = DB::table('invest')->insert([
        'user_id' => Auth::user()->id,
        'status' => 1,
        'period' => 30,
        'returns' => $returns,
        'type' => 0,
        'capital' => $amount,
        'days_paid' => 0,
        'next_payment' => $dayPay,
        'upline_bonus' => $amount*0.12,
        'date' => $day,
        'end_date' => $day
      ]);
 
      if($invest){
         
          DB::table('users')
          ->where('id', $id)
          ->update([
              'balance' => $new_cash,
              'investments' => $new_invs,
              'status' => 1
          ]);
            //select out the upline 
            $upline = DB::table('users')->where('ref_code', Auth::user()->upline)->first();
            if($upline)
            {
                //upline balance
                $balance = $upline->balance;
                //update his bala
                $bonus = 0.12 * $amount;
                //set new amount 
                $new_balance = $balance + $bonus;
                //update upline 
                 DB::table('users')->where('ref_code', Auth::user()->upline)->update(['balance'=> $new_balance]);
            } 
 
           //return back
           return back()->with('success','processed successfully!');
      
      }
        
    }
 
}
