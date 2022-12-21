<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = ['admin','hr','employee'];

        foreach($roles as $role)
        {
            Role::updateOrCreate([
                     'name'=>$role
                ]);
            }
    }
}
