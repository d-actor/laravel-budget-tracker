@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('accounts.transactions.store', ['account'=>$account]) }}">
  @csrf
  @include('accounts.transactions._form')
  <button type="submit">Create</button>
</form>
@endsection