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

          @can('permission', 'wilayah')
          <li class="{{ request()->routeIs('wilayah.index') ? 'active' : '' }}">
            <a href="{{ route('wilayah.index') }}"><i class="bx bxs-map-alt"></i><span>Wilayah</span></a>
          </li>
          @endcan

          @can('permission', 'list-faskes')
          <li class="{{ request()->routeIs('faskes.index') ? 'active' : '' }}">
            <a href="{{ route('faskes.index') }}"><i class="bx bxs-business"></i><span>Faskes</span></a>
          </li>
          @endcan

          @can('permission', 'list-vaksin')
          <li class="{{ request()->routeIs('vaksin.index') ? 'active' : '' }}">
            <a href="{{ route('vaksin.index') }}"><i class="bx bxs-injection"></i><span>Vaksin</span></a>
          </li>
          @endcan

          @can('permission', 'list-kategori')
          <li class="{{ request()->routeIs('kategori.index') ? 'active' : '' }}">
            <a href="{{ route('kategori.index') }}"><i class='bx bxs-category'></i><span>Kategori</span></a>
          </li>
          @endcan


          @can('any-permission', [['list-pws-imunisasi-bayi', 'list-pws-imunisasi-baduta', 'list-pws-imunisasi-wus']])
          <li class="treeview {{ request()->is('dashboard/pws/*') ? 'active ' : '' }}">
            <a href="javascript:void(0)"><i class="bx bxs-book"></i><span>PWS</span>
              <i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu">

              @can('permission', 'list-pws-sasaran')
              <li class="{{ request()->is('dashboard/pws/sasaran*') ? 'active' : '' }}">
                <a href="{{ route('pws.sasaran') }}"><i class="bx bx-book"></i><span>Data Sasaran</span></a>
              </li>
              @endcan

              @can('permission', 'list-pws-imunisasi-bayi')
              <li class="{{ request()->is('dashboard/pws/imunisasi-bayi*') ? 'active' : '' }}">
                <a href="{{ route('pws.imunisasi-bayi') }}"><i class="bx bx-briefcase-alt-2"></i><span>Imunisasi Bayi</span></a>
              </li>
              @endcan

              @can('permission', 'list-pws-imunisasi-baduta')
              <li class="{{ request()->is('dashboard/pws/imunisasi-baduta*') ? 'active' : '' }}">
                <a href="{{ route('pws.imunisasi-baduta') }}"><i class="bx bx-briefcase-alt-2"></i><span>Imunisasi Baduta</span></a>
              </li>
              @endcan

              @can('permission', 'list-pws-imunisasi-wus-ibu-hamil')
              <li class="{{ request()->is('dashboard/pws/imunisasi-wus-ibu-hamil*') ? 'active' : '' }}">
                <a href="{{ route('pws.imunisasi-wus-ibu-hamil') }}"><i class="bx bx-briefcase-alt-2"></i><span>TT WUS Ibu Hamil</span></a>
              </li>
              @endcan

              @can('permission', 'list-pws-imunisasi-wus-tidak-hamil')
              <li class="{{ request()->is('dashboard/pws/imunisasi-wus-tidak-hamil*') ? 'active' : '' }}">
                <a href="{{ route('pws.imunisasi-wus-tidak-hamil') }}"><i class="bx bx-briefcase-alt-2"></i><span>TT WUS Tidak Hamil</span></a>
              </li>
              @endcan

            </ul>
          </li>
          @endcan
          

          
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