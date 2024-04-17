@extends('layouts.app')

@section('content')
@if (App::getLocale() === 'en')
    <div class="container">
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="naziv_rada">Title</label>
                <input type="text" class="form-control" name="naziv_rada" id="naziv_rada" required>
            </div>
            
            <div class="form-group">
                <label for="naziv_rada_eng">Title (English)</label>
                <input type="text" class="form-control" name="naziv_rada_eng" id="naziv_rada_eng" required>
            </div>
            
            <div class="form-group">
                <label for="zadatak_rada">Task</label>
                <textarea class="form-control" name="zadatak_rada" id="zadatak_rada" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="tip_studija">Study Type</label>
                <select class="form-control" name="tip_studija" id="tip_studija">
                    <option value="strucni">Professional</option>
                    <option value="preddiplomski">Undergraduate</option>
                    <option value="diplomski">Graduate</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endif

@if (App::getLocale() === 'hr')
    <div class="container">
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="naziv_rada">Naslov</label>
                <input type="text" class="form-control" name="naziv_rada" id="naziv_rada" required>
            </div>
            
            <div class="form-group">
                <label for="naziv_rada_eng">Naslov (Engleski)</label>
                <input type="text" class="form-control" name="naziv_rada_eng" id="naziv_rada_eng" required>
            </div>
            
            <div class="form-group">
                <label for="zadatak_rada">Zadatak</label>
                <textarea class="form-control" name="zadatak_rada" id="zadatak_rada" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="tip_studija">Vrsta Studija</label>
                <select class="form-control" name="tip_studija" id="tip_studija">
                    <option value="strucni">Stručni</option>
                    <option value="preddiplomski">Preddiplomski</option>
                    <option value="diplomski">Diplomski</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Pošalji</button>
        </form>
    </div>
@endif

<hr>

<hr>

<h2>Change Locale</h2>

<a href="{{ route('locale.create', 'en') }}">English</a>

<a href="{{ route('locale.create', 'hr') }}">Hrvatski</a>


<h1>{{ __('addwork.title') }}</h1>

@endsection