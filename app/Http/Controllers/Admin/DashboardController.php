<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){
        return view('admin.index');
    }

    public function UsersList(){
        $users = User::where('role_as', '0')->get();
        return view('admin.users', compact('users'));
    }

    public function UsersDetails($id){
        $users = User::find($id);
        return view('admin.userdetails', compact('users'));
    }

}
