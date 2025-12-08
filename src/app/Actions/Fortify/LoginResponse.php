<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * Handle the response after a successful login.
     */
    public function toResponse($request)
    {
        // ログイン成功後に admin.blade.php へ遷移
        return redirect()->route('admin.index');
    }
}
