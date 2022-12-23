
@extends('layouts.applayout')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <div class="mt-2 mb-5">
                    <a href="/user/request/"> <button type="submit" class="btn btn-primary mr-2" style="background-color:
                        rgb(32, 185, 58);border:1px solid  rgb(32, 185, 58) ">Request Leave</button>
                    </a>
                </div>
                 <h3 class="card-description">Your Requests </h3>
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

                          </tr>
                          @endforeach
                      </tbody>
                      </table>
                    </div>

                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">  
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
                      </table>
                    </div>

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
                                <th scope="col">Reason</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                @foreach ($rejectedLeaves as $key1=>$rejectedLeave)
                                <th scope="row"> {{$key1+1}} </th>
                                <td>{{$rejectedLeave->user->name}}</td>
                                @if ($rejectedLeave->leave_type=='Half Leave')
                                <td>{{$rejectedLeave->leave_type.' '.'('.$rejectedLeave->half_leave_type.')'}}</td>
                                @else
                                <td>{{$rejectedLeave->leave_type}}</td>
                                @endif
                                <td>{{$rejectedLeave->start_date}}</td>
                                <td>{{$rejectedLeave->end_date}}</td>
                                <td>{{$rejectedLeave->status}}</td>
                                <td>{{$rejectedLeave->response}}</td>
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
    </div>
  </div>
  @endsection
