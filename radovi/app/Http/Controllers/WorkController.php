<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;

use Illuminate\Http\Request;
use App\Models\Task;

class WorkController extends Controller
{
    // Other methods...

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
 
    $request->validate([
        'naziv_rada' => 'required|string',
        'naziv_rada_eng' => 'required|string',
        'zadatak_rada' => 'required|string',
        'tip_studija' => 'required|in:strucni,preddiplomski,diplomski',
    ]);


    $task = new Task([
        'naziv_rada' => $request->naziv_rada,
        'naziv_rada_eng' => $request->naziv_rada_eng,
        'zadatak_rada' => $request->zadatak_rada,
        'tip_studija' => $request->tip_studija,
    
    ]);

    $task->save();

  
    return redirect()->route('home')->with('success', 'Task created successfully.');
}
    public function create($locale)
{
    // Set the locale
    App::setLocale($locale);
    
    // Update the session value
    session(['locale' => $locale]);



    // Return the view
    return view('works.create');
}

    
}
