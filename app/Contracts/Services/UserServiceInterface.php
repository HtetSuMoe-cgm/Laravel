<?php
namespace App\Contracts\Services;

interface UserServiceInterface
{
    public function forgotPassword($request);

    public function getResetData($request);

    public function resetPassword($request);
}
