<?php

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
        $users = User::all();
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



Route::get('/admin/employees', function () {
    $users = User::all();
    $todayAttendance = Attendance::whereDate('created_at', Carbon::today())->with('user')->get();
    return view('adminEmployees',['users'=>$users,'todayAttendance'=>$todayAttendance]);
});

Route::get('/admin', function () {
    return view('admin');
});


/* User*/

Route::get('/user/dashboard', function () {
    $data = Attendance::where('user_id',Auth::user()->id)->get();
    //   $todayAttendance = Attendance::where('created_at', '>=', Carbon::today())->where('user_id',Auth::user()->id)->first();
    $todayAttendance  = Attendance::where('user_id',Auth::user()->id)->whereDate('created_at',Carbon::today())->first();
    return view('user',['data'=>$data,'todayAttendance'=>$todayAttendance]);
});

Route::get('/user', function () {
    return view('user');
});
Route::post('/check-in',[UserController::class,'checkIn']);
Route::post('/check-out',[UserController::class,'checkOut']);




//Full calender
Route::get('calendar-event', [CalenderController::class, 'index']);
Route::post('calendar-crud-ajax', [CalenderController::class, 'calendarEvents']);
Route::get('/getUser',[UserController::class], 'getUser');