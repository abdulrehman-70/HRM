<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitLeaveRequest;
use App\Models\Attendance;
use App\Models\LeaveApplication;
use App\Models\User;
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

    public function submitLeave(SubmitLeaveRequest $request){
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        LeaveApplication::create($data);

        $data['leave_type'] = str_replace("_"," ",$request->leave_type);
        $data['leave_type'] = ucwords($data['leave_type']);

        $leaveType='';
        if($request->leave_type=='half_leave')
        {
            $data['half_leave_type'] = str_replace("_"," ",$request->half_leave_type);
            $data['half_leave_type'] = ucwords($data['half_leave_type']);
            $leaveType = $data['leave_type'].'('.$data['half_leave_type'].')';

        }
        else{
            $leaveType = $data['leave_type'];
        }
        $details = [
            'title' => 'Leave Request',
            'employee_name'=>'Employee Name: '.Auth::user()->name,
            'leave_Type'=>$leaveType,
            'from'=>'From: '.'('.$data['start_date'].' To:'.$data['end_date'].')',
            'body' => $data['reason']
        ];

        \Mail::to('abdul1rehmanashraf15@gmail.com')->send(new \App\Mail\sendLeaveMailToAdmin($details));
        return redirect('/user/request')->with(['success'=>'Request has been submitted successfully']);
    }

}
