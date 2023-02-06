<?php

namespace App\Services\User;

use App\Contracts\Dao\UserDaoInterface;
use App\Contracts\Services\UserServiceInterface;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserService implements UserServiceInterface
{
    protected $userDao;

    public function __construct(UserDaoInterface $userDaoInterface)
    {
        $this->userDao = $userDaoInterface;
    }

    /**
     * User Register
     */
    public function register($request){
        $this->userDao->register($request);
    }

    /**
     * Get User List
     */
    public function getUserList(){
        return $this->userDao->getUserList();
    }

    /**
     * Create User by Admin
     */
    public function doAddUser($request){
        $this->userDao->dbAddUser($request);
    }

    /**
     * Forgot password
     */
    public function forgotPassword($request)
    {
        $token = Str::random(60);
        $this->userDao->forgotPassword($request, $token);
        Mail::send('email.verify', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Your Password Reset Link');
        });
    }

    /**
     * Get Reset Data
     */
    public function getResetData($request)
    {
        return $this->userDao->getResetData($request);
    }

    /**
     * Reset Password
     */
    public function resetPassword($request)
    {
        $this->userDao->resetPassword($request);
    }
}
