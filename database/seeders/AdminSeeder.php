<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $admin = User::updateOrCreate(['email'=>'admin1@test.com'],[
            'name'=> 'admin1',
            'email'=>'admin1@test.com',
            'password'=> Hash::make('admin123')
         ]
     );
     $admin->assignRole('admin');
    }
}
