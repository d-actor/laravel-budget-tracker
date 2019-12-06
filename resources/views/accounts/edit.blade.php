@extends('layout')

@section('content')
<form 
  method="POST" 
  action="{{ route('accounts.update', ['account' => $account->id]) }}"
>
  @csrf
  @method('PUT')

  @include('accounts._form')

  <button type="submit">Update</button>
</form>
@endsection