<?php

namespace App\Contracts\Dao;

interface UserDaoInterface{
    public function register($request);
    
    public function getUserList();

    public function dbAddUser($request);
    
    public function editUserForm($id);

    public function editUser($request,$id);

    public function deleteUser($id);
    
    public function forgotPassword($request,$token);

    public function getResetData($request);

    public function resetPassword($request);

    public function getUserId($id);

    public function updateProfile($data,$user);

    public function changePassword($request);
}