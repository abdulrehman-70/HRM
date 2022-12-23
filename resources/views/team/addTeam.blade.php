@extends('layouts.applayout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="d-xl-flex justify-content-between align-items-start">
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
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#" role="tab" aria-selected="true">Create New Team</a>
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
  {{-- @if(Auth::user()->hasRole('admin'))

      <div class="mt-4">
              <a href="/admin/add"> <button type="submit" class="btn btn-primary mr-2" style="background-color:
                  rgb(32, 185, 58);border:1px solid  rgb(32, 185, 58) ">Add User</button>
              </a>
          </div>
  @endif --}}
          <div class="tab-content tab-transparent-content">
            <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card" id="capture">
                    <div class="card-body" style="color:black">
                        <form class="forms-sample" method="POST" action="/team-create" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <label for="exampleInputName1">Team Name</label>
                               <input type="text" name="name" value="{{old('name')}}" oninput="incentiveValue()"
                               class="form-control" id="incentive" >
                               @error('name')
                               <span class="error" style="color:red">{{ $message }}</span>
                               @enderror
                          </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Select Employee</label>
                                    <label for="select2Multiple"></label>
                                    <select class="select2-multiple form-control" name="users[]" class="form-control" multiple="multiple"
                                      id="select2Multiple">
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}">
                                            {{$user->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('users')
                                    <span class="error" style="color:red">{{ $message }}</span>
                                    @enderror
                                  </div>
                            <input type="hidden" id="user_id" name="user_id">
                            <button type="submit" class="btn btn-primary mr-2 download" style="background-color:
                            rgb(115, 193, 230);border:1px solid  rgb(115, 193, 230)" data-id="salary_slip" >Save</button>
                        </form>
                    </div>
                  </div>
                </div>

             </div>
            </div>
        </div>
    </div>



@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  $(document).ready(function() {
      // Select2 Multiple
      $('.select2-multiple').select2({
          placeholder: "Select",
          allowClear: true
      });

  });

</script>
<script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $('#myselect').select2({
    width: '100%',
    placeholder: "Select an Option",
    allowClear: true
  });
</script>

</script>

@endsection
