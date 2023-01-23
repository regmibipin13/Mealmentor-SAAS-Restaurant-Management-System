<?php

namespace App\Traits;

use App\Models\Permission;
use App\Models\Role;

trait HasRolesAndPermission
{
    public function givePermissionsTo(...$permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        if ($permissions === null) {
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }

    protected function giveRoles(...$roles)
    {
        $roles = $this->getAllRoles($roles);
        if ($roles == null) {
            return $this;
        }
        $this->roles()->saveMany($roles);
        return $this;
    }

    public function withdrawPermissionsTo(...$permissions)
    {

        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;
    }

    public function refreshPermissions(...$permissions)
    {

        $this->permissions()->detach();
        return $this->givePermissionsTo($permissions);
    }

    public function hasPermissionTo($permission)
    {

        return $this->hasPermissionThroughRole($permission);
    }

    public function hasPermissionThroughRole($permission)
    {

        foreach ($permission->roles as $role) {
            if ($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole(...$roles)
    {

        foreach ($roles as $role) {
            if ($this->roles->contains('name', $role)) {
                return true;
            }
        }
        return false;
    }

    public function roles()
    {

        return $this->belongsToMany(Role::class, 'user_roles');
    }

    protected function hasPermission($permission)
    {

        return (bool) $this->permissions->where('name', $permission->name)->count();
    }

    protected function getAllPermissions(array $permissions)
    {

        return Permission::whereIn('name', $permissions)->get();
    }

    protected function getAllRoles(array $roles)
    {
        return Role::whereIn('name', $roles)->get();
    }
}
