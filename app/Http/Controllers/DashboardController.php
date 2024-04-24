<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Http\Controllers\InvestController;

class DashboardController extends Controller
{
    public function index()
    {

     //check for payments
     $payUser = new InvestController();

     $payUser->payMaturedTrades();

      $user = Auth::user();

     
      $userData = [
          'username' => $user->username,
          'phone' => $user->phone,
          'email' => $user->email,
          'password' => $user->password,
          'balance' => $user->balance,
          'investment' => $user->investment,
          'deposit' => $user->deposit,
          'uplinebonus' => $user->uplinebonus,
          'cashout' => $user->cashout,
          'status' => $user->status,
      ];

      $referralLink = $user->referral_link;

      return Inertia::render('Dashboard', [
          'user' => $userData,
          'referral_link' => $referralLink
      ]);
  }
}