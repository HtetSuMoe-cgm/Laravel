<?php

namespace App\Dao\User;

use App\Contracts\Dao\UserDaoInterface;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
    public function forgotPassword($request, $token)
    {
        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => now()]
        );
    }

    /**
     * Get reset data
     */
    public function getResetData($request)
    {
        return DB::table('password_resets')
            ->where(['email' => $request->email, 'token' => $request->token])->first();
    }

    /**
     * Reset Password
     */
    public function resetPassword($request)
    {
        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();
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
    public function updateUserProfile($request, $id)
    {
        $user = User::find($request->hidden_id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->updated_at = now();
        $user->update();
        return $user;
    }

    /**
     * Change Password
     */
    public function changePassword($request)
    {
        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
    }
}
