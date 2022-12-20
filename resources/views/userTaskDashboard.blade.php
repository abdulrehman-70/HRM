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
        @if(Session::get('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{Session::get('error')}}
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
  
          <div class="tab-content tab-transparent-content">
            <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
              <div class="row d-flex justify-content-center">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body text-center" style="overflow: scroll">

                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach ($taskStatuses as $taskStatus)
                        @php 
                        $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                        $statusName =explode("/",$url);
                        $statusName = $statusName[count($statusName) - 1];
                        @endphp
                        <li class="nav-item">
                          <a class="nav-link {{ $statusName == $taskStatus->id ? 'active': '' }}" id="home-tab"  href="/employee/tasks/{{  $taskStatus->name }}/" role="tab" aria-controls="home"
                          aria-selected="true">{{ $taskStatus->name }}</a>
                        </li>
                        @endforeach                       
                      </ul>

                  <div class="tab-content" id="myTabContent">
                    {{-- All Tasks --}}
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Task Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Project Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Time</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($tasks as $key=>$task)
                              <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$task->name}}</td>
                              <td>{{$task->description}}</td>
                              <td>{{$task->project->name}}</td>
                              <td>{{$task->task_status->name}}</td>
                              <td>{{ Carbon\Carbon::parse( $task->date )->format('d-M-Y  g:i A' ) }}</td>
                              @if ($task->task_status->name == 'Done')
                              <td><button type="" disabled class="btn btn-primary mr-2 openModal" data-id="{{ $task->id }}"
                                data-toggle="modal" data-target="#exampleModal"
                                style="background-color: rgb(115, 193, 230);border:1px solid  rgb(115, 193, 230)">Change Status</button>
                              </td>  
                              @else
                              <td><button type="submit" class="btn btn-primary mr-2 openModal" data-id="{{ $task->id }}"
                                data-toggle="modal" data-target="#exampleModal"
                                style="background-color: rgb(115, 193, 230);border:1px solid  rgb(115, 193, 230)">Change Status</button>
                              </td>
                              @endif
                              </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <div class="form-group">
                                  <form method="POST" action="/update/task/status/">
                                      @csrf
                                      <input type="hidden" id="myId" name="hiddenTaskID" value="">
                                        <div class="dropdown bootstrap-select dropdown ">
                                            <label class="mt-2" for="exampleInterviewStatus">Select Status:</label>
                                            <select class="selectpicker" id="Field" name="modalTask" data-width="100%">
                                                @foreach ($taskStatuses as $taskStatus)
                                                    <option value="{{ $taskStatus->id }}">{{ $taskStatus->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" style="background-color:
                                rgb(115, 193, 230);border:1px solid  rgb(115, 193, 230) ">Submit</button>
                              </div>
                                  </form>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

@section('js')
<script>
$(document).on("click", ".openModal", function () {
  var taskId = $(this).data('id');
  $(".modal-body #myId").val( taskId );
  document.getElementByID('myID').value=taskId;
});
</script>
@endsection