<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\TeamUser;
use App\Models\TaskStatus;
use Carbon\Carbon;



class TaskController extends Controller
{
    public function create(TaskRequest $request)
    {
        $data = $request->all();
        $data['date']= Carbon::now()->format('Y-m-d H:i:s');        
        Task::create($data);
        return redirect('/tasks/')->with(['success'=>'Task added']);
    }

    public function updateTask(TaskRequest $request,$id){
        $data = $request->all();
        unset($data['_token']);
        Task::where('id',$request->id)->update($data);
        return redirect('/tasks/')->with(['success'=>'Task updated']);

    }

    public function updateStatus(Request $request)
    {
       $task = Task::where('id',$request->hiddenTaskID)->first();
       $taskStatus = TaskStatus::where('id',$task->task_status_id)->first();
       
       if($taskStatus->name == 'Done')
       {
        return redirect('/employee/tasks')->with(['error'=>'This task is closed']);
       }
       $task->task_status_id = $request->modalTask;
       
       $task->date = Carbon::now()->format('Y-m-d H:i:s');
       $task->save();
       return redirect('/employee/tasks/Todo')->with(['success'=>'Success!!']);
    }
}
