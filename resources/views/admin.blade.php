@extends('layouts.applayout')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="d-xl-flex justify-content-between align-items-start">
        <h2 class="text-dark font-weight-bold mb-2"> Dashboard </h2>
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
      @if(Session::get('success'))
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
              {{Session::get('success')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      @endif
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
            <ul class="nav nav-tabs tab-transparent" role="tablist">
              <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#" role="tab" aria-selected="true">Employees, Present Today</a>
              </li>
            </ul>
            <div class="d-md-block d-none">
            </div>
          </div>
          <div class="tab-content tab-transparent-content">
            <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
              <div class="row d-flex justify-content-center">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body text-center">
                      <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Check-In</th>
                          <th scope="col">Check-Out</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          @foreach ($users as $key=>$user)
                          <th scope="row"> {{$key+1}} </th>
                          <td><a href="/calendar-event/{{$user->id}}"> {{$user->name}} </a> </td>
                          <td>{{ Carbon\Carbon::parse( @$user['today_attendance']['start_time'] )->format('d-M-Y  g:i A' ) }}</td>
                          <td>{{ Carbon\Carbon::parse( @$user['today_attendance']['end_time'] )->format('d-M-Y  g:i A' ) }}</td>
                          
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
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
      <div class="footer-inner-wraper">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
        </div>
      </div>
    </footer>
    <!-- partial -->
  </div>
@endsection
