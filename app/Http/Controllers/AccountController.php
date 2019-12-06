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
        return view('accounts.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
