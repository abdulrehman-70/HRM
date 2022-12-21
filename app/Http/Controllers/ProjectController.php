<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{
    public function create(ProjectRequest $request)
    {
        $data = $request->all();
        Project::create($data);
        return redirect('/projects/')->with(['success'=>'Project Added!']);
    }

    public function editProject($id)
    {
        $clients = Client::all();
        $data = Project::where('id',$id)->first();
        return view('projectEdit',['data'=>$data,'clients'=>$clients]);
    }
}
