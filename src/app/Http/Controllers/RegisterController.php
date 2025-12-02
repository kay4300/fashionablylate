<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function store(RegisterRequest $request)
    {
        $register = $request->only(['name', 'email', 'password']);

        return redirect()->route('/admin'); // 管理画面へ遷移
    }
}
    //

