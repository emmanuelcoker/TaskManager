<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Services\RoleService;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['user', 'admin'];
        
        foreach ($roles as $role) {
            $roleService = new RoleService();
            $roleService->createRole($role);
        }
       
    }
}
