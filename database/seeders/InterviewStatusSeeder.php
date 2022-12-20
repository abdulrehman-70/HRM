<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InterviewStatus;

class InterviewStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = array('Pending','Hired','Applicable for final interview','Rejected');
        foreach($statuses as $status)
        {
                InterviewStatus::updateOrCreate([
                     'name'=>$status
                ]);
        }
    }
}
