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
    <li class="nav-item">
        <a class="nav-link" href="/teams">
          <span class="icon-bg"><i class="bi bi-people" style="color:rgb(115, 193, 230)"></i></span>
          <span class="menu-title">Teams</span>
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

@else

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
    <li class="nav-item sidebar-user-actions">
      <div class="user-details">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <div class="d-flex align-items-center">
              <div class="sidebar-profile-img">
                <img src="/assets/images/faces/face28.png" alt="image">
              </div>
              <div class="sidebar-profile-text">
                <p class="mb-1">{{Auth::user()->name}}</p>
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

@endif











</nav>
