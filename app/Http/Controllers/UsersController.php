<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

        /**
     * Show the form for editing user.
     *
     * @param  App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update an existing user.
     *
     * @param  \Illuminate\Http\Requests\UpdateUserRequest  $request
     * @param  App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user)
    {

        $user->update([
            'name' => $request->get('name'),
            'email' => $request->get('email')
        ]);
        

        $user->roles()->sync($request->get('role'));

        return redirect()->back()->with('success', 'User updated.');
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($user)
    {
        $user->delete();
        return redirect()->back();
    }
}
