<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\Attendance;
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
Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin/dashboard', function(){
        $users = User::all()->where('id','!=',6);
        foreach($users as $user){
            $todayAttendance = Attendance::whereDate('created_at', Carbon::today())->where('user_id',$user->id)->first();
            $user['today_attendance'] = $todayAttendance;
        }
         return view('admin',['users'=>$users]);
    });

});

/* Login */
Route::post('/login',[LoginController::class,'login']);


Route::get('/', function () {
    return view('login');
})->name('login');

/* Logout */
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});


/* Admin */


Route::get('/admin', function () {
    return view('admin');
});

Route::get('/admin/employees', function () {
    $users = User::all()->where('id','!=',6);
    $todayAttendance = Attendance::whereDate('created_at', Carbon::today())->with('user')->get();
    return view('adminEmployees',['users'=>$users,'todayAttendance'=>$todayAttendance]);
});
Route::get('/admin/add', function () {
    return view('form');
});

Route::get('/admin/calender', function () {
    $users = User::all();
    $attendances = Attendance::with('user')->get();
    return view('adminCalender', ['users'=>$users,'attendances'=>$attendances]);
});

Route::post('/user/add', [AdminController::class,'addUser']);


/* User*/

Route::get('/user/dashboard', function () {
    $data = Attendance::where('user_id',Auth::user()->id)->get();
    //   $todayAttendance = Attendance::where('created_at', '>=', Carbon::today())->where('user_id',Auth::user()->id)->first();
    $todayAttendance  = Attendance::where('user_id',Auth::user()->id)->whereDate('start_time',Carbon::today())->first();
    return view('user',['data'=>$data,'todayAttendance'=>$todayAttendance]);
});

Route::get('/user', function (){
    return view('user');
});
Route::post('/check-in',[UserController::class,'checkIn']);
Route::post('/check-out',[UserController::class,'checkOut']);




//Full calender
Route::get('calendar-event/{id}', [CalenderController::class, 'index']);
Route::post('calendar-crud-ajax', [CalenderController::class, 'calendarEvents']);
Route::get('/getUser',[UserController::class], 'getUser');





Route::get('/testing', function(){

    // $users = User::all();
    // foreach($users as $user){
    //     $todayAttendance = Attendance::where('user_id',$user->id)->whereDate('created_at', Carbon::yesterday())->first();
    //       if($todayAttendance){
    //     }
    //       else{
    //         Attendance::create([
    //             'user_id'=>$user->id,
    //             'availability'=>0
    //         ]);
    //       }
    // }

    $todayAttendance  = Attendance::where('user_id',Auth::user()->id)->whereDate('start_time',Carbon::today())->first();


if($todayAttendance->start_time == null)
{
    return  'show checkIn';
}


if($todayAttendance->end_time == null)
{
    return  'show checkout';
}


});
