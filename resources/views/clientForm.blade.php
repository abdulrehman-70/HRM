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
                        

                      <h3 class="card-description">Add Client Info</h3>
                      <form class="forms-sample" method="POST" action="/add/client/form/" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputname1">Client Name:</label>
                                  <input type="name" name="name" value="" class="form-control">
                                  @error('name')
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