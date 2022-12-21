<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;
use App\Models\InterviewStatus;
use App\Models\Interview;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\InterviewFormRequest;
use Illuminate\Foundation\Auth\User;
use Carbon\Carbon;

class InterviewController extends Controller
{
    public function createInterview(InterviewFormRequest $request)
    {
        $data = $request->all();
        $interview = Interview::create($data);
        // $date = Carbon\Carbon::parse( $request->date )->format('d-M-Y  g:i A' ) ;
        $details = [
            'title' => 'Interview Invite',
            'candidate_name'=>$request->candidate_name,
            'body' => 'Below is the invite link:',
            'meeting_link'=>$request->meeting_link,
            'Scheduled_Time'=>$request->date
        ];
        $mailDetails = [
            'title' => 'Scheduled Interview',
            'body' => 'Below is the invite link:',
            'meeting_link'=>$request->meeting_link,
            'Scheduled_Time'=>$request->date
        ];
        \Mail::to($request->candidate_email)->send(new \App\Mail\sendMailToCandidate($details));
        \Mail::to($request->employer_email)->send(new \App\Mail\sendMailToEmployer($mailDetails));
        
        return redirect('/interview/Index/')->with(['success'=>'Success!!']);
    }

    public function updateStatus(Request $request)
    {
        $data = $request->all();
        $data['remarks'] = $request->remarks;
        unset($data['_token']);
        
       $interview = Interview::where('id',$request->hiddenInterviewID)->first();
       $interview->interview_status_id = $request->selectField;
       $interview->remarks = $request->remarks;
       $interview->save();
       return redirect('/interview/Index/')->with(['success'=>'Success!!']);
    }
}
