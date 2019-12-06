@extends('layout')

@section('content')
  <h1>{{ $account->name }}</h1>
  <p>{{ $account->balance }}</p>

  <p>Last Updated {{ $account->updated_at->diffForHumans() }}</p> 
@endsection