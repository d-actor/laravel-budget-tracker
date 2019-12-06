@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
      <div class="card-header">
        <h3>{{ $transaction->modifier }} of {{ $transaction->amount }}</h3>
      </div>
      <p>Description: ${{ $transaction->description }}</p>
    </div>
    <h3>Current Account Balance:${{ $account->balance }}</h3>
    <a href="{{ route('accounts.transactions.edit', ['account' => $account, 'transaction' => $transaction]) }}">Edit Transaction</a>
    <a href="{{ route('accounts.transactions.index', ['account' => $account]) }}"><strong>Your Account</strong></a>
</div>
@endsection