<?php
namespace App\Contracts\Services;

interface UserServiceInterface
{
    public function register($request);

    public function getUserList();

    public function doAddUser($request);

    public function forgotPassword($request);

    public function getResetData($request);

    public function resetPassword($request);
}
