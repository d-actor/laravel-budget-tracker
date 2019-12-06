@extends('layouts.app')

@section('content')
<form 
  method="POST" 
  action="{{ route('accounts.transactions.update', ['account' => $account->id,'transaction' => $transaction->id]) }}"
>
  @csrf
  @method('PUT')

  @include('accounts.transactions._form')

  <button type="submit">Update</button>
</form>
@endsection