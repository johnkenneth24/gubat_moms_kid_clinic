<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserManagementController extends Controller
{
  public function view(User $user)
  {
    $genders = ['Male', 'Female'];

    return view('modules.user-management.view', compact('user', 'genders'));
  }

  public function update(Request $request, User $user)
  {
    $validated = $request->validate([
      // 'firstname' => ['required', 'string', 'max:255'],
      // 'lastname' => ['nullable', 'string', 'max:255'],
      'middlename' => ['nullable', 'string', 'max:255'],
      'mother_name' => 'nullable',
      'father_name' => 'nullable',
      'age' => 'required',
      'suffix' => ['nullable', 'string', 'max: 5'],
      'gender' => ['required', 'string', 'max:255'],
      'birthdate' => ['required'],
      'contact_number' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:11'],
      'address' => ['required', 'string', 'max:255'],
    ]);

    $user->update($validated);

    return redirect()->back()->with('success', 'Successfully updated personal information!');
  }


  public function changePassword(Request $request, User $user)
  {
    // Validate the request data, including checking the old password.
    $request->validate([
      'newPassword' => 'required|string|min:8',
      'oldPassword' => 'required|string',
    ]);

    // Check if the old password matches the user's current password.
    if (!Hash::check($request->input('oldPassword'), $user->password)) {
      return back()->with('error', 'Old password is incorrect.');
    }

    // Update the user's password.
    $user->update([
      'password' => Hash::make($request->input('newPassword')),
    ]);

    return redirect()->back()->with('success', 'Password changed successfully!');
  }
}
