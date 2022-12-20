<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Models\Attendance;
use App\Models\Designation;
use App\Models\LeaveApplication;
use App\Models\SalarySlip;
use App\Models\Team;
use App\Models\TeamUser;
use App\Models\User;
use App\Models\Loan;
use App\Models\Interview;
use App\Models\InterviewStatus;
use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use App\Models\TaskStatus;
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

    Route::get('/employee/tasks/{status_name}/',function($status_name){
        $taskStatuses = TaskStatus::all();
        $taskStatusID = TaskStatus::where('name',$status_name)->first();
        $user = User::where('id',Auth::user()->id)->first();
        $tasks = $user->tasks->where("task_status_id",$taskStatusID->id);   
        return view('userTaskDashboard',['tasks'=>$tasks,'taskStatuses'=>$taskStatuses]);
    });
    Route::post('/update/task/status/',[TaskController::class,'updateStatus']);

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




/* Loan */
Route::get('/admin/loan',[LoanController::class,'index']);

Route::get('/request/Loan', function () {
    $users = User::all();
    return view('loans.requestLoan',['users'=>$users]);
});

Route::post('/request/Loan',[LoanController::class,'store']);

Route::get('/loan/history/{id}', function($id)
{
    $user = User::where('id',$id)->first();
    $loans = Loan::where('user_id',$id)->get();
    return view('loans.loanHistory',['user'=>$user, 'loans'=>$loans]);
});
Route::post('/loan/delete/{id}', [LoanController::class,'deleteLoan']);

//Interview
Route::get('/interview/Index/',function(){
    $interviews = Interview::with('designation','status')->get();
    $statuses = InterviewStatus::all();
    return view('interview.interviewIndex',['interviews'=> $interviews,'statuses'=>$statuses]);
});
Route::get('/interview/form/',function(){
    $designations = Designation::all();
    $statuses = InterviewStatus::all();
    return view('interview.interviewForm',['designations'=>$designations,'statuses'=>$statuses]);
});
Route::post('/add/interview/form/',[InterviewController::class,'createInterview']);
Route::post('/update/interview/status/',[InterviewController::class,'updateStatus']);

//Clients
Route::get('/clients/',function(){
    $clients = Client::all();
    return view('client',['clients'=>$clients]);
});
Route::get('/client/form',function(){
    return view('clientForm');
});
Route::post('/add/client/form/',[ClientController::class,'create']);
Route::post('/client/delete/{id}',[ClientController::class,'delete']);

//Projects
Route::get('/projects/',function(){
    $projects = Project::with('client')->get();
    return view('project',['projects'=>$projects]);
});
Route::get('/project/form',function(){
    $clients = Client::all();
    return view('projectForm',['clients'=>$clients]);
});
Route::post('/add/project/form/',[ProjectController::class,'create']);

//Tasks
Route::get('/tasks/',function(){
    $tasks = Task::with('project','team','team_user','task_status')->get();
    return view('task',['tasks'=>$tasks]);
});
Route::get('/task/form/',function(){
    $projects = Project::all();
    $teams = Team::with('users')->get();
    $statuses = TaskStatus::all();
    return view('taskForm',['projects'=>$projects,'teams'=>$teams,'statuses'=>$statuses]);
});
Route::post('/add/task/form/',[TaskController::class,'create']);

Route::get('/task/{id}/edit',function($id){
    $task = Task::where('id',$id)->first();
    $projects = Project::all();
    $teams = Team::with('users')->get();
    $statuses = TaskStatus::all();
    return view('taskEdit',['task'=>$task,'projects'=>$projects,'teams'=>$teams,'statuses'=>$statuses]);
});
Route::post('/update/task/form/{id}',[TaskController::class,'updateTask']);

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

