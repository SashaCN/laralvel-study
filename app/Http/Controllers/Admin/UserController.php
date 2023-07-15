<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users (){
        $userModel = new User();
        $users = $userModel->getUsers();
        return view('admin.users', ['users' => $users]);
    }
}
