<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * show login view
     */
    public function ViewLogin()
    {
        return view('user.login');
    }

    public function UserLogin(Request $request)
    {
        $input = $request->all();
     
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->type == 'admin') {
                return redirect()->route('home');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('login.show')
                             ->with('error','Email-Address And Password Are Wrong.');
        }
    }

    public function ViewRegister()
    {
        return view('user.register');
    }

    public function Logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }

}
