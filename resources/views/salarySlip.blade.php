@extends('layouts.applayout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="d-xl-flex justify-content-between align-items-start">
        <h2 class="text-dark font-weight-bold mb-2">Salary Slip</h2>
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
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#" role="tab" aria-selected="true">Generate Salary Slip</a>
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
  @if(Auth::user()->hasRole('admin'))

      <div class="mt-4">
              <a href="/admin/add"> <button type="submit" class="btn btn-primary mr-2" style="background-color:
                  rgb(32, 185, 58);border:1px solid  rgb(32, 185, 58) ">Add User</button>
              </a>
          </div>
  @endif
          <div class="tab-content tab-transparent-content">
            <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
              <div class="row">
                <div class="col-5 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body" style="color:black">
                        <form class="forms-sample" method="POST" action="/user/add" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleSelectGender">Select Employee</label>
                                <select class="form-control" id="user" onchange="setUserValue()" name="user" value="{{old('user')}}">
                                    @foreach($users as $user)
                                    <option>
                                        {{$user->name}}
                                    </option>
                                    @endforeach
                                </select>
                               </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Incentive Pay</label>
                              <input type="text" name="incentive" value="{{old('incentive')}}" class="form-control" id="exampleInputName1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">House Rent</label>
                              <input type="text" name="house_rent" value="{{old('house_rent')}}" class="form-control" id="exampleInputName1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Meal Allowance</label>
                              <input type="text" name="meal_allowance" value="{{old('meal_allowance')}}" class="form-control" id="exampleInputName1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Provident Fund</label>
                              <input type="text" name="provident_fund" value="{{old('provident_fund')}}" class="form-control" id="exampleInputName1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Professional Tax</label>
                              <input type="text" name="professional_text" value="{{old('professional_text')}}" class="form-control" id="exampleInputName1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Loan</label>
                              <input type="text" name="loan" value="{{old('loan')}}" class="form-control" id="exampleInputName1" >
                            </div>
                            <button type="submit" class="btn btn-primary mr-2" style="background-color:
                            rgb(115, 193, 230);border:1px solid  rgb(115, 193, 230) ">Generate</button>
                        </form>
                    </div>
                  </div>
                </div>
                <div class="col-7 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body" style="color:black">
                       <div class="text-center">
                         <h3>CODART TECHNOLOGIES</h3>
                         <h4>18H DHA Phase1, 1st Floor Lahore</h4>
                         <h5>Salary Slip</h5>
                       </div>
                       <div >
                          <h6>Employee Name:</h6>
                          <h6>Designation:</h6>
                          <h6>Date:</h6>
                       </div>
                       <table class="table mt-5">
                          <thead>
                              <tr>
                                  <th scope="col"><b>Account Number</b></th>
                                  <th scope="col"></th>
                                  <th scope="col"><b>030313131313113</b></th>
                                  <th scope="col"></th>
                                  <th scope="col"></th>
                                  <th scope="col"></th>
                              </tr>
                              <tr>
                                  <th scope="col"><b>Earnings</b></th>
                                  <th scope="col"></th>
                                  <th scope="col"><b>Amount</b></th>
                                  <th scope="col"><b>Deduction</b></th>
                                  <th scope="col"></th>
                                  <th scope="col"><b>Amount</b></th>
                              </tr>
                          </thead>
                          <tbody>
                          <tr>
                              <td>Basic</td>
                              <td></td>
                              <td>30000</td>
                              <td>Provident Fund</td>
                              <td></td>
                              <td>0</td>
                          </tr>
                          <tr>
                              <td>Incentive Pay</td>
                              <td></td>
                              <td>0</td>
                              <td>Professional Tax</td>
                              <td></td>
                              <td>0</td>
                          </tr>
                          <tr>
                              <td>House Rent</td>
                              <td></td>
                              <td>0</td>
                              <td>Loan</td>
                              <td></td>
                              <td>0</td>
                          </tr>
                          <tr>
                              <td>Meal Allowance</td>
                              <td></td>
                              <td>2500</td>
                              <td></td>
                              <td></td>
                              <td></td>

                          </tr>
                          <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                          </tr>
                          <tr>
                              <td></td>
                              <td><b>Total Earnings</b></td>
                              <td><b>32500</b></td>
                              <td><b>Total Deduction</b></td>
                              <td></td>
                              <td>0</td>
                          </tr>
                          <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td><b>Net Pay</b></td>
                              <td><b>45000</b></td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
             </div>


@endsection

@section('js')

<script>




</script>

@endsection
