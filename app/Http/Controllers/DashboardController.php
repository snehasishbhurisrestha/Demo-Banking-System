<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Account;
use App\Models\Transaction;

class DashboardController extends Controller
{

    public function index()
    {

        if(auth()->user()->hasRole('Super Admin'))
        {
            return $this->adminDashboard();
        }

        return $this->userDashboard();

    }


    private function adminDashboard()
    {

        $totalUsers = User::role('User')->count();

        $totalUsd = Account::sum('balance_usd');

        $totalEur = Account::sum('balance_eur');

        $totalTransactions = Transaction::count();

        $latestTransactions = Transaction::latest()->limit(5)->get();

        return view('dashboard.admin', compact(
            'totalUsers',
            'totalUsd',
            'totalEur',
            'totalTransactions',
            'latestTransactions'
        ));

    }


    private function userDashboard()
    {

        $account = Account::where('user_id', auth()->id())->first();

        $transactions = Transaction::where('user_id', auth()->id())
                        ->latest()
                        ->get();

        return view('dashboard.user', compact('account','transactions'));

    }

}
