<div class="col-12">
  <div class="card">
    <div class="card-body card-breadcrumb">
      <div class="page-title-box d-flex align-items-center justify-content-between">
        <h4 class="mb-0">@yield('breadcrumbTitle')</h4>
        <div class="page-title-right">
          <ol class="breadcrumb m-0">
            @if (request()->is('dashboard/*/*'))
            @yield('breadcrumbParent')
            @endif
            <li class="breadcrumb-item active">@yield('breadcrumbActive')</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</div>