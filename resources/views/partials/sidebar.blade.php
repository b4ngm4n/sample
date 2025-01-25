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
            <a href="{{ route('wilayah.index') }}"><i class="bx bx-home"></i><span>Wilayah</span></a>
          </li>

          <li class="{{ request()->routeIs('faskes.index') ? 'active' : '' }}">
            <a href="{{ route('faskes.index') }}"><i class="bx bx-home"></i><span>Faskes</span></a>
          </li>

          {{-- <li class="treeview {{ request()->is('dashboard/wilayah/*') ? 'active ' : '' }}">
            <a href="javascript:void(0)"><i class="bx bx-sitemap"></i><span>Wilayah</span>
              <i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              @can('permission', 'list-provinsi')
              <li class="{{ request()->is('dashboard/wilayah/provinsi*') ? 'active' : '' }}"><a
                  href="{{ route('provinsi.index') }}"><i class="bx bx-map-alt"></i>Provinsi</a></li>
              @endcan

              @can('permission', 'list-kabupaten')
              <li class="{{ request()->is('dashboard/wilayah/kabupaten*') ? 'active' : '' }}"><a
                  href="{{ route('kabupaten.index') }}"><i class="bx bx-map-alt"></i>Kabupaten</a></li>
              @endcan

              @can('permission', 'list-kecamatan')
              <li class="{{ request()->is('dashboard/wilayah/kecamatan*') ? 'active' : '' }}"><a
                  href="{{ route('kecamatan.index') }}"><i class="bx bx-map-alt"></i>Kecamatan</a></li>
              @endcan

              @can('permission', 'list-kelurahan')
              <li class="{{ request()->is('dashboard/wilayah/kelurahan*') ? 'active' : '' }}"><a
                  href="{{ route('kelurahan.index') }}"><i class="bx bx-map-alt"></i>Kelurahan</a></li>
              @endcan
            </ul>
          </li> --}}

          {{-- @can('any-permission', [['list-puskesmas', 'list-jenis-pelayanan', 'list-vaksin', 'list-pos']])
          <li class="treeview {{ request()->is('dashboard/pelayanan/*') ? 'active ' : '' }}">
            <a href="javascript:void(0)"><i class="bx bx-plus-medical"></i><span>Pelayanan</span>
              <i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              @can('permission', 'list-puskesmas')
              <li class="{{ request()->is('dashboard/pelayanan/puskesmas*') ? 'active' : '' }}">
                <a href="{{ route('puskesmas.index') }}"><i class="bx bx-buildings"></i><span>Puskesmas</span></a>
              </li>
              @endcan

              @can('permission', 'list-jenis-pelayanan')
              <li class="{{ request()->is('dashboard/pelayanan/jenis-pelayanan*') ? 'active' : '' }}">
                <a href="{{ route('jenis-pelayanan.index') }}"><i class="bx bx-grid-alt"></i><span>Jenis
                    Pelayanan</span></a>
              </li>
              @endcan

              @can('permission', 'list-vaksin')
              <li class="{{ request()->is('dashboard/pelayanan/vaksin*') ? 'active' : '' }}">
                <a href="{{ route('vaksin.index') }}"><i class="bx bx-first-aid"></i><span>Data Vaksin</span></a>
              </li>
              @endcan

              @can('permission', 'list-pos')
              <li class="{{ request()->is('dashboard/pelayanan/pos-pelayanan*') ? 'active' : '' }}">
                <a href="{{ route('pos-pelayanan.index') }}"><i class="bx bx-map-pin"></i><span>Pos Pelayan</span></a>
              </li>
              @endcan

            </ul>
          </li>
          @endcan --}}

          {{-- <li class="treeview">
            <a href="javascript:void(0)"><i class="bx bx-bug-alt"></i><span>Imunisasi</span>
              <i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="elegant-icons.html">PIN</a></li>
            </ul>
          </li> --}}

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

          {{-- @can('permission', 'pws')
          <li class="treeview {{ request()->is('dashboard/pws/*') ? 'active ' : '' }}">
            <a href="javascript:void(0)"><i class="bx bx-user-pin"></i><span>PWS</span>
              <i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li class="{{ request()->is('dashboard/pws/puskesmas*') ? 'active' : '' }}">
                <a href="{{ route('puskesmas.index') }}"><i class="bx bx-buildings"></i><span>Puskesmas</span></a>
              </li>
            </ul>
          </li>
          @endcan --}}

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