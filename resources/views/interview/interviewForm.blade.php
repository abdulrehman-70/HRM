
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
                        

                      <h3 class="card-description">Schedule Interview</h3>
                      <form class="forms-sample" method="POST" action="/add/interview/form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputname1">Candidate Name:</label>
                                  <input type="name" name="candidate_name" value="{{old('candidate_name')}}" class="form-control">
                                  @error('candidate_name')
                                  <span class="error" style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName2">Employer Name:</label>
                                  <input type="name" name="employer_name" value="{{old('employer_name')}}" class="form-control">
                                  @error('employer_name')
                                  <span class="error" style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Date and Time">Select Date and Time:</label>
                                     <input type="datetime-local" class="form-control" name="date"  value="{{old('datetime')}}">
                                     @error('date')
                                     <span class="error" style="color:red">{{ $message }}</span>
                                     @enderror
                                </div>

                                <div class="form-group ml-2">
                                  <p>Interview Type:</p>
                                  <input type="radio" id="Online" name="interview_type" onchange="changeValue1()" value="online">
                                    <label for="html" class="mt-1">Online</label><br>
                                  <div id="inPerson">
                                     <input type="radio" name="interview_type" onchange="changeValue()" value="in_person">
                                    <label for="css"  class="mt-1">InPerson:</label><br>
                                  </div>
                                      @error('interview_type')
                                      <span class="error" style="color:red">{{ $message }}</span>
                                      @enderror
                                 </div>
                                 <div class="form-group" id="meeting_link" style="display:none">
                                  <label for="exampleInputName2">Meeting Link</label>
                                  <input type="text" name="meeting_link" value="" class="form-control">
                               </div>

                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Candidate Email:</label>
                                  <input type="email" name="candidate_email" value="{{ old('candidate_email') }}" class="form-control">
                                  @error('candidate_email')
                                  <span class="error" style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail2">Employer Email:</label>
                                  <input type="email" name="employer_email" value="{{ old('employer_email') }}"" class="form-control">
                                  @error('employer_email')
                                  <span class="error" style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>

                                <div class="form-group">
                                        <label for="exampleDesignation">Designation:</label>
                                        <select class="form-control" id="exampleDesignation" name="designation_id" value="{{ old('designation_id') }}"">
                                          @foreach ($designations as $designation)
                                              <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                          @endforeach
                                        </select> 
                                    @error('designation_id')
                                     <span class="error" style="color:red">{{ $message }}</span>
                                     @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInterviewStatus">Interview Status:</label>
                                    <select class="form-control" id="exampleInterviewStatus" name="interview_status_id" value="{{ old('InterviewStatus') }}">
                                      @foreach ($statuses as $status)
                                              <option value="{{ $status->id }}">{{ $status->name }}</option>
                                      @endforeach
                                    </select> 
                                    @error('interview_status_id')
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
          </div>
@endsection
@section('js')
<script>
function changeValue(){
  document.getElementById("meeting_link").style.display = "none";
 }
 
 function changeValue1(){
  document.getElementById("meeting_link").style.display = "block";

 }
 </script>
@endsection

