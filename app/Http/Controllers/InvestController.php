<?php

namespace App\Http\Controllers;

use App\Models\Invest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class InvestController extends Controller
{
    public function approveCashouts(Request $req){
        $amount = $req->amount;
        $id = $req->id;
        
      //  dd($id);
       // $phone = $req->phone;
        //update csts status
        $update = DB::table('cashouts')->where('id', $id)->update([
            'status' => "Approved"
            
            ]);
            
            //send mail
            
            //return back the user
            return back()->with('success', 'Approved successfully');
    }
    
   public function payMaturedTrades()
   {
   $this->makeUserActive();
       
   //import my trades which haven't matured
       $trades = DB::table('invest')->where('status', 1)->where('user_id', Auth::user()->id)->get();
       
       
       //we use foreach to get them all
       foreach ($trades as $trade) {
            //dd($trade);
                  //get profit foreach user
                  $profit=$trade->returns;
                  //get trading period
                  $period = $trade->period;
                  //get days paid so far
                  $paid = $trade->days_paid;
                   // $to = Carbon::parse($trade->end_date);
                  $from_yangu = Carbon::parse($trade->end_date);
                  //$to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', '2015-5-5 3:30:34');
                  $to = Carbon::now()->subHours(0);
                  //dd($to);
                  //assumed date of start of investing
                  $from_fake = Carbon::createFromFormat('Y-m-d H:s:i', '2022-2-16 9:30:34');
                  //real end date
                  $from = $trade->date;

                  $diff_in_days = $to->diffInDays($from);
                  $diff_in_hrs = $to->diffInHours($from);
                  //compare days paid with difference
                  $days_not_paid = $diff_in_days - $paid;
                //  dd("$diff_in_hrs");

              if($days_not_paid > 0 ){
                  
                  //dd($trade);
                          //get id of users to be paid
                          $id =  $trade->user_id;
                          //get capital
                          $capital = $trade->capital;
                          //get id of that running investment
                          $invest_id = $trade->id;
                          //select those users
                          $users = DB::table('users')->where('id', $id)->get();
                          //loop through each unpaid person
                          foreach ($users as $user){
                                     //calculate net profits
                                     $net_profit = $profit * $days_not_paid;
                                     //initialize their balance
                                      $balance = $user ->balance;
                                      //add profits to balance
                                      $new_balance = $balance + $net_profit;

                                  //pay them
                                  $affected = DB::table('users')
                                  ->where('id', $id)
                                  //update to new balance
                                  ->update(['balance' => $new_balance]);
                                   //reward team builders
                                  $uplineClient = DB::table('users')->where('username', Auth::user()->upline)->first();
                                  if($uplineClient){
                                       $upline_bal = $uplineClient->balance;
                                       $amountToAdd = $net_profit * 0.03;
                                       $uplineNewBal = $amountToAdd + $upline_bal;
                                       //update an upline
                                       DB::table('users')->where('username', Auth::user()->upline)->update(['balance'=> $uplineNewBal]);
                                  }
                          }

                          //mark paid
                          $nextPay = Carbon::parse($from)->addDays($diff_in_days + 1);
                          $markPaid =DB::table('invest')
                          ->where('id', $invest_id)
                          //set everyone paid
                          ->update([
                              'next_payment' => $nextPay,
                              'days_paid' => $diff_in_days,
                              'status' => 1
                              ]);
              }
              
           


      }
   //    *****************************************************************//


   }
   
   
   public function makeUserActive()
   {
       // all trades
         //import my trades which haven't matured
       $trades = DB::table('invest')->get();
       
       //we use foreach to get them all
       foreach ($trades as $trade) {
           $userInvested = $trade->user_id;
                  DB::table('users')
                                  ->where('id', $userInvested)
                                  //update to new balance
                                  ->update(['status' => 1]);
       }
   }





   


   
}
