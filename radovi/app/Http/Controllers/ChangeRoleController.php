<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ChangeRoleController extends Controller
{
    public function index()
    {
        // Retrieve all users from the database
        $users = User::all();

        // Return the view with the users data
        return view('changerole.index', compact('users'));
    }

    public function update(Request $request, User $user)
{

    // Update the user role
    $user->update(['role' => $request->role]);

    return redirect()->back()->with('success', 'User role updated successfully.');
}

    
}
