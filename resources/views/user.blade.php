
@extends('layouts.applayout')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="d-xl-flex justify-content-between align-items-start">
        <h2 class="text-dark font-weight-bold mb-2"> Dashboard </h2>
        <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
          @if (!$todayAttendance)
          <div class="dropdown ml-0 ml-md-4 mt-2 mt-lg-0">
              <form method="POST" action="/check-in">
               @csrf
              <button class="btn bg-success text-white mt-3 p-3 d-flex align-items-center" type="submit" id="dropdownMenuButton1"
               aria-haspopup="true" aria-expanded="false"> Check in
              </button>
            </form>
          </div>
          @else
           @if(!($todayAttendance->end_time))
                   <div class="dropdown ml-0 ml-md-4 mt-2 mt-lg-0 mr-5">
                    <form method="POST" action="/check-out">
                      @csrf
                    <button class="btn bg-danger text-white  p-3 d-flex align-items-center" type="submit" id="dropdownMenuButton1"
                       aria-haspopup="true" aria-expanded="false" > Check out
                    </button>
                  </form>
                 </div>
          @endif
          @endif

          <div class="dropdown ml-0 ml-md-4 mt-2 mt-lg-0">
            <button class="btn bg-white  p-3 d-flex align-items-center" type="button" id="dropdownMenuButton1"
             aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-calendar mr-1"></i>
             {{ date('Y-m-d') }}
          </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">

            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">

          <div class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
            <ul class="nav nav-tabs tab-transparent" role="tablist">
              <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#" role="tab" aria-selected="true">Attendance</a>
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
                            <th scope="col">Day</th>
                            <th scope="col">Check In</th>
                            <th scope="col">Check Out</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            @foreach ($data as $key=>$dt)
                            <th scope="row">  {{date("D",strtotime($dt->created_at))}} &nbsp; {{'('}}{{date('Y-m-d')}}{{')'}}  </th>
                            <td>{{$dt->start_time}}</td>
                            <td>{{$dt->end_time}}</td>
                            <td></td>
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
  </div>
  @endsection


@section('js')


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/timer.jquery/0.7.0/timer.jquery.js"></script>
  <script>
      console.log('amdr');
      var startTime = '<?php echo @$todayAttendance->start_time; ?>';
     console.log('time:',startTime)
    //     startDate = new Date(Date.parse(startTime))
    //     currentDate = new Date($.now());
    //     var difference = (currentDate.getTime() - startDate.getTime()) / 1000;

    //   $('#clock').timer({
    //     seconds:difference
    // });
    </script>
@endsection



  </html>
