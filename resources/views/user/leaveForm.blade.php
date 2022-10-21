
@extends('layouts.applayout')

@section('content')

        <div class="main-panel">
            <div class="content-wrapper">
              <div class="page-header">
                {{-- <h3 class="page-title"> User Registration </h3> --}}
                {{-- <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                  </ol>
                </nav> --}}
              </div>
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                        @if(Session::get('success'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{Session::get('success')}}
                        </div>
                        @endif
                         <h3 class="card-description">Add Employee </h3>
                      <form class="forms-sample" method="POST" action="/user/leave/submit">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group ml-2">
                                 <p>Please select leave type:</p>
                                 <input type="radio" id="fLeave" name="leave_type" onchange="changeValue1()" value="full_leave">
                                  <label for="css"  class="mt-1">Full Leave</label><br>
                                  <input type="radio" id="hLeave" onchange="changeValue()" name="leave_type" value="half_leave">
                                   <label for="html" class="mt-1">Half Leave</label><br>
                                     @error('leaveType')
                                     <span class="error" style="color:red">{{ $message }}</span>
                                     @enderror
                                </div>
                              <div class="form-group ml-2" id="leaveCheckBoxes" style="display:none">
                                  <p>Select from below:</p>
                                  <input type="radio" id="halfLeave" name="half_leave_type" value="first_half">
                                  <label for="html" class="mt-1">First Half</label><br>
                                  <input type="radio" id="fullLeave" name="half_leave_type" value="second_half">
                                  <label for="css"  class="mt-1">Secod Half</label><br>
                                </div>

                                <div class="form-group">
                                <label for="start_date">From</label>
                                 <input type="date" class="form-control" name="start_date" id="start_date" value="{{old('start_date')}}">
                                 @error('start_date')
                                 <span class="error" style="color:red">{{ $message }}</span>
                                 @enderror
                                </div>
                                <div class="form-group">
                                    <label for="end_date">To</label>
                                     <input type="date" class="form-control" name="end_date" id="end_date" value="{{old('end_date')}}">
                                     @error('end_date')
                                     <span class="error" style="color:red">{{ $message }}</span>
                                     @enderror
                                    </div>
                                <div class="form-group">
                                    <label for="reason">Reason</label>
                                    <textarea class="form-control" name="reason" id="exampleTextarea1" value="{{old('reason')}}" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Attach</label>
                                    <div class="input-group col-xs-12">
                                      <input type="file"  class="form-control file-upload-info" name = "image">
                                      <span class="input-group-append">
                                      </span>
                                    </div>
                                    @error('image')
                                    <span class="error" style="color:red">{{ $message }}</span>
                                    @enderror
                                  </div>
                            </div>
                            </div>
                        <button type="submit" class="btn btn-primary mr-2" style="background-color:
                        rgb(115, 193, 230);border:1px solid  rgb(115, 193, 230) ">Submit</button>
                        <button class="btn btn-light">Cancel</button>
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


 @section('js')

<script>

function changeValue(){
 document.getElementById("leaveCheckBoxes").style.display = "block";
}

function changeValue1(){
 document.getElementById("leaveCheckBoxes").style.display = "none";
}
</script>
@endsection

</html>
