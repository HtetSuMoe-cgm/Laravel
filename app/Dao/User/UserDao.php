<?php

namespace App\Dao\User;

use App\Contracts\Dao\UserDaoInterface;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserDao implements UserDaoInterface
{
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
}
