<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function create()
    {
        // Show the form to create a new user
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Create the user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Assign the "manager" role to the user
        $managerRole = Role::where('name', 'manager')->first();
        $user->assignRole($managerRole);

        return redirect()->route('users.index')->with('success', 'Manager created successfully.');
    }

    public function AssignRole()
    {
        $user = User::find(2);
        $user->assignRole('user');
    }
}
