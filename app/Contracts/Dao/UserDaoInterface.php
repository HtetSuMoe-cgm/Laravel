<?php

namespace App\Contracts\Dao;

use Illuminate\Http\Request;

interface UserDaoInterface{
    public function forgotPassword($request,$token);

    public function getResetData($request);

    public function resetPassword($request);
}