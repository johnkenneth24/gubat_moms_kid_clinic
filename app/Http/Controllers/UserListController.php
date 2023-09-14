<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;



class UserListController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);

        return view('modules.user-list.index', compact('users'));
    }

    public function view(User $user){


      return view('modules.user-list.view', compact('user'));
    }

    
}
