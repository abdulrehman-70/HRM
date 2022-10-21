<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deignations = array("CEO", "CTO", "COO","Associate Software Engineer","Software Engineer","Senior Software Engineer","Intern",
        "Project Manager","Team Lead","Principal Software Engineer");
        foreach($deignations as $designation)
        {
                Designation::updateOrCreate([
                     'name'=>$designation
                ]);
            }
    }
}
