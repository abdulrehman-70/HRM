@extends('layouts.applayout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      @if(Session::get('success'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{Session::get('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
        @endif
      <div class="d-xl-flex justify-content-between align-items-start">
        <h2 class="text-dark font-weight-bold mb-2"> Tasks </h2>
        <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
            <ul class="nav nav-tabs tab-transparent" role="tablist">
              <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#" role="tab" aria-selected="true">Details</a>
              </li>
              <li>
              </li>
            </ul>
            <div class="d-md-block d-none">
          </div>
      </div>
      <div class="mt-3">
  </div>
  @if(Auth::user()->hasRole('admin'))

      <div class="mt-4">
              <a href="/task/form/"> <button type="submit" class="btn btn-primary mr-2" style="background-color:
                  rgb(32, 185, 58);border:1px solid  rgb(32, 185, 58) ">Add New Task</button>
              </a>
      </div>
  @endif
          <div class="tab-content tab-transparent-content">
            <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
              <div class="row d-flex justify-content-center">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body text-center" style="overflow: scroll">
                      <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Task Title</th>
                          <th scope="col">Description</th>
                          <th scope="col">Project Name</th>
                          <th scope="col">Assigned Team</th>
                          <th scope="col">Assigned Employee</th>
                          <th scope="col">Status</th>
                          <th scope="col">Time</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($tasks as $key=>$task)
                        <tr>
                         <td>{{ $key+1 }}</td>
                         <td>{{ $task->name }}</td>
                         <td>{{ $task->description }}</td>
                         <td>{{ $task->project->name }}</td>
                         <td>{{ $task->team->name }}</td>
                         <td>{{ $task->team_user->user->name }}</td>
                         <td>{{ $task->task_status->name }}</td>
                         <td>{{ Carbon\Carbon::parse( $task->date )->format('d-M-Y  g:i A' ) }}</td>
                         <td><a href="/task/{{$task->id}}/edit"><i class="bi bi-pencil-square" style="color:rgb(27, 216, 27)"></i></a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection