<!DOCTYPE html>
<html lang="en">
  <head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <title>admin</title>
 <!-- plugins:css -->
 <link rel="stylesheet" href="/assets/vendors/mdi/css/materialdesignicons.min.css">
 <link rel="stylesheet" href="/assets/vendors/flag-icon-css/css/flag-icon.min.css">
 <link rel="stylesheet" href="/assets/vendors/css/vendor.bundle.base.css">
 <!-- endinject -->
 <!-- Plugin css for this page -->
 <link rel="stylesheet" href="/assets/vendors/font-awesome/css/font-awesome.min.css" />
 <link rel="stylesheet" href="/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
 <!-- End plugin css for this page -->
 <!-- inject:css -->
 <!-- endinject -->
 <!-- Layout styles -->
 <link rel="stylesheet" href="/assets/css/style.css">
 <!-- End layout styles -->
  </head>
  <body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
              <a class="navbar-brand brand-logo" href="index.html"><img src="/images/logo.png" alt="logo" /></a>
                </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
              <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
              </button>
              <div class="search-field d-none d-xl-block">
                <form class="d-flex align-items-center h-100" action="#">

                </form>
              </div>
              <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item  dropdown d-none d-md-block">
                  <a class="nav-link dropdown-toggle" id="reportDropdown" href="#" data-toggle="dropdown" aria-expanded="false"> Reports </a>
                  <div class="dropdown-menu navbar-dropdown" aria-labelledby="reportDropdown">
                    <a class="dropdown-item" href="#">
                      <i class="mdi mdi-file-pdf mr-2"></i>PDF </a>
                  </div>
                </li>
                <li class="nav-item nav-profile dropdown">
                  <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <div class="nav-profile-img">
                      <img src="/assets/images/faces/face28.png" alt="image">
                    </div>
                    <div class="nav-profile-text">
                      <p class="mb-1 text-black">{{@Auth::user()->name}}</p>
                    </div>
                  </a>
                  <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                    <div class="p-3 text-center bg-primary">
                      <img class="img-avatar img-avatar48 img-avatar-thumb" src="/assets/images/faces/face28.png" alt="">
                    </div>
                    <div class="p-2">

                      <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="/logout">
                        <span>Log Out</span>
                        <i class="mdi mdi-logout ml-1"></i>
                      </a>
                    </div>
                  </div>
                </li>
              </ul>
              <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
              </button>
            </div>
          </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
          <!-- partial:../../partials/_sidebar.html -->
          <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav mt-5">
              <li class="nav-item">
                <a class="nav-link" href="/admin/dashboard">
                  <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                  <span class="menu-title">Dashboard</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/employees">
                  <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                  <span class="menu-title">Employees</span>
                </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/admin/add">
                    <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                    <span class="menu-title">Add User</span>
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/calender">
                      <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
                      <span class="menu-title">Users Calender</span>
                    </a>
                  </li>
              <li class="nav-item sidebar-user-actions">
                <div class="user-details">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <div class="d-flex align-items-center">
                        <div class="sidebar-profile-img">
                          <img src="/assets/images/faces/face28.png" alt="image">
                        </div>
                        <div class="sidebar-profile-text">
                          <p class="mb-1">{{@Auth::user()->name}}</p>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="badge badge-danger">3</div> -->
                  </div>
                </div>
              </li>
              <li class="nav-item sidebar-user-actions">
                <div class="sidebar-user-menu">
                  <a href="/logout" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
                    <span class="menu-title">Log Out</span></a>
                </div>
              </li>
            </ul>
          </nav>
          <!-- partial -->
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
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                      <h3 class="card-description">Add Employee </h3>
                      <form class="forms-sample" method="POST" action="/user/add">
                        @csrf
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">Name</label>
                                  <input type="text" name="name" class="form-control" id="exampleInputName1" >
                                  @error('name')
                                  <span class="error" style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Email address</label>
                                  <input type="email" name="email" class="form-control" id="exampleInputEmail3" >
                                </div>
                                @error('email')
                                <span class="error" style="color:red">{{ $message }}</span>
                                @enderror
                                <div class="form-group">
                                  <label for="exampleInputPassword4">Password</label>
                                  <input type="password" name="password"  class="form-control" id="exampleInputPassword4" >
                                  @error('password')
                                  <span class="error" style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>

                                <div class="form-group">
                                 <label for="exampleSelectGender">Gender</label>
                                  <select class="form-control"  name="gender"  id="exampleSelectGender">
                                   <option>Male</option>
                                   <option>Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="birthday">Birthday:</label>
                                 <input type="date" class="form-control" name="date_of_birth" id="birthday" name="birthday">
                                 @error('date_of_birth')
                                 <span class="error" style="color:red">{{ $message }}</span>
                                 @enderror
                                </div>
                                <div class="form-group">
                                    <label for="birthday">Date of joining</label>
                                     <input type="date" class="form-control" name="date_of_joining" id="birthday" name="birthday">
                                     @error('date_of_joining')
                                     <span class="error" style="color:red">{{ $message }}</span>
                                     @enderror
                                    </div>
                                <div class="form-group">
                                <label>Upload Image</label>
                                <input type="file" name="image" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                  <input type="text"  class="form-control file-upload-info" placeholder="">
                                  <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" style="background-color: rgb(115, 193, 230); border:none" type="button">Upload</button>
                                  </span>
                                </div>
                                @error('image')
                                <span class="error" style="color:red">{{ $message }}</span>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputCity1">Address</label>
                                <input type="text" name="address" class="form-control" id="exampleInputCity1">
                                @error('address')
                                  <span class="error" style="color:red">{{ $message }}</span>
                                  @enderror
                              </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleSelectGender">Designation</label>
                                     <select class="form-control" id="exampleSelectGender" name="designation">
                                      <option>Junior</option>
                                      <option>Senior</option>
                                      <option>Employee</option>
                                       </select>
                                       @error('designation')
                                       <span class="error" style="color:red">{{ $message }}</span>
                                       @enderror
                                   </div>
                                   <div class="form-group">
                                    <label for="salary">Salary</label>
                                    <input type="text" class="form-control" name="salary"  id="salary" placeholder="">
                                    @error('salary')
                                    <span class="error" style="color:red">{{ $message }}</span>
                                    @enderror
                                  </div>
                                <div class="form-group">
                                    <label for="contactNumber">Contact Number:</label>
                                    <input type="text" class="form-control" name="phone_number" id="contactNumber" placeholder="">
                                    @error('phone_number')
                                    <span class="error" style="color:red">{{ $message }}</span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="emergencyContactName">Emergency Contact Name</label>
                                    <input type="text" class="form-control"  name="emergency_contact_name" id="emergencyContactName" placeholder="">
                                    @error('emergency_contact_name')
                                    <span class="error" style="color:red">{{ $message }}</span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="emergencyContactNumber">Emergency Contact Number</label>
                                    <input type="text" class="form-control" name="emergency_phone_number"  id="emergencyContactNumber" placeholder="">
                                    @error('emergency_phone_number')
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
            <footer class="footer">
              <div class="footer-inner-wraper">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                  <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © codarttechnologies.com </span>
                </div>
              </div>
            </footer>
            <!-- partial -->
          </div>
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
      <!-- plugins:js -->
      <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
      <!-- endinject -->
      <!-- Plugin js for this page -->
      <script src="../../assets/vendors/select2/select2.min.js"></script>
      <script src="../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
      <!-- End plugin js for this page -->
      <!-- inject:js -->
      <script src="../../assets/js/off-canvas.js"></script>
      <script src="../../assets/js/hoverable-collapse.js"></script>
      <script src="../../assets/js/misc.js"></script>
      <!-- endinject -->
      <!-- Custom js for this page -->
      <script src="../../assets/js/file-upload.js"></script>
      <script src="../../assets/js/typeahead.js"></script>
      <script src="../../assets/js/select2.js"></script>
      <!-- End custom js for this page -->
  </body>
  </html>
