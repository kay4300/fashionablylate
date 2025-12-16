<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }
    public function store(RegisterRequest $request)
    {
        $validated = $request->validated();

        // データ保存
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);
        
        return redirect()->route('admin'); 
    }
}
    //

