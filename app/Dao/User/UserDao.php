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
    public function register($request){
        $data = $request->all();
        $check = $this->create($data);
    }

    /**
     * Get User List
     */
    public function getUserList(){
        $userList = DB::table('users')->get();
        return $userList;
    }

    /**
     * Create User By Admin
     */
    public function dbAddUser($request){
        $data = $request->all();
        $check = $this->create($data);
    }

    /**
     * Show Edit User Form
     */
    public function editUserForm($id){
        $user = User::find($id);
        return User::where('id', $user->id)->first();
    }

    /**
     * Edit User By Admin
     */
    public function editUser($request,$id){
        $user = User::find($request->hidden_id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->password = Hash::make($request->password_confirmation);
        $user->type = $request->type;
        $user->gender = $request->gender;
        $user->updated_at = now();
        // $data = $request->all();
        // $check = $this->create($data);
        $user->update();
        return $user;
    }

    public function deleteUser($id){
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
     * Create User
     */
    public function create(array $data)
    {
      return User::create([
        'username' => $data['username'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'gender' => $data['gender'],
        'type' => $data['type'],
        // 'created_at' => now(),
      ]);
    }
}
