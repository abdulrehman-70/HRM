<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function checkIn(Request $request)
    {
       $data =  Attendance::create([
            'user_id'=>Auth::user()->id,
            'start_time'=> Carbon::now(),
            'availability'=>1
        ]);
        return redirect('/user/dashboard');
    }
    public function checkOut(Request $request)
    {
        $record = Attendance::whereDate('start_time', Carbon::today())->where('user_id',Auth::user()->id)->first();
        $record->end_time = Carbon::now();
        $record->save();
        return redirect('/user/dashboard');

    }

    public function test(){
        $attendances = Attendance::all();
        foreach($attendances as $attendance){
            $attendances = Attendance::where('availability', 0)->get();
          return $attendances;
        }
    }





}
