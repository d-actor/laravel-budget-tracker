@extends('layout')

@section('content')
<form method="POST" action="{{ route('accounts.store') }}">
  @csrf
  @include('accounts._form')
  <button type="submit">Create</button>
</form
@endsection