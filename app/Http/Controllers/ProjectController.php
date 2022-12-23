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
        $project = Project::where('id',$id)->with('client')->first();
        return view('projectEdit',['project'=>$project,'clients'=>$clients]);
    }
    public function updateProject(ProjectRequest $request, $id)
    {
        $data = $request->all();
        // return $data;
        unset($data['_token']);
        Project::where('id',$id)->update($data);
        return redirect('/projects/')->with(['success'=>'Project Updated!']);
    }
}
