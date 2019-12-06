@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
      <div class="card-header">
        <h3>{{ $account->name }}</h3>
      </div>
      <p>Current Balance: ${{ $account->balance }}</p>
      <a href="{{ 'transactions.create' }}">New Transaction</a>
      <br />
      <a href="{{ 'transactions.index' }}">Transaction History</a>
      <p>Last Updated {{ $account->updated_at->diffForHumans() }}</p> 
    </div>
    <a href="{{ route('accounts.index') }}"><strong>Your Accounts</strong></a>
</div>
@endsection