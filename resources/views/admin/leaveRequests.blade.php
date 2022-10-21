
@extends('layouts.applayout')

@section('content')

        <div class="main-panel">
          <div class="content-wrapper">
            <div class="d-xl-flex justify-content-between align-items-start">
              <h2 class="text-dark font-weight-bold mb-2">  </h2>
              <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
                <div class="dropdown ml-0 ml-md-4 mt-2 mt-lg-0">
                  <button class="btn bg-white  p-3 d-flex align-items-center" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-calendar mr-1"></i>
                    {{ date('Y-m-d') }}
                  </button>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">

                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
                  <ul class="nav nav-tabs tab-transparent" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link" id="home-tab" data-toggle="tab" href="#" role="tab" aria-selected="true">Leave Requests</a>
                    </li>
                  </ul>
                  <div class="d-md-block d-none">
                  </div>
                </div>
                <div class="tab-content tab-transparent-content">
                  <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row d-flex justify-content-center">
                      <div class="col-12  grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">

                         {{-- Start --}}
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                                  aria-selected="true">Pending</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                                  aria-selected="false">Approved Leaves</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                                  aria-selected="false">Rejected Leaves</a>
                                </li>
                              </ul>
                              <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Employee Name</th>
                                    <th scope="col">Leave Type</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    @foreach ($pendingLeaves as $key1=>$pendingLeave)
                                    <th scope="row"> {{$key1+1}} </th>
                                    <td>{{$pendingLeave->user->name}}</td>
                                    @if ($pendingLeave->leave_type=='Half Leave')
                                    <td>{{$pendingLeave->leave_type.' '.'('.$pendingLeave->half_leave_type.')'}}</td>
                                    @else
                                    <td>{{$pendingLeave->leave_type}}</td>
                                    @endif
                                    <td>{{$pendingLeave->start_date}}</td>
                                    <td>{{$pendingLeave->end_date}}</td>
                                    <td>{{$pendingLeave->status}}</td>
                                    <td><button type="submit" class="btn btn-primary mr-2"
                                        data-toggle="modal" data-target="#exampleModal"
                                        style="background-color:
                                        rgb(115, 193, 230);border:1px solid  rgb(115, 193, 230)"
                                        onclick="setUserId({{$pendingLeave->user_id}},{{$pendingLeave->id}})">Response</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>

                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">  <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Employee Name</th>
                                        <th scope="col">Leave Type</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        @foreach ($approvedLeaves as $key1=>$approvedLeave)
                                        <th scope="row"> {{$key1+1}} </th>
                                        <td>{{$approvedLeave->user->name}}</td>
                                        @if ($approvedLeave->leave_type=='Half Leave')
                                        <td>{{$approvedLeave->leave_type.' '.'('.$approvedLeave->half_leave_type.')'}}</td>
                                        @else
                                        <td>{{$approvedLeave->leave_type}}</td>
                                        @endif
                                        <td>{{$approvedLeave->start_date}}</td>
                                        <td>{{$approvedLeave->end_date}}</td>
                                        <td>{{$approvedLeave->status}}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                                </table></div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Employee Name</th>
                                            <th scope="col">Leave Type</th>
                                            <th scope="col">Start Date</th>
                                            <th scope="col">End Date</th>
                                            <th scope="col">Status</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            @foreach ($rejectedLeaves as $key1=>$rejectedLeave)
                                            <th scope="row"> {{$key1+1}} </th>
                                            <td>{{$rejectedLeave->user->name}}</td>
                                            <td>{{$rejectedLeave->leave_type}}</td>
                                            <td>{{$rejectedLeave->start_date}}</td>
                                            <td>{{$rejectedLeave->end_date}}</td>
                                            <td>{{$rejectedLeave->status}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                </div>
                              </div>
                              {{-- Modal Start --}}
                              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Leave Action</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <form method="POST" action="/admin/request/response">
                                                @csrf
                                                <input type="hidden" id="setUserId"  name="user_id">
                                                <input type="hidden" id="setLeaveApplicationId"  name="leave_application_id">

                                             <div class="form-group ml-2">
                                                <p>Select from below:</p>
                                                <input type="radio" id="fLeave" name="status"  value="approved" @selected(true) onchange="changeValue1()">
                                                 <label for="css"  class="mt-1">Approve</label><br>
                                                 <input type="radio" id="hLeave"  name="status" value="rejected" onchange="changeValue()">
                                                  <label for="html" class="mt-1">Reject</label><br>
                                                    @error('leaveType')
                                                    <span class="error" style="color:red">{{ $message }}</span>
                                                    @enderror
                                               </div>
                                        <div id="modalTextArea" style="display: none">
                                            <label for="reason">Reason</label>
                                            <textarea class="form-control" name="response" id="exampleTextarea1" rows="4"></textarea>
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
                              {{-- Modal End --}}
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
        function changeValue(){
         document.getElementById("modalTextArea").style.display = "block";
        }

        function changeValue1(){
         document.getElementById("modalTextArea").style.display = "none";
        }
         function setUserId(id,leaveRequestId){
            console.log('leave Req',leaveRequestId)
            document.getElementById("setUserId").value =id;
            document.getElementById("setLeaveApplicationId").value =leaveRequestId;
        }
    </script>
@endsection



</html>
