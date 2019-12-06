@extends('layouts.app')

@section('content')
@forelse($accounts as $account)
<p>
  <h3>
    <a href="{{ route('accounts.show', ['account' => $account->id]) }}">{{ $account->name }}</a>
  </h3>
  <a href="{{ route('accounts.edit', ['account' => $account->id]) }}">
    Edit
  </a>
  <br/>
  <form 
    method="POST"
    action="{{ route('accounts.destroy', ['account' => $account->id]) }}">
    @csrf
    @method('DELETE')
    <input type="submit" value="Delete" />
  </form>
</p>
@empty
<p>You dont have any accounts yet...<a href="{{ route('accounts.create') }}">make one!</a></p>
@endforelse
@endsection
