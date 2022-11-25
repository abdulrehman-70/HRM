@extends('layouts.applayout')
@section('content')
          <div class="main-panel">
            <div class="content-wrapper">
              
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
                      <h3 class="card-description">Request Loan </h3>
                      <form class="forms-sample" method="POST" action="/request/Loan" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">Enter Loan Amount:</label>
                                  <input type="text" name="total_amount" value="" class="form-control" id="exampleInputName1" >
                                  @error('total_amount')
                                  <span class="error" style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>

                        
                                 <div class="form-group ml-2">
                                  <p>Select employees:</p>
                                  @foreach ($users as $user)
                                  <fieldset id="group1">
                                  &nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="employees[]" value="{{ $user['id'] }}" >
                                 {{ $user['name'] }}
                                  </fieldset>
                                  @endforeach
                                  @error('employees')
                                  <span class="error" style="color:red">{{ $message }}</span>
                                  @enderror
                                  @error('employees.*')
                                  <span class="error" style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail3">Reason:</label>
                                  <input type="text" name="reason" value="" class="form-control" id="exampleInputEmail3" >
                                  @error('reason')
                                  <span class="error" style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>
                                <button type="submit" class="btn btn-primary" style="background-color:
                                rgb(115, 193, 230);border:1px solid  rgb(115, 193, 230) ">Submit</button>
                                {{-- <a href="/request/Loan"><button class="btn btn-light">Cancel</button></a> --}}
                            </div>
                            
                        </div>
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