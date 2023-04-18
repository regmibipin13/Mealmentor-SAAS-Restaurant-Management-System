<?php

namespace App\Http\Controllers\Restaurants;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{

    public $defaultRole = User::USER_TYPE['restaurant_owner'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('users_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = User::where('restaurant_id', currentRestaurant()->id)->filters()->paginate(20);
        return view('restaurants.users.index', compact('users'));
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
        return view('restaurants.users.create', compact('roles'));
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
        ]);

        $request->merge(['user_type' => $this->defaultRole]);
        $request->merge(['is_admin_side' => 0]);
        $request->merge(['restaurant_id' => currentRestaurant()->id]);

        $user = User::create($request->except(['roles']));
        $user->roles()->sync($request->roles);
        return redirect()->route('restaurants.users.index', currentRestaurant()->slug ?? uniqid())->with('success', 'User Created Successfully');
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
        return view('restaurants.users.edit', compact('user', 'roles'));
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
        ]);

        $request->merge(['user_type' => $this->defaultRole]);
        $request->merge(['is_admin_side' => 0]);
        $request->merge(['restaurant_id' => currentRestaurant()->id]);

        $user->update($request->except(['roles']));
        $user->roles()->sync($request->roles);
        return redirect()->route('restaurants.users.index', currentRestaurant()->slug ?? uniqid())->with('success', 'User Updated Successfully');
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
