<nav class="sidebar sidebar-offcanvas" id="sidebar">



@if(Auth::user()->hasRole('admin'))

<ul class="nav mt-5">
  <li class="nav-item">
    <a class="nav-link" href="/admin/dashboard">
      <span class="icon-bg"><i class="mdi mdi-cube menu-icon" style="color:rgb(115, 193, 230)"></i></span>
      <span class="menu-title">Dashboard</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/admin/employees">
      <span class="icon-bg"><i class="mdi mdi-nature-people menu-icon" style="color:rgb(115, 193, 230)"></i></span>
      <span class="menu-title">Employees</span>
    </a>
  </li>

    <li class="nav-item">
      <a class="nav-link" href="/admin/calender">
        <span class="icon-bg"><i class="mdi mdi-table-large menu-icon" style="color:rgb(115, 193, 230)"></i></span>
        <span class="menu-title">Users Calender</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/admin/leave/requests">
        <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon" style="color:rgb(115, 193, 230)"></i></span>
        <span class="menu-title">Leave Requests</span>
      </a>
    </li>


    <li class="nav-item">
      <a class="nav-link" href="/admin/loan">
        <span class="icon-bg"><i class="mdi mdi-currency-usd menu-icon" style="color:rgb(115, 193, 230)"></i></span>
        <span class="menu-title">Loan</span>
      </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/salary/slip">
          <span class="icon-bg"><i class="bi bi-card-heading" style="color:rgb(115, 193, 230)"></i></span>
          <span class="menu-title">Salary Slip</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/teams">
          <span class="icon-bg"><i class="bi bi-people" style="color:rgb(115, 193, 230)"></i></span>
          <span class="menu-title">Teams</span>
        </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/interview/Index/">
        <span class="icon-bg"><i class="mdi mdi-calendar-question" style="color:rgb(115, 193, 230)"></i></span>
        <span class="menu-title">Interviews</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/clients/">
        <span class="icon-bg"><i class="mdi mdi-account-alert" style="color:rgb(115, 193, 230)"></i></span>
        <span class="menu-title">Clients</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/projects/">
        <span class="icon-bg"><i class="mdi mdi-target" style="color:rgb(115, 193, 230)"></i></span>
        <span class="menu-title">Projects</span>
      </a>
    </li>
  <li class="nav-item sidebar-user-actions">
    <div class="user-details mt-3">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          {{-- <div class="d-flex align-items-center">
            <div class="sidebar-profile-img">
              <img src="{{asset('storage/images/'.Auth::user()->image)}}" alt="image">

            </div>
            <div class="sidebar-profile-text">
              <p class="mb-1">{{@Auth::user()->name}}</p>
            </div>
          </div> --}}
          <a href="/logout" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
            <span class="menu-title">Log Out</span></a>
        </div>
        <!-- <div class="badge badge-danger">3</div> -->
      </div>
    </div>
  </li>
  <li class="nav-item sidebar-user-actions">
    <div class="sidebar-user-menu">
      {{-- <a href="/logout" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
        <span class="menu-title">Log Out</span></a> --}}
    </div>
  </li>
</ul>

@elseif(Auth::user()->hasRole('hr'))

<ul class="nav mt-5">
    <li class="nav-item">
      <a class="nav-link" href="/admin/dashboard">
        <span class="icon-bg"><i class="mdi mdi-cube menu-icon" style="color:rgb(115, 193, 230)"></i></span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="/admin/employees">
        <span class="icon-bg"><i class="mdi mdi-cube menu-icon" style="color:rgb(115, 193, 230)"></i></span>
        <span class="menu-title">Employees</span>
      </a>
    </li>

      <li class="nav-item">
        <a class="nav-link" href="/admin/calender">
          <span class="icon-bg"><i class="mdi mdi-table-large menu-icon" style="color:rgb(115, 193, 230)"></i></span>
          <span class="menu-title">Users Calender</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/admin/leave/requests">
          <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon" style="color:rgb(115, 193, 230)"></i></span>
          <span class="menu-title">Leave Requests</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/salary/slip">
          <span class="icon-bg"><i class="bi bi-card-heading" style="color:rgb(115, 193, 230)"></i></span>
          <span class="menu-title">Salary Slip</span>
        </a>
      </li>
    <li class="nav-item sidebar-user-actions">
      <div class="user-details">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            {{-- <div class="d-flex align-items-center">
              <div class="sidebar-profile-img">
                <img src="{{asset('storage/images/'.Auth::user()->image)}}" alt="image">

              </div>
              <div class="sidebar-profile-text">
                <p class="mb-1">{{@Auth::user()->name}}</p>
              </div>
            </div> --}}
            <a href="/logout" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
              <span class="menu-title">Log Out</span></a>
          </div>
          <!-- <div class="badge badge-danger">3</div> -->
        </div>
      </div>
    </li>
    <li class="nav-item sidebar-user-actions">
      <div class="sidebar-user-menu">
        {{-- <a href="/logout" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
          <span class="menu-title">Log Out</span></a> --}}
      </div>
    </li>
  </ul>

  @elseif(Auth::user()->hasRole('employee'))

<ul class="nav mt-5">
    <li class="nav-item">
      <a class="nav-link" href="/user/dashboard">
        <span class="icon-bg"><i class="mdi mdi-cube menu-icon" style="color:rgb(115, 193, 230)"></i></span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

      <li class="nav-item">
        <a class="nav-link" href="/user/request/check">
          <span class="icon-bg"><i class="mdi mdi-table-large menu-icon" style="color:rgb(115, 193, 230)"></i></span>
          <span class="menu-title">Leave Applications</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/employee/tasks/Todo">
          <span class="icon-bg"><i class="mdi mdi-target menu-icon" style="color:rgb(115, 193, 230)"></i></span>
          <span class="menu-title">Tasks</span>
        </a>
      </li>
    <li class="nav-item sidebar-user-actions">
      <div class="user-details mt-4">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            {{-- <div class="d-flex align-items-center">
              <div class="sidebar-profile-img">
                <img src="{{asset('storage/images/'.Auth::user()->image)}}" alt="image">
              </div>
              <div class="sidebar-profile-text">
                <p class="mb-1">{{Auth::user()->name}}</p>
              </div>
            </div> --}}
            <a href="/logout" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
              <span class="menu-title">Log Out</span></a>
          </div>
          <!-- <div class="badge badge-danger">3</div> -->
        </div>
      </div>
    </li>
    <li class="nav-item sidebar-user-actions">
      <div class="sidebar-user-menu">
        {{-- <a href="/logout" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
          <span class="menu-title">Log Out</span></a> --}}
      </div>
    </li>
  </ul>

@endif











</nav>
