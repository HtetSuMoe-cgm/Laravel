<?php

namespace App\Http\Controllers\User;

use App\Contracts\Services\UserServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\PasswordResetRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Requests\User\SendPasswordResetMailRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    private $userService;

    public function __construct(UserServiceInterface $userServiceInterface)
    {
        $this->userService = $userServiceInterface;
    }

    /**
     * Show login Form
     */
    public function viewLogin()
    {
        return view('user.login');
    }

    /**
     * User Login function
     */
    public function userLogin(LoginRequest $request)
    {
        $input = $request->all();

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->type == 'admin') {
                return redirect()->route('home');
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('login.show')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }
    }

    /**
     * Show register Form
     */
    public function viewRegister()
    {
        return view('user.register');
    }

    /**
     * User Register
     */
    public function register(RegisterRequest $request){
        $request->validated();
        $this->userService->register($request);
        return view('user.login');
    }

    /**
     * Logout
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('/');
    }

    /**
     * Show Forgot Password Form
     */
    public function showPasswordResetMailForm()
    {
        return view('user.forgotPassword');
    }

    /**
     * Send Email for password reset
     */
    public function sendEmail(SendPasswordResetMailRequest $request)
    {
        $request->validated();
        $this->userService->forgotPassword($request);
        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    /**
     * Show reset password form
     */
    public function resetPasswordForm($token)
    {
        return view('user.resetPassword', ['token' => $token]);
    }

    /**
     * Reset password
     */
    public function resetPassword(PasswordResetRequest $request)
    {
        $request->validated();
        $updatePassword = $this->userService->getResetData($request);
        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $this->userService->resetPassword($request);

        return redirect()->route('login.show')->with('message', 'Your password has been changed!');
    }
}
