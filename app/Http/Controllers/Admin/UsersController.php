<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('users_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = User::filters()->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('users_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users'],
            'phone' => ['required', 'unique:users', 'digits:10'],
            'password' => ['required'],
            'type' => ['required'],
        ]);

        if ($request->type == 'admin') {
            $request->merge(['is_admin_side' => 1]);
        } else {
            $request->merge(['is_admin_side' => 0]);
        }

        $user = User::create($request->except(['type', 'roles']));
        $user->roles()->sync($request->roles);
        return redirect()->to('/admin/users')->with('success', 'User Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        abort_if(Gate::denies('users_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user->load(['roles']);
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required',],
            'phone' => ['required'],
            'password' => ['nullable'],
            'type' => ['required'],
        ]);

        if ($request->type == 'admin') {
            $request->merge(['is_admin_side' => 1]);
        } else {
            $request->merge(['is_admin_side' => 0]);
        }

        $user->update($request->except(['type', 'roles']));
        $user->roles()->sync($request->roles);
        return redirect()->to('/admin/users')->with('success', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'User Deleted Successfully');
    }
}
