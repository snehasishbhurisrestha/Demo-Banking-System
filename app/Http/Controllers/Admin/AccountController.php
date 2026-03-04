<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Transaction;
use App\Models\User;

class AccountController extends Controller
{

    public function depositView()
    {
        $customers = User::role('user')->get();

        return view('admin.accounts.deposit', compact('customers'));
    }


    public function withdrawView()
    {
        $customers = User::role('user')->get();

        return view('admin.accounts.withdraw', compact('customers'));
    }

    public function transactions($user_id)
    {

        $user = User::findOrFail($user_id);

        $transactions = Transaction::where('user_id', $user_id)
                        ->latest()
                        ->get();

        return view('admin.accounts.transactions', compact('transactions','user'));

    }

    public function deposit(Request $request)
    {

        $account = Account::where('user_id', $request->user_id)->first();

        if($request->currency == "USD")
        {
            $account->balance_usd += $request->amount;
            $balance = $account->balance_usd;
        }
        else
        {
            $account->balance_eur += $request->amount;
            $balance = $account->balance_eur;
        }

        $account->save();

        Transaction::create([
            'user_id'=>$request->user_id,
            'type'=>'deposit',
            'currency'=>$request->currency,
            'amount'=>$request->amount,
            'balance_after'=>$balance,
            'description'=>'Admin Deposit'
        ]);

        return back()->with('success','Deposit successful');

    }



    public function withdraw(Request $request)
    {

        $account = Account::where('user_id', $request->user_id)->first();

        if($request->currency == "USD")
        {
            $account->balance_usd -= $request->amount;
            $balance = $account->balance_usd;
        }
        else
        {
            $account->balance_eur -= $request->amount;
            $balance = $account->balance_eur;
        }

        $account->save();

        Transaction::create([

            'user_id'=>$request->user_id,
            'type'=>'withdraw',
            'currency'=>$request->currency,
            'amount'=>$request->amount,
            'balance_after'=>$balance,
            'description'=>'Admin Withdraw'

        ]);

        return back()->with('success','Withdraw successful');

    }

}
