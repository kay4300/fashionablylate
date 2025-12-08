<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('/login'); 
    }
    // ログイン処理
    public function login(LoginRequest $request)
    {
        // バリデーション済みデータの取得
        $validated = $request->validated();

        return redirect()->route('admin');
    }
}