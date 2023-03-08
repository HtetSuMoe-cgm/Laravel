<?php

namespace App\Services\User;

use App\Contracts\Dao\UserDaoInterface;
use App\Contracts\Services\UserServiceInterface;
use Illuminate\Support\Facades\Hash;
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
    public function registerUser($request)
    {
        $user = $this->getUserData($request);
        $this->userDao->registerUser($user);
    }

    /**
     * Get User List
     */
    public function getUserList()
    {
        return $this->userDao->getUserList();
    }

    /**
     * Create User by Admin
     */
    public function createUser($request)
    {
        $user = $this->getUserData($request);
        $this->userDao->createUser($user);
    }

    /**
     * Create User
     */
    public function getUserData($request)
    {
        return [
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'gender' => $request['gender'],
            'type' => $request['type'],
            'created_at' => now(),
        ];
    }

    /**
     * Show Edit User Form
     */
    public function editUserForm($id)
    {
        return $this->userDao->editUserForm($id);
    }

    /**
     * Edit User
     */
    public function editUser($request, $id)
    {
        $user = $this->updateUserData($request);
        $this->userDao->editUser($user, $id);
    }

    /**
     * Update User Data
     */
    public function updateUserData($request)
    {
        return [
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'gender' => $request['gender'],
            'type' => $request['type'],
            'updated_at' => now(),
        ];
    }

    /**
     * Delete User
     */
    public function deleteUser($id)
    {
        $this->userDao->deleteUser($id);
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

    /**
     * Get User by id
     */
    public function getUserId($id)
    {
        return $this->userDao->getUserId($id);
    }

    /**
     * Update User Profile
     */
    public function updateUserProfile($request, $id)
    {
        $this->userDao->updateUserProfile($request, $id);
    }

    /**
     * Change Password
     */
    public function changePassword($request)
    {
        $this->userDao->changePassword($request);
    }
}
