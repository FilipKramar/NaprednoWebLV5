@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Works and Students</div>

                <div class="card-body">
                    <form action="{{ route('works.acceptTask') }}" method="POST" id="acceptTaskForm">
                        @csrf
                        @foreach ($works as $work)
                            <h4>{{ $work->naziv_rada }}</h4>
                            <ul>
                                @foreach ($work->students as $student)
                                    <li>
                                        <label>
                                            <input type="radio" name="student_id_{{ $work->id }}" value="{{ $student->id }}"
                                                class="student-radio" data-task-id="{{ $work->id }}" data-submit-id="{{ $work->id }}">
                                            {{ $student->name }}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                            <input type="hidden" name="task_id_{{ $work->id }}" id="task_id_{{ $work->id }}" value="{{ $work->id }}">
                            <button type="submit" name="submit_{{ $work->id }}" class="btn btn-primary accept-button">Accept</button>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    document.querySelectorAll('.student-radio').forEach(radio => {
        radio.addEventListener('click', function() {
            var taskId = this.dataset.taskId;
            var submitId = this.dataset.submitId;
            document.getElementById('task_id_' + taskId).value = taskId;
            document.querySelectorAll('.accept-button').forEach(button => {
                button.name = "submit_" + submitId;
            });
        });
    });
</script>
@endsection
