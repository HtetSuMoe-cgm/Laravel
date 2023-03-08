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
        $data = $this->getForgotData($request, $token);
        $this->userDao->forgotPassword($data);
        Mail::send('email.verify', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Your Password Reset Link');
        });
    }

    /**
     * Get Forgot Data
     */
    public function getForgotData($request, $token)
    {
        return [
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(),
        ];
    }

    /**
     * Get Reset Data
     */
    public function getResetData($request)
    {
        $email = $request->email;
        $token = $request->token;
        return $this->userDao->getResetData($email, $token);
    }

    /**
     * Reset Password
     */
    public function resetPassword($request)
    {
        $email = $request->email;
        $resetPwsd = $this->getResetPassword($request);
        $this->userDao->resetPassword($resetPwsd, $email);
    }

    /**
     * Get Reset Password
     */
    public function getResetPassword($request)
    {
        return [
            'password' => Hash::make($request['password']),
        ];
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
        $data = $this->getUserProfileData($request);
        $this->userDao->updateUserProfile($data, $id);
    }

    /**
     * Get User Profile Data
     */
    public function getUserProfileData($request)
    {
        return [
            'username' => $request['username'],
            'email' => $request['email'],
            'gender' => $request['gender'],
            'updated_at' => now(),
        ];
    }

    /**
     * Change Password
     */
    public function changePassword($request)
    {
        $changePwsd = Hash::make($request->new_password);
        $this->userDao->changePassword($changePwsd);
    }
}
