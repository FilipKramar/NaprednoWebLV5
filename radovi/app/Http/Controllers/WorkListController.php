<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkListController extends Controller
{
    public function index()
{
    $tasks = Task::whereNull('user_id')->get();
    return view('works.index', ['tasks' => $tasks]);
}
public function addUser($taskId)
{
    $task = Task::findOrFail($taskId);
    
    $task->users()->attach(Auth::id());

    return redirect()->route('works.index')->with('success', 'You have been added to the task.');
}
public function showWorksAndStudents()
{
    $works = Task::all(); 
    foreach ($works as $work) {
        $work->students = $work->users()->get(); 
    }

    return view('works.accept_task', ['works' => $works]);
}
public function acceptTask(Request $request)
{
    $taskId = null;

    foreach ($request->all() as $key => $value) {
        if (strpos($key, 'submit_') === 0) {
            $taskId = substr($key, 7);
            break;
        }
    }

    if ($taskId === null) {
        return redirect()->back()->with('error', 'Task ID not found in the request.');
    }

    $studentId = $request->input('student_id_' . $taskId);

    $request->validate([
        'student_id_' . $taskId => 'required|exists:users,id',
    ]);

    

    $task = Task::find($taskId);

    if (!$task) {
        return redirect()->back()->with('error', 'Invalid task ID.');
    }

    $task->user_id = $studentId;
    $task->save();

    return redirect()->route('login')->with('success', 'Task accepted successfully.');
}


};
