<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Title -->
    <title>@yield('title') - {{ env('APP_NAME') }}</title>

    {{-- For Stling --}}
    @include('partials.style')

    @stack('style')
</head>

<body>

    @include('sweetalert::alert')

    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader-book">
            <div class="inner">
                <div class="left"></div>
                <div class="middle"></div>
                <div class="right"></div>
            </div>
            <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </div>
    <!-- /Preloader -->

    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    <div class="flapt-page-wrapper">

        <!-- Sidemenu Area -->
        {{-- DISINI TEMPAT MENU --}}
        @include('partials.sidebar')

        <!-- Page Content -->
        <div class="flapt-page-content">
            <!-- Top Header Area -->
            {{-- DISINI TEMPAT HEADER --}}
            @include('partials.header')

            <!-- Main Content Area -->
            <div class="main-content introduction-farm">
                <div class="content-wraper-area">
                    <div class="dashboard-area">
                        <div class="container-fluid">
                            <div class="row g-4">

                                @if (!request()->is('dashboard'))
                                @include('partials.breadcrumb')
                                @endif

                                @yield('content')

                            </div>
                        </div>
                    </div>

                </div>

                <!-- Footer Area -->
                {{-- DISINI TEMPAT FOOTER --}}
                @include('partials.footer')
            </div>
        </div>
    </div>

    <!-- ======================================
    ********* Page Wrapper Area End ***********
    ======================================= -->

    {{-- FOR SCRIPT --}}
    @include('partials.script')
    @stack('script')

</body>

</html>