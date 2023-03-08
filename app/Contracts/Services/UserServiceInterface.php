<?php
namespace App\Contracts\Services;

interface UserServiceInterface
{
    public function registerUser($request);

    public function getUserList();

    public function createUser($request);

    public function editUserForm($id);

    public function editUser($request, $id);

    public function deleteUser($id);

    public function forgotPassword($request);

    public function getResetData($request);

    public function resetPassword($request);

    public function getUserId($id);

    public function updateUserProfile($request, $id);

    public function changePassword($request);
}
