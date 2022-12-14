<?php
namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class CalenderController extends Controller
{
    public function index(Request $request)
    {
        // if($request->ajax()) {
        //     $data = Event::whereDate('event_start', '>=', $request->start)
        //         ->whereDate('event_end',   '<=', $request->end)
        //         ->get(['id', 'event_name', 'event_start', 'event_end']);
        //     return response()->json($data);
        // }
         $user = Attendance::where('user_id',$request->id)->get();
         $absent = Attendance::where('availability',0)->get();
         return view('calender',['user'=>$user,'absent'=>$absent]);
    }

    public function calendarEvents(Request $request)
    {
        switch ($request->type) {
           case 'create':
              $event = Event::create([
                  'event_name' => 'lovely',
                  'event_start' => $request->event_start,
                  'event_end' => $request->event_end,
              ]);

              return response()->json($event);
             break;

           case 'edit':
              $event = Event::find($request->id)->update([
                  'event_name' => $request->event_name,
                  'event_start' => $request->event_start,
                  'event_end' => $request->event_end,
              ]);

              return response()->json($event);
             break;

           case 'delete':
              $event = Event::find($request->id)->delete();

              return response()->json($event);
             break;

           default:
             # ...
             break;
        }
    }
}
