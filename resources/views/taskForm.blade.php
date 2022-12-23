@extends('layouts.applayout')
@section('content')
          <div class="main-panel">
            <div class="content-wrapper">
              <div class="page-header">

              </div>
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                        

                      <h3 class="card-description">Create Task</h3>
                      <form class="forms-sample" method="POST" action="/add/task/form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputname1">Task Title:</label>
                                  <input type="name" name="name" value="" class="form-control">
                                  @error('name')
                                  <span class="error" style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputname1">Description</label>
                                  <input type="name" name="description" value="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="selectInput">Select Project:</label>
                                  <select class="form-control" name="project_id" id="">
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="form-group">
                                    <label for="selectInput">Assign Team:</label>
                                  <select class="form-control selectTeam" onchange="changeValue()" name="team_id" id="team_id">
                                    <option selected="selected" id="defaulOptions">
                                        Select Team
                                    </option>
                                    @foreach ($teams as $team)
                                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                                    @endforeach
                                  </select>
                                </div>

                                <div class="form-group" style="display: none" id="userSelectBox">
                                    <label for="selectInput">Select Team Member:</label>
                                  <select class="form-control" name="team_user_id" id="selectUser">
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="selectInput">Select Status:</label>
                                <select class="form-control" name="task_status_id" id="">
                                  @foreach ($statuses as $status)
                                      <option value="{{ $status->id }}">{{ $status->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                                <button type="submit" class="btn btn-primary mr-2" style="background-color:
                                rgb(115, 193, 230);border:1px solid  rgb(115, 193, 230) ">Create</button>
                                {{-- <button class="btn btn-light">Cancel</button> --}}
                                </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        @section('js')
        <script>
            function changeValue()
            {
                document.getElementById("userSelectBox").style.display = "block";
                let team_id = document.getElementById("team_id").value;
                let teams = '<?php echo $teams; ?>';
                teams = JSON.parse(teams);
                let selectedTeam = teams.find((team)=>team.id == team_id)
                userOptions="";
                selectedTeam.users.forEach((user) => {
                userOptions += '<option value="' + user.pivot.id + '">' + user.name + '</option>'
                });
                document.getElementById('selectUser').innerHTML = userOptions;
            }
        </script>
       
       
        @endsection
@endsection