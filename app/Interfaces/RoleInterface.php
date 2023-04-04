<?php

namespace App\Interfaces;


Interface RoleInterface
{
    public function allRoles();
    public function createRole($role_name);
    public function deleteRole($id);
    public function assignRole($user_id, $role_id);
    public function detachRole($user_id, $role_id);
}