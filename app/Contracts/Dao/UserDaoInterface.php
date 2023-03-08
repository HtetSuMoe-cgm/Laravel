<?php

namespace App\Contracts\Dao;

interface UserDaoInterface
{
    public function registerUser($user);

    public function getUserList();

    public function createUser($user);

    public function editUserForm($id);

    public function editUser($user, $id);

    public function deleteUser($id);

    public function forgotPassword($request, $token);

    public function getResetData($request);

    public function resetPassword($request);

    public function getUserId($id);

    public function updateUserProfile($data, $id);

    public function changePassword($request);
}
