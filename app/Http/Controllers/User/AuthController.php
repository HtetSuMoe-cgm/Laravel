<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * show login view
     */
    public function Login()
    {
        return view('user.login');
    }

}
