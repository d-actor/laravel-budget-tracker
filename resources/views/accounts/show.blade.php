@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
      <div class="card-header">
        <h3>{{ $account->name }}</h3>
      </div>
      <p>Current Balance: ${{ $account->balance }}</p>
      <a href="{{ route('accounts.transactions.create', ['account' => $account->id]) }}">New Transaction</a>
      <br />
      <a href="{{ route('accounts.transactions.index', ['account' => $account->id]) }}">Transaction History</a>
      <p>Last Updated {{ $account->updated_at->diffForHumans() }}</p> 
    </div>
    <a href="{{ route('accounts.index') }}"><strong>Your Accounts</strong></a>
</div>
@endsection