<?php

namespace App\Http\Controllers;
use App\Models\Project;
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
}
