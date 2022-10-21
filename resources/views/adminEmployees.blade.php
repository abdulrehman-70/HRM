@extends('layouts.applayout')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="d-xl-flex justify-content-between align-items-start">
        <h2 class="text-dark font-weight-bold mb-2"> Employees </h2>
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
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#" role="tab" aria-selected="true">Total Employees</a>
              </li>
              <li>
              </li>
            </ul>
            <div class="d-md-block d-none">
          </div>
      </div>
      <div class="mt-3">
      @if(Session::get('success'))
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
              {{Session::get('success')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      @endif
  </div>
      <div class="mt-4">
              <a href="/admin/add"> <button type="submit" class="btn btn-primary mr-2" style="background-color:
                  rgb(32, 185, 58);border:1px solid  rgb(32, 185, 58) ">Add User</button>
              </a>
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
                          <th scope="col">Email</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          @foreach ($users as $key=>$user)
                          <th scope="row"> {{$key+1}} </th>
                          <th scope="row"> <a href="/calendar-event/{{$user->id}}">{{$user->name}} </a></th>
                          <td>{{$user->email}}</td>
                          <td>
                          <div class="d-flex justify-content-center">
                              <a href="/user/edit/{{$user->id}}"><i class="bi bi-pencil-square" style="color:rgb(27, 216, 27)"></i></a>
                              <form  method="POST" action="/user/delete/{{$user->id}}">
                                  @csrf
                                  {{ method_field('DELETE') }}
                                <button style="background:none;border:none" type="submit"><i class="bi bi-archive-fill ml-2" style="color:rgb(230, 45, 45)"></i></button>
                              </form>
                          </div>
                          </td>
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
