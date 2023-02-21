<?php

namespace App\Http\Controllers\User;

use App\Contracts\Services\UserServiceInterface;
use App\Exports\ExportUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\ImportUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Imports\ImportUser;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
        return view('user.admin.userList', compact('userList'));
    }

    /**
     * Show Create User Form
     */
    public function createUserForm()
    {
        return view('user.admin.create');
    }

    /**
     * Create User By Admin
     */
    public function createUser(CreateUserRequest $request)
    {
        $request->validated();
        $this->userService->doAddUser($request);
        return redirect()->route('userList.show');
    }

    /**
     * Show Edit User Form
     */
    public function editUserForm($id)
    {
        $user = $this->userService->editUserForm($id);
        return view('user.admin.edit', compact('user'));
    }

    /**
     * Edit User
     */
    public function editUser(UpdateUserRequest $request, $id)
    {
        $request->validated();
        $this->userService->editUser($request, $id);
        return redirect()->route('userList.show');
    }

    /**
     * Delete User
     */
    public function deleteUser($id)
    {
        $this->userService->deleteUser($id);
        return redirect()->route('userList.show');
    }

    /**
     * Import Exel View
     */
    public function importView(Request $request)
    {
        return view('importFile');
    }

    /**
     * Import User
     */
    public function importUsers(ImportUserRequest $request)
    {
        Excel::import(new ImportUser, $request->file('file')->store('files'));
        return redirect()->back();
    }

    /**
     * Export User
     */
    public function exportUsers(Request $request)
    {
        return Excel::download(new ExportUser, 'users.xlsx');
    }

    /**
     * View User Profile
     */
    public function userProfile($id)
    {
        $user = $this->userService->getUserId($id);
        return view('user.userProfile')->with(['user' => $user[0]]);
    }

    /**
     * Update User Profile
     */
    public function updateProfile(Request $request, $id)
    {
        $this->userService->updateProfile($request, $id);
        return redirect()->back()->with(['update_success' => __('messages.profile.update_success')]);
    }

    /**
     * Change Password Form
     */
    public function changePasswordForm()
    {
        return view('user.changePassword');
    }

    /**
     * Change Password
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        $request->validated();
        $this->userService->changePassword($request);
        return redirect()->back()->with(['changed_success' => __('messages.profile.password.changed_success')]);
    }
}
