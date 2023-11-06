<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class CustomLoginController extends Controller
{
    use AuthenticatesUsers;

    // ...

    protected function sendFailedLoginResponse(Request $request)
    {
        Log::channel('customlog')->error('Failed login attempt for user: ' . $request->email);
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    // ...
}
