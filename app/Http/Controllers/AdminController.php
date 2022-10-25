<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\SubmitResponseRequest;
use App\Models\Designation;
use App\Models\LeaveApplication;
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
}
