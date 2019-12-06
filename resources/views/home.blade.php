@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome
                </div>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('accounts.index') }}">Your Accounts</a></li>
                    <li><a href="{{ route('accounts.create') }}">Create Account</a></li>
                 </ul>
            </div>
        </div>
    </div>
</div>
@endsection
