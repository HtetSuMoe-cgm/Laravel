<?php

namespace App\Http\Controllers\User;

use App\Contracts\Services\UserServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use Illuminate\Http\Request;

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

    /**
     * Create User By Admin
     */
    public function createUser(CreateUserRequest $request){
        $request->validated();
        $this->userService->doAddUser($request);
        //return view('user.admin.userList');
        return redirect()->route('userList.show');
    }

    /**
     * Show Edit User Form
     */
    public function editUserForm($id){
        $user = $this->userService->editUserForm($id);
        return view('user.admin.edit', compact('user'));
    }

    /**
     * Edit User
     */
    public function editUser(Request $request,$id){
        $this->userService->editUser($request, $id);
        return redirect()->route('userList.show');
    }

    /**
     * Delete User
     */
    public function deleteUser($id){
        $this->userService->deleteUser($id);
        return redirect()->route('userList.show');
    }
}
