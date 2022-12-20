<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TaskStatus;
class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = array('Todo','In-Progress','QA','Done');
        foreach($statuses as $status)
        {
                TaskStatus::updateOrCreate([
                     'name'=>$status
                ]);
        }
    }
}
