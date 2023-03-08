<?php

namespace App\Dao\User;

use App\Contracts\Dao\UserDaoInterface;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserDao implements UserDaoInterface
{
    /**
     * User Register
     */
    public function registerUser($user)
    {
        User::create($user);
    }

    /**
     * Get User List
     */
    public function getUserList()
    {
        $userList = DB::table('users')
            ->wherenull('users.deleted_at')
            ->get();
        return $userList;
    }

    /**
     * Create User By Admin
     */
    public function createUser($user)
    {
        User::create($user);
    }

    /**
     * Show Edit User Form
     */
    public function editUserForm($id)
    {
        $user = User::find($id);
        return User::where('id', $user->id)->first();
    }

    /**
     * Edit User By Admin
     */
    public function editUser($user, $id)
    {
        User::where('id', $id)->update($user);
    }

    /**
     * Delete User
     */
    public function deleteUser($id)
    {
        User::where('id', $id)->delete();
    }

    /**
     * Forgot password
     */
    public function forgotPassword($data)
    {
        DB::table('password_resets')->insert($data);
    }

    /**
     * Get reset data
     */
    public function getResetData($email, $token)
    {
        return DB::table('password_resets')
            ->where(['email' => $email, 'token' => $token])->first();
    }

    /**
     * Reset Password
     */
    public function resetPassword($resetPwsd, $email)
    {
        User::where('email', $email)->update($resetPwsd);
        DB::table('password_resets')->where('email', $email)->delete();
    }

    /**
     * Get user by user id
     */
    public function getUserId($id)
    {
        return User::where('id', $id)->get();
    }

    /**
     * Update User Profile
     */
    public function updateUserProfile($data, $id)
    {
        User::where('id', $id)->update($data);
    }

    /**
     * Change Password
     */
    public function changePassword($changePwsd)
    {
        User::find(auth()->user()->id)->update(['password' => $changePwsd]);
    }
}
