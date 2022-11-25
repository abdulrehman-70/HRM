
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
                        @if(Session::get('success'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{Session::get('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                      <h3 class="card-description">Add Employee </h3>
                      <form class="forms-sample" method="POST" action="/user/add" enctype="multipart/form-data">
                        @csrf
                        {{-- @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach --}}
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">Name</label>
                                  <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputName1" >
                                  @error('name')
                                  <span class="error" style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Email address</label>
                                  <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail3" >
                                  @error('email')
                                  <span class="error" style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword4">Password</label>
                                  <input type="password" name="password" value="{{old('password')}}" class="form-control" id="exampleInputPassword4" >
                                  @error('password')
                                  <span class="error" style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>

                                <div class="form-group">
                                 <label for="exampleSelectGender">Gender</label>
                                  <select class="form-control"  name="gender" value="{{old('gender')}}" id="exampleSelectGender">
                                   <option>Male</option>
                                   <option>Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="birthday">Birthday: </label>
                                 <input type="date" class="form-control" name="date_of_birth" value="{{old('date_of_birth')}}"
                                  id="birthday" >
                                 @error('date_of_birth')
                                 <span class="error" style="color:red">{{ $message }}</span>
                                 @enderror
                                </div>
                                <div class="form-group">
                                    <label for="birthday">Date of joining</label>
                                     <input type="date" class="form-control" name="date_of_joining"  value="{{old('date_of_joining')}}" id="birthday" >
                                     @error('date_of_joining')
                                     <span class="error" style="color:red">{{ $message }}</span>
                                     @enderror
                                    </div>
                                <div class="form-group">
                                <label>Upload Image</label>
                                <div class="input-group col-xs-12">
                                  <input type="file"  class="form-control file-upload-info" name = "image">
                                  <span class="input-group-append">
                                  </span>
                                </div>
                                @error('image')
                                <span class="error" style="color:red">{{ $message }}</span>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputCity1">Address</label>
                                <input type="text" name="address" value="{{old('address')}}" class="form-control" id="exampleInputCity1">
                                @error('address')
                                  <span class="error" style="color:red">{{ $message }}</span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleSelectGender">Designation</label>
                                     <select class="form-control" id="exampleSelectGender" name="designation" value="{{old('designation')}}">
                                        @foreach($designations as $designation)
                                        <option>
                                            {{ $designation->name}}
                                        </option>
                                        @endforeach

                                       </select>
                                       @error('designation')
                                       <span class="error" style="color:red">{{ $message }}</span>
                                       @enderror
                                   </div>
                                   <div class="form-group">
                                    <label for="salary">Salary</label>
                                    <input type="text" class="form-control" name="salary" value="{{old('salary')}}"  id="salary" placeholder="">
                                    @error('salary')
                                    <span class="error" style="color:red">{{ $message }}</span>
                                    @enderror
                                  </div>
                                <div class="form-group">
                                    <label for="contactNumber">Contact Number:</label>
                                    <input type="tel" class="form-control" name="phone_number" value="{{old('phone_number')}}" id="contactNumber" placeholder="">
                                    @error('phone_number')
                                    <span class="error" style="color:red">{{ $message }}</span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="emergencyContactName">Emergency Contact Name</label>
                                    <input type="text" class="form-control"  name="emergency_contact_name" value="{{old('emergency_contact_name')}}" id="emergencyContactName" placeholder="">
                                    @error('emergency_contact_name')
                                    <span class="error" style="color:red">{{ $message }}</span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="emergencyContactNumber">Emergency Contact Number</label>
                                    <input type="tel" class="form-control" name="emergency_phone_number"  value="{{old('emergency_phone_number')}}" id="emergencyContactNumber" placeholder="">
                                    @error('emergency_phone_number')
                                    <span class="error" style="color:red">{{ $message }}</span>
                                    @enderror
                                  </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2" style="background-color:
                        rgb(115, 193, 230);border:1px solid  rgb(115, 193, 230) ">Submit</button>
                        {{-- <button class="btn btn-light">Cancel</button> --}}
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->

            <!-- partial -->
          </div>
@endsection

