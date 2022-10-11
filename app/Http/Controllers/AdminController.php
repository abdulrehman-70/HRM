<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addUser(RegisterUserRequest $request){
        $data= $request->all();
        User::create($data);
        return redirect('/admin/add')->with(['success'=>'Employee has been added successfully']);
    }
}
