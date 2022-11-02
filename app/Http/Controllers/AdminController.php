<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Http\Requests\GenerateSalarySlipRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\SubmitResponseRequest;
use App\Models\Designation;
use App\Models\LeaveApplication;
use App\Models\SalarySlip;
use App\Models\Team;
use App\Models\TeamUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function addUser(RegisterUserRequest $request){
        $data= $request->all();
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        $user->assignRole('hr');
        return redirect('/admin/dashboard')->with(['success'=>'Employee has been added successfully']);
    }
    public function submitResponse(SubmitResponseRequest $request){
        $leaveRequest = LeaveApplication::where('user_id',$request->user_id)
        ->where('id',$request->leave_application_id)
        ->first();
        $leaveRequest->status = $request->status;
        $leaveRequest->response =$request->status=='approved'?'Leave Approved':$request->response;
        $leaveRequest->save();
        $details ='';
        if($leaveRequest->status=='approved')
        {
        $details = [
            'title' => 'codartTechnologies.com',
            'body' => 'Your leave have been approved.'
        ];
        }
        if($leaveRequest->status=='rejected')
        {
        $details = [

            'title' => 'codartTechnologies.com',
            'body' => 'Your leave have been rejected due to, '.$leaveRequest->response
        ];
        }

        \Mail::to('abdul1rehmanashraf15@gmail.com')->send(new \App\Mail\sendMail($details));
        return redirect('admin/leave/requests');
    }
    public function editUser($id){
        $user = User::find($id);
        $designations=Designation::all();
        return view('admin.editForm',['user'=>$user,'designations'=>$designations]);
    }
    public function editUserData(EditUserRequest $request){
        $data = $request->all();
        unset($data['_token']);
        if(isset($request->password))
        {
            $data['password'] = Hash::make($request->password);
        }
        else{
        unset($data['password']);

        }
        if(isset($request->image))
        {
            $data['image'] = $request->image;
        }
        User::where('id',$request->id)->update($data);
        return redirect('/admin/employees')->with(['success'=>'Employee has been updated successfully']);
    }
    public function deleteUser($id){
        User::find($id)->delete();
        return redirect('/admin/employees')->with(['success'=>'Employee has been deleted successfully']);
    }
    public function generateSalarySlip(GenerateSalarySlipRequest $request)
    {
         $data = $request->all();
         $data['meal_allowance'] = isset($request->meal_allowance) ? $request->meal_allowance : '2500';
         $user =  User::where('id',$request->user_id)->first();
         $data['basic_salary'] = $user->salary;
         SalarySlip::create($data);
         return redirect('salary/slip');
    }
    public function createTeam(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:teams,name',
            'users'=>'required'
        ]);
        $team = Team::create([
            'name'=>$request->name
        ]);
        foreach($request->users as $user)
        {
           TeamUser::create([
            'user_id' => $user,
            'team_id' => $team
           ]);

        }
        return redirect('/admin/dashboard')->with(['success'=>'Employee has been deleted successfully']);

    }
}
