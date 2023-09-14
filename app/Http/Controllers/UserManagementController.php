<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserManagementController extends Controller
{
    public function view(User $user)
    {


      return view('modules.user-management.view', compact('user'));
    }
}
