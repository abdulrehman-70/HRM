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
          <a class="nav-link " id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
            <div class="nav-profile-img">
              <img src="{{asset('storage/images/'.Auth::user()->image)}}" alt="">
            </div>
            <div class="nav-profile-text">
              <p class="mb-1 text-black">{{@Auth::user()->name}}</p>
            </div>
          </a>
          <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="profileDropdown" data-x-placement="bottom-end">
            {{-- <div class="p-3 text-center bg-primary">
              <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{asset('storage/images/'.Auth::user()->image)}}" alt="">
              <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{asset('storage/images/'.Auth::user()->image)}}" alt="image">

            </div> --}}
            {{-- <div class="p-2">

              <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="/logout">
                <span>Log Out</span>
                <i class="mdi mdi-logout ml-1"></i>
              </a>
            </div> --}}
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>
