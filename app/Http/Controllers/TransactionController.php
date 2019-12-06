<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Account;
use App\Http\Requests\StoreTransaction;

class TransactionController extends Controller
{
    public function index($id)
    {
        $account = Account::findOrFail($id);
        return view('accounts.transactions.index', ['account' => $account, 'transactions'=> $account->transactions]);
    }

    public function create($id)
    {
        return view('accounts.transactions.create', ['account'=> Account::findOrFail($id)]);
    }

    public function store(StoreTransaction $request)
    {
        $validatedData = $request->validated();
        $transaction = Transaction::create($validatedData);
        $transaction->save();

        $account = Account::findOrFail($transaction->account_id);
        $modifier = $transaction->modifier == 'Debit' ? '-' : '+';
        switch($modifier) {
            case "+":
                $newBal = $account->balance + $transaction->amount;
                $account->balance = $newBal;
                $account->save();
            case "-":
                $newBal = $account->balance - $transaction->amount;
                $account->balance = $newBal;
                $account->save();
        }

        $request->session()->flash('status', 'Transaction Created');

        return redirect()->route('accounts.transactions.show', ['account' => $transaction->account_id, 'transaction' => $transaction->id,]);
    }
  
    public function show($accountId, $transactionId)
    {
        return view('accounts.transactions.show', ['transaction' => Transaction::findOrFail($transactionId), 'account' => Account::findOrFail($accountId)]);
    }

    public function edit($accountId, $transactionId)
    {
        $account = Account::findOrFail($accountId);
        $transaction = Transaction::findOrFail($transactionId);
        return view('accounts.transactions.edit', ['account'=>$account, 'transaction'=>$transaction]);
    }

    public function update(StoreTransaction $request, $accountId, $transactionId)
    {
        $validatedData = $request->validated();
        $transaction = Transaction::find($transactionId);
        $transaction->fill($validatedData);
        $transaction->save();

        $request->session()->flash('status', 'Transaction Created');

        return redirect()->route('accounts.transactions.show', ['account' => $transaction->account_id, 'transaction' => $transaction->id,]); 
    }

    public function destroy(Request $request, $accountId, $transactionId)
    {
        $transaction = Transaction::findOrFail($transactionId);
        $transaction->delete();
        $request->session()->flash('status', 'Transaction deleted');

        return redirect()->route('accounts.transactions.index', ['account'=>$accountId]);
    }
}
