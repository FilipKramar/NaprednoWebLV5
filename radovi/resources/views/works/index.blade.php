

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Work List</h1>
        <ul>
        @foreach($tasks as $task)
    <div>
        <h3>{{ $task->naziv_rada }}</h3>
        <p>{{ $task->zadatak_rada }}</p>
        <form action="{{ route('works.addUser', $task->id) }}" method="POST">
            @csrf
            <button type="submit">Add Me</button>
        </form>
    </div>
@endforeach

        </ul>
    </div>
@endsection
