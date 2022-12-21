<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Loan;
use App\Http\Requests\LoanRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $users = User::with('loan')->get();
        return view('loans.loan',['users'=>$users]);
    }

    public function store(LoanRequest $request)
    {

        foreach($request->employees as $employee){
            Loan::create([
                'total_amount'=>$request->total_amount,
                'reason'=>$request->reason,
                'user_id'=>$employee
            ]);

            $user = User::where('id',$employee)->first();
            $user->loan_amount = $user->loan_amount + $request->total_amount;
            $user->save();
        }
        return redirect('/admin/loan')->with(['success'=>'Request successfull!']);
    }

    public function deleteLoan($id)
    {
        
        $data = Loan::find($id);
        $user =  User::where('id',$data->user_id)->first();
        $user->loan_amount =  $data->total_amount > 0 ? $user->loan_amount - abs($data->total_amount) : $user->loan_amount + abs($data->total_amount) ;
        $user->save();
        $data->delete();
        return redirect()->back()->with(['success'=>'Record deleted successfully']);
        
    }
}
