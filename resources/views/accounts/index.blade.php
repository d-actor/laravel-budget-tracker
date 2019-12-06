@extends('layouts.app')

@section('content')
@forelse($accounts as $account)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                  {{ session('status') }}
                </div>
                @endif
                <p>
                  <h3>
                      <div class="card-header">
                        <a href="{{ route('accounts.show', ['account' => $account->id]) }}">{{ $account->name }}</a>
                      </div>
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
                </div>
              </div>
          </div>
        </div>
    </div>
</div>
@empty
<p>You dont have any accounts yet...<a href="{{ route('accounts.create') }}">make one!</a></p>
@endforelse
@endsection
