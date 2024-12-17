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

          <li class="menu-header-title">Data</li>

          <li class="treeview {{ request()->is('dashboard/wilayah/*') ? 'active ' : '' }}">
            <a href="javascript:void(0)"><i class="bx bx-sitemap"></i><span>Wilayah</span>
              <i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              @can('permission', 'list-provinsi')
              <li class="{{ request()->is('dashboard/wilayah/provinsi*') ? 'active' : '' }}"><a
                  href="{{ route('provinsi.index') }}">Provinsi</a></li>
              @endcan

              @can('permission', 'list-kabupaten')
              <li class="{{ request()->is('dashboard/wilayah/kabupaten*') ? 'active' : '' }}"><a
                  href="{{ route('kabupaten.index') }}">Kabupaten</a></li>
              @endcan

              @can('permission', 'list-kecamatan')
              <li class="{{ request()->is('dashboard/wilayah/kecamatan*') ? 'active' : '' }}"><a
                  href="{{ route('kecamatan.index') }}">Kecamatan</a></li>
              @endcan

              @can('permission', 'list-kelurahan')
              <li class="{{ request()->is('dashboard/wilayah/kelurahan*') ? 'active' : '' }}"><a
                  href="{{ route('kelurahan.index') }}">Kelurahan</a></li>
              @endcan
            </ul>
          </li>

          @can('permission', 'list-puskesmas')
          <li class="{{ request()->is('dashboard/puskesmas*') ? 'active' : '' }}">
            <a href="{{ route('puskesmas.index') }}"><i class="bx bx-buildings"></i><span>Puskesmas</span></a>
          </li>
          @endcan

          @can('permission', 'list-jenis-pelayanan')
          <li class="{{ request()->is('dashboard/data-pelayanan/pelayanan*') ? 'active' : '' }}">
            <a href="{{ route('jenis-pelayanan.index') }}"><i class="bx bx-grid-alt"></i><span>Jenis
                Pelayanan</span></a>
          </li>
          @endcan

          @can('permission', 'list-vaksin')
          <li class="{{ request()->is('dashboard/data-pelayanan/vaksin*') ? 'active' : '' }}">
            <a href="{{ route('vaksin.index') }}"><i class="bx bx-first-aid"></i><span>Data Vaksin</span></a>
          </li>
          @endcan

          @can('permission', 'list-pos')
          <li class="{{ request()->is('dashboard/data-pelayanan/pos-pelayanan*') ? 'active' : '' }}">
            <a href="{{ route('pos-pelayanan.index') }}"><i class="bx bx-map-pin"></i><span>Pos Pelayan</span></a>
          </li>
          @endcan

          <li class="treeview">
            <a href="javascript:void(0)"><i class="bx bx-bug-alt"></i><span>Imunisasi</span>
              <i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="elegant-icons.html">PIN</a></li>
            </ul>
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