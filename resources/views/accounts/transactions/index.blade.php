@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <h3>
            <div class="card-header">
              <a href="{{ route('accounts.show', ['account' => $account]) }}">Account: {{ $account->name }}</a>
              <br />
             <h3>Current Balance: ${{ $account->balance }}</h3>
            </div>
          </h3>
          <a href="{{ route('accounts.transactions.create', ['account' => $account]) }}">
              New Transaction
          </a>
          <br/>
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          @forelse($transactions as $transaction)
            <p>
              <a href="{{ route('accounts.transactions.show', ['account' => $account->id, 'transaction'=>$transaction->id]) }}"><h3>{{ $transaction->modifier }}${{ $transaction->amount }}</h3><a>
              <h4>{{ $transaction->description }}</h4>
              <form 
                method="POST"
                action="{{ route('accounts.transactions.destroy', ['account'=> $account, 'transaction' => $transaction->id]) }}">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete" />
              </form>
            </p>
          @empty
          <p>No transactions on this account yet...<a href="{{ route('accounts.transactions.create', ['account' => $account->id]) }}">make one!</a></p>
          @endforelse
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
