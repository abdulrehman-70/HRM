<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\UserController;
use App\Models\Attendance;
use App\Models\Designation;
use App\Models\LeaveApplication;
use App\Models\SalarySlip;
use App\Models\Team;
use App\Models\TeamUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/* Login */
Route::post('/login',[LoginController::class,'login']);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin/dashboard', function(){
        $users = User::all()->where('name','!=','admin');
        foreach($users as $user){
            $todayAttendance = Attendance::whereDate('created_at', Carbon::today())->where('user_id',$user->id)->first();
            $user['today_attendance'] = $todayAttendance;
        }
         return view('admin',['users'=>$users]);
    });

Route::group(['middleware' => 'AdminAndHrMiddleware'], function () {

    //Admin

    Route::get('/admin/employees', function () {
        $users = User::all()->where('name','!=','admin');
        $todayAttendance = Attendance::whereDate('created_at', Carbon::today())->with('user')->get();
        return view('adminEmployees',['users'=>$users,'todayAttendance'=>$todayAttendance]);
    });
    Route::get('/admin/add', function () {
        $designations=Designation::all();
        return view('form',['designations'=>$designations]);
    });

    Route::get('/admin/calender', function () {
        $users = User::all();
        $attendances = Attendance::with('user')->get();
        return view('adminCalender', ['users'=>$users,'attendances'=>$attendances]);
    });

    //salary
    Route::get('/salary/slip', function () {
        $users = User::all();
        foreach($users as $user)
        {
            $user->name = ucwords($user->name);
        }
        return view('salarySlip',['users'=>$users]);
    });

    Route::get('/salary/slip-generate', function () {
        $users = User::all();
        foreach($users as $user)
        {
            $user->name = ucwords($user->name);
        }
        return view('admin.generateSalarySlip',['users'=>$users]);
    });

    Route::get('/user/{id}/slips', function ($id) {
        $salarySlips = SalarySlip::where('user_id',$id)->get();

        $user = User::find($id) ;
        return view('admin.employeeSalarySlips',['salarySlips'=>$salarySlips,'user'=>$user]);

    });
    Route::get('/user/{id}/{salary_slip_id}/slip', function ($user_id,$salary_slip_id) {

        $salarySlip = SalarySlip::where('id',$salary_slip_id)->first();
        $user = User::where('id',$salarySlip->user_id)->first();
        return view('admin.printSalarySlip',['salarySlip'=>$salarySlip,'user'=>$user]);

    });
    Route::get('/teams', function () {
        $teams = Team::all();

        return view('team.teams',['teams'=>$teams]);
    });

    Route::get('/team/create', function () {
        $users = User::all();
        return view('team.addTeam',['users'=>$users]);
    });


    Route::post('/team-create',[AdminController::class,'createTeam']);
    Route::delete('/team/{id}/delete',[AdminController::class,'deleteTeam']);

    Route::get('/team/{id}/edit', function ($id) {
        $users = User::all();
        $team = Team::where('id',$id)->with('user')->first();
        $teamUsers = TeamUser::where('team_id',$id)->with('user')->get();
        return view('team.editTeam',['users'=>$users,'team'=>$team,'teamUsers'=>$teamUsers]);
    });
    Route::post('/team-update/{id}',[AdminController::class,'updateTeam']);


    Route::get('/team/{id}/members', function ($id) {
        $teamMembers =TeamUser::where('team_id',$id)->with('user','team')->get();
        $team = Team::where('id',$id)->first();
        return view('team.teamMembers',['teamMembers'=>$teamMembers,'team'=>$team]);
    });
    Route::delete('/team/{team_id}/member/{user_id}/delete',[AdminController::class,'deleteTeamMembers']);


    Route::post('/salary/slip/generate',[AdminController::class,'generateSalarySlip']);
    Route::post('/user/add', [AdminController::class,'addUser']);
    Route::get('/user/edit/{id}', [AdminController::class,'editUser']);
    Route::post('/user/edit/{id}', [AdminController::class,'editUserData']);
    Route::delete('/user/delete/{id}', [AdminController::class,'deleteUser']);
    Route::get('/admin/leave/requests', function () {
        $pendingLeaves = LeaveApplication::where('status','pending')->with('user')->get();
        $approvedLeaves = LeaveApplication::where('status','approved')->get();
        $rejectedLeaves = LeaveApplication::where('status','rejected')->get();

        foreach($pendingLeaves as $pendingLeave)
    {
        $pendingLeave->leave_type = str_replace("_"," ",$pendingLeave->leave_type);
        $pendingLeave->leave_type = ucwords($pendingLeave->leave_type);
        $pendingLeave->half_leave_type = str_replace("_"," ",$pendingLeave->half_leave_type);
        $pendingLeave->half_leave_type = ucwords($pendingLeave->half_leave_type);


    }
    foreach($approvedLeaves as $approvedLeave)
    {
        $approvedLeave->leave_type = str_replace("_"," ",$approvedLeave->leave_type);
        $approvedLeave->leave_type = ucwords($approvedLeave->leave_type);
        $approvedLeave->half_leave_type = str_replace("_"," ",$approvedLeave->half_leave_type);
        $approvedLeave->half_leave_type = ucwords($approvedLeave->half_leave_type);
    }
    foreach($rejectedLeaves as $rejectedLeave)
    {
        $rejectedLeave->leave_type = str_replace("_"," ",$rejectedLeave->leave_type);
        $rejectedLeave->leave_type = ucwords($rejectedLeave->leave_type);
        $rejectedLeave->half_leave_type = str_replace("_"," ",$rejectedLeave->half_leave_type);
        $rejectedLeave->half_leave_type = ucwords($rejectedLeave->half_leave_type);
    }

        return view('admin.leaveRequests',['pendingLeaves'=>$pendingLeaves,'rejectedLeaves'=>$rejectedLeaves,'approvedLeaves'=>$approvedLeaves]);
    });
    Route::post('/admin/request/response',[AdminController::class,'submitResponse']);



    //pdf
    Route::get('generate-pdf', [PDFController::class, 'generatePDF']);


        //Full calender
    Route::get('calendar-event/{id}', [CalenderController::class, 'index']);
    Route::post('calendar-crud-ajax', [CalenderController::class, 'calendarEvents']);
    Route::get('/getUser',[UserController::class], 'getUser');


});



Route::group(['middleware' => 'user'], function () {
    /* User*/

    Route::get('/user/dashboard', function () {
        $data = Attendance::where('user_id',Auth::user()->id)->get();
        //   $todayAttendance = Attendance::where('created_at', '>=', Carbon::today())->where('user_id',Auth::user()->id)->first();
        $todayAttendance  = Attendance::where('user_id',Auth::user()->id)->whereDate('start_time',Carbon::today())->first();
        return view('user',['data'=>$data,'todayAttendance'=>$todayAttendance]);
    });

    Route::post('/check-in',[UserController::class,'checkIn']);
    Route::post('/check-out',[UserController::class,'checkOut']);
    Route::post('/user/leave/submit',[UserController::class,'submitLeave']);

});



    /* Logout */
    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/');
    });


});


Route::get('/', function () {
    if(Auth::user())
    {
        return redirect('/user/dashboard');
    }
    return view('login');
})->name('login');




/* Admin */


Route::get('/admin', function () {
    return view('admin');
});


Route::get('/user', function (){
    return view('user');
});

Route::view('/user/request/','user.leaveForm');


Route::get('/user/request/check', function (){

    $pendingLeaves = LeaveApplication::where('user_id',Auth::user()->id)->where('status','pending')->with('user')->get();
    $approvedLeaves = LeaveApplication::where('user_id',Auth::user()->id)->where('status','approved')->get();
    $rejectedLeaves = LeaveApplication::where('user_id',Auth::user()->id)->where('status','rejected')->get();

    $string = "full_leave";
    $string=str_replace("_"," ",$string);
    foreach($pendingLeaves as $pendingLeave)
    {
        $pendingLeave->leave_type = str_replace("_"," ",$pendingLeave->leave_type);
        $pendingLeave->leave_type = ucwords($pendingLeave->leave_type);
        $pendingLeave->half_leave_type = str_replace("_"," ",$pendingLeave->half_leave_type);
        $pendingLeave->half_leave_type = ucwords($pendingLeave->half_leave_type);


    }
    foreach($approvedLeaves as $approvedLeave)
    {
        $approvedLeave->leave_type = str_replace("_"," ",$approvedLeave->leave_type);
        $approvedLeave->leave_type = ucwords($approvedLeave->leave_type);
        $approvedLeave->half_leave_type = str_replace("_"," ",$approvedLeave->half_leave_type);
        $approvedLeave->half_leave_type = ucwords($approvedLeave->half_leave_type);

    }
    foreach($rejectedLeaves as $rejectedLeave)
    {
        $rejectedLeave->leave_type = str_replace("_"," ",$rejectedLeave->leave_type);
        $rejectedLeave->leave_type = ucwords($rejectedLeave->leave_type);
        $rejectedLeave->half_leave_type = str_replace("_"," ",$rejectedLeave->half_leave_type);
        $rejectedLeave->half_leave_type = ucwords($rejectedLeave->half_leave_type);

    }
    return view('user.checkLeaveStatus',[
        'pendingLeaves'=>$pendingLeaves,
        'approvedLeaves'=>$approvedLeaves,
        'rejectedLeaves'=>$rejectedLeaves
    ]);
});




Route::get('/testing', function () {
    return view('test');
});

