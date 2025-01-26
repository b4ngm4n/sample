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

          <li class="{{ request()->routeIs('wilayah.index') ? 'active' : '' }}">
            <a href="{{ route('wilayah.index') }}"><i class="bx bxs-map-alt"></i><span>Wilayah</span></a>
          </li>

          <li class="{{ request()->routeIs('faskes.index') ? 'active' : '' }}">
            <a href="{{ route('faskes.index') }}"><i class="bx bxs-business"></i><span>Faskes</span></a>
          </li>


          @can('any-permission', [['list-role', 'list-user']])
          <li class="treeview {{ request()->is('dashboard/accounts/*') ? 'active ' : '' }}">
            <a href="javascript:void(0)"><i class="bx bxs-book"></i><span>PWS</span>
              <i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu">

              <li class="{{ request()->is('dashboard/accounts/user*') ? 'active' : '' }}">
                <a href="{{ route('user.index') }}"></i><span>Imunisasi Bayi</span></a>
              </li>
              <li class="{{ request()->is('dashboard/accounts/user*') ? 'active' : '' }}">
                <a href="{{ route('user.index') }}"></i><span>Imunisasi Baduta</span></a>
              </li>
              <li class="{{ request()->is('dashboard/accounts/user*') ? 'active' : '' }}">
                <a href="{{ route('user.index') }}"></i><span>Imunisasi TT WUS</span></a>
              </li>
            </ul>
          </li>
          @endcan
          

          <li class="menu-header-title">Pengaturan</li>

          @can('any-permission', [['list-role', 'list-user']])
          <li class="treeview {{ request()->is('dashboard/accounts/*') ? 'active ' : '' }}">
            <a href="javascript:void(0)"><i class="bx bxs-user-detail"></i><span>Akun</span>
              <i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              @can('permission', 'list-role')
              <li class="{{ request()->is('dashboard/accounts/role*') ? 'active' : '' }}">
                <a href="{{ route('role.index') }}"><i class="bx bx-user-circle"></i><span>Role</span></a>
              </li>
              @endcan

              @can('permission', 'list-user')
              <li class="{{ request()->is('dashboard/accounts/user*') ? 'active' : '' }}">
                <a href="{{ route('user.index') }}"><i class="bx bx-user"></i><span>User</span></a>
              </li>
              @endcan
            </ul>
          </li>
          @endcan

          @can('any-permission', [['list-table']])
          <li class="treeview {{ request()->is('dashboard/database/*') ? 'active ' : '' }}">
            <a href="javascript:void(0)"><i class="bx bx-data"></i><span>Database</span>
              <i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu">

              @can('permission', 'list-table')
              <li class="{{ request()->is('dashboard/database/table*') ? 'active' : '' }}">
                <a href="{{ route('table.index') }}"><i class="bx bx-table"></i><span>Table</span></a>
              </li>
              @endcan

            </ul>
          </li>
          @endcan

        </ul>
      </nav>
    </div>
  </div>
</div>