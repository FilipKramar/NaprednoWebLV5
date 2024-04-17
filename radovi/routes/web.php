<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\ChangeRoleController;
use App\Http\Controllers\WorkListController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('locale/{locale}', [WorkController::class, 'create'])->name('locale.create');
Route::get('/works/create', [WorkController::class, 'create'])->name('works.create');
Route::get('/changerole', [ChangeRoleController::class, 'index'])->name('changerole.index');
Route::put('/changerole/{user:name}', [ChangeRoleController::class, 'update'])->name('changerole.update');
Route::post('/home/redirect-to-change-role', [App\Http\Controllers\HomeController::class, 'redirectToChangeRole'])->name('home.redirectToChangeRole');
Route::post('/tasks', [WorkController::class, 'store'])->name('tasks.store');
Route::post('/home/redirect-to-work', [App\Http\Controllers\HomeController::class, 'redirectToWork'])->name('home.redirectToWork');
Route::get('/workslist', [WorkListController::class, 'index'])->name('works.index');
Route::post('/works/addUser/{taskId}', [WorkListController::class, 'addUser'])->name('works.addUser');
Route::get('/accept_task', [WorkListController::class, 'showWorksAndStudents'])->name('works.accept_task');
Route::post('/works/accept-task', [WorkListController::class, 'acceptTask'])->name('works.acceptTask');
Route::get('/works/get-students/{taskId}', [WorkListController::class, 'getStudents'])->name('works.getStudents');

