<div class="flapt-sidemenu-wrapper">
  <!-- Desktop Logo -->
  <div class="flapt-logo">
    <a href="index.html"><img class="desktop-logo" src="img/core-img/logo.png" alt="Desktop Logo" />
      <img class="small-logo" src="img/core-img/small-logo.png" alt="Mobile Logo" /></a>
  </div>

  <!-- Side Nav -->
  <div class="flapt-sidenav" id="flaptSideNav">
    <!-- Side Menu Area -->
    <div class="side-menu-area">
      <!-- Sidebar Menu -->
      <nav>
        <ul class="sidebar-menu" data-widget="tree">
          <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}"><i class="bx bx-home"></i><span>Dashboard</span></a>
          </li>
          <li class="menu-header-title">Manajemen Akun</li>
          <li class="{{ request()->routeIs('role.index') ? 'active' : '' }}">
            <a href="{{ route('role.index') }}"><i class="bx bx-user-circle"></i><span>Role</span></a>
          </li>
          <li class="{{ request()->routeIs('user.index') ? 'active' : '' }}">
            <a href="{{ route('user.index') }}"><i class="bx bx-user"></i><span>User</span></a>
          </li>
          
        </ul>
      </nav>
    </div>
  </div>
</div>