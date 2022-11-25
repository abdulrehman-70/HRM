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
        <h2 class="text-dark font-weight-bold mb-2"> Loan </h2>
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
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#" role="tab" aria-selected="true">Loan History</a>
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
              <a href="/request/Loan"> <button type="submit" class="btn btn-primary mr-2" style="background-color:
                  rgb(32, 185, 58);border:1px solid  rgb(32, 185, 58) ">Request New Loan</button>
              </a>
          </div>
  @endif
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
                          <th scope="col">Loan Amount</th>
                          @if(Auth::user()->hasRole('admin'))
                          <th scope="col">Action</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $key=>$user)
                        <tr>
                        <th scope="row"> {{$key+1}} </th>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['loan_amount']}}</td>
                        <td><a href="/loan/history/{{ $user->id }}"><button type="submit" class="btn btn-primary mr-2" style="background-color:
                          rgb(115, 193, 230);border:1px solid  rgb(115, 193, 230)">Loan History</button></a></td>
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
