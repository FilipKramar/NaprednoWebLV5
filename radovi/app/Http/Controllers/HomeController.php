<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Check if the authenticated user is an admin.
     *
     * @return bool
     */
    public function redirectToChangeRole(Request $request)
    {
    
        if (Auth::check() && Auth::user()->isAdmin()) {
            return redirect()->route('changerole.index');
        } else {
            // Handle the case where the user is not an admin
            // For example, show an error message or redirect to another route
            return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
        }
    }
   

public function redirectToWork(Request $request)
{
    if (Auth::check() && (Auth::user()->role === 'nastavnik' || Auth::user()->role === 'admin')) {
       
        return redirect()->route('locale.create', ['locale' => 'en']);


    } else {
        return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
    }
}

}
