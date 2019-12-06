<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Account;
use App\Http\Requests\StoreAccount;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('accounts.index', ['accounts' => Account::where('user_id', $user->id)->get()]);
    }

    public function create()
    {
        $user = Auth::user();
        return view('accounts.create', ['user_id' => $user->id]);
    }

    public function store(StoreAccount $request)
    {
        $validatedData = $request->validated();
        $account = Account::create($validatedData);
        $account->save();

        $request->session()->flash('status', 'Account Created');

        return redirect()->route('accounts.show', ['account' => $account->id]);
    }

    public function show($id)
    {
        return view('accounts.show', ['account' => Account::findOrFail($id)]);
    }

    public function edit($id)
    {
        $account = Account::findOrFail($id);
        return view('accounts.edit', ['account' => $account]);
    }

    public function update(StoreAccount $request, $id)
    {
        $validatedData = $request->validated();
        $account = Account::findOrFail($id);
        $account->fill($validatedData);
        $account->save();

        $request->session()->flash('status', 'Account Info Updated');
        
        return redirect()->route('accounts.show', ['account' => $account->id]);
    }

    public function destroy(Request $request, $id)
    {
        $account = Account::findOrFail($id);
        $account->delete();
        $request->session()->flash('status', 'Account Deleted');

        return redirect()->route('accounts.index');
    }
}
