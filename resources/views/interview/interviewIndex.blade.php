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
        <h2 class="text-dark font-weight-bold mb-2"> Interviews </h2>
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
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#" role="tab" aria-selected="true">Interviews Detail</a>
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
              <a href="/interview/form/"> <button type="submit" class="btn btn-primary mr-2" style="background-color:
                  rgb(32, 185, 58);border:1px solid  rgb(32, 185, 58) ">Schedule Interview</button>
              </a>
      </div>
  @endif
          <div class="tab-content tab-transparent-content">
            <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
              <div class="row d-flex justify-content-center">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body text-center" style="overflow: scroll">
                      <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Candidate Name</th>
                          <th scope="col">Employer Name</th>
                          <th scope="col">Designation</th>
                          <th scope="col">Time</th>
                          <th>Meeting Link</th>
                          <th scope="col">Type</th>
                          <th scope="col">Status</th>
                          <th scope="col">Remarks</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($interviews as $key=>$interview)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{ $interview->candidate_name }}</td>
                            <td>{{ $interview->employer_name }}</td>
                            <td>{{ $interview->designation->name}}</td>
                            <td> {{ Carbon\Carbon::parse($interview->date)->format('d-M-Y  g:i A' ) }}</td>
                            
                            @if($interview->status->name=='Pending')
                            <td><a href="{{ $interview->meeting_link }}">{{ $interview->meeting_link }}</a></td>
                            @else
                            <td style="color:rgb(178, 178, 178)">{{ $interview->meeting_link }}</td>
                            @endif
                            
                            <td>{{ $interview->interview_type }}</td>
                            <td>{{ $interview->status->name }}</td>
                            <td>{{ $interview->remarks }}</td>

                            @if($interview->status->name=='Pending')
                            <td><button type="submit" class="btn btn-primary mr-2 openModal" data-id="{{ $interview->id }}"
                              data-toggle="modal" data-target="#exampleModal"
                              style="background-color: rgb(115, 193, 230);border:1px solid  rgb(115, 193, 230)">Change Status</button>
                            </td>
                            @else
                            <td><button type="submit" disabled class="btn btn-primary mr-2 openModal" data-id="{{ $interview->id }}"
                              data-toggle="modal" data-target="#exampleModal"
                              style="background-color: rgb(115, 193, 230);border:1px solid  rgb(115, 193, 230)">Change Status</button>
                            </td>
                            @endif

                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                     {{-- Modal Start --}}
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
                                    <form method="POST" action="/update/interview/status">
                                        @csrf
                                        <input type="hidden" id="myId" name="hiddenInterviewID" value="">
                                          <div class="dropdown bootstrap-select dropdown ">
                                              <label class="mt-2" for="exampleInterviewStatus">Select Status:</label>
                                              <select class="selectpicker" id="Field" name="selectField" data-width="100%">
                                                  @foreach ($statuses as $status)
                                                  <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                  </div>

                                <div class="mt-2" id="" style="">
                                    <label for="reason">Remarks</label>
                                    <textarea class="form-control" name="remarks" id="exampleTextarea1" rows="4"></textarea>
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
                  
                    {{-- Modal End --}}
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
  var interviewId = $(this).data('id');
  $(".modal-body #myId").val( interviewId );
  document.getElementByID('myID').value=interviewId;
});
</script>
@endsection
