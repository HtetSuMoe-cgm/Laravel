<?php

namespace App\Http\Controllers\User;

use App\Contracts\Services\UserServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\PasswordResetRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Requests\User\SendPasswordResetMailRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

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
        $request->validated();
        if (!Auth::attempt(request(['email', 'password']))) {
            throw ValidationException::withMessages([
                'invalid' => __('messages.login.invalid'),
            ]);
        }
        return redirect()->route('home');
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
    public function registerUser(RegisterRequest $request)
    {
        $request->validated();
        $this->userService->registerUser($request);
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
        return back()->with(['send_success' => __('messages.email.send_success')]);
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
            return back()->withInput()->with(['error' => __('messages.email.error')]);
        }

        $this->userService->resetPassword($request);

        return redirect()->back()->with(['changed_success' => __('messages.email.password.changed_success')]);
    }
}
