<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::updateOrCreate(['email'=>'userlovely@1est.com'],[
            'name'=> 'lovely',
            'email'=>'userlovely@1est.com',
        'password'=> Hash::make('admin123')
         ]); 
     
    //  $user->assignRole('employee');
    }
}