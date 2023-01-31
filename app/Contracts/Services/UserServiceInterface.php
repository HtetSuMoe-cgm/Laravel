<?php
namespace App\Contracts\Services;

use Illuminate\Http\Request;

interface UserServiceInterface{
    public function forgotPassword($request);

    public function getResetData($request);

    public function resetPassword($request);
}