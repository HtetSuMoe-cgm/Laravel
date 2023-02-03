<?php

namespace App\Http\Controllers\User;

use App\Contracts\Services\UserServiceInterface;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserServiceInterface $userServiceInterface)
    {
        $this->userService = $userServiceInterface;
    }

    /**
     * 
     */
    public function Welcome()
    {
        return view('dashboard.welcome');
    }

    /**
     * User List
     */
    public function userList()
    {
        $userList = $this->userService->getUserList();
        return view('user.admin.userList',compact('userList'));
    }

    /**
     * Show Create User Form
     */
    public function createUserForm(){
        return view('user.admin.create');
    }
}
