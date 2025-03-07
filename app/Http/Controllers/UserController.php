<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();

        return view('backend.user.index', compact('users'));
        
    }
    public function create()
    {
        return view('backend.user.create');    
    }
public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $data=[
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => bcrypt($validatedData['password']),
        'created_at' => now(),
        'updated_at' => now(),
    ];
    DB::table('users')->insert($data);
    return redirect()->route('user')->with('success', 'User created successfully.');
    }
    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('backend.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $data = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],   
            'password' => bcrypt($validatedData['password']),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        DB::table('users')->where('id', $id)->update($data);
        return redirect()->route('user')->with('success', 'User updated successfully.');
    }

    public function delete($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('user')->with('success', 'User deleted successfully.');
    }   
}
