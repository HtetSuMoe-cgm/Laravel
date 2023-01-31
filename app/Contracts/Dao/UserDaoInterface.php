<?php

namespace App\Contracts\Dao;

interface UserDaoInterface{
    public function forgotPassword($request,$token);

    public function getResetData($request);

    public function resetPassword($request);
}