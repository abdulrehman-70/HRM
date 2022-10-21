<?php

namespace App\Console\Commands;

use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class MarkAbsent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Mark:Absent';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $users = User::all();
        foreach($users as $user){
            $todayAttendance = Attendance::where('user_id',$user->id)->whereDate('created_at', Carbon::yesterday())->first();
              if($todayAttendance){
            }
              else{
                if(Carbon::now()->isWeekend())
                {

                }
                else{
                    Attendance::create([
                        'user_id'=>$user->id,
                        'availability'=>0,
                        'date'=>Carbon::yesterday()
                    ]);
                }
              }
        }

    }
}
