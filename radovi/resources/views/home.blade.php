@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <form action="{{ route('home.redirectToChangeRole') }}" method="POST">
    @csrf
    <button type="submit">Go to Change Role</button>
</form>

<form action="{{ route('home.redirectToWork') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary">Create A Task</button>
</form>
<a href="{{ route('works.index') }}" class="btn btn-primary">View Works List</a>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
