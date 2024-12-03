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

    <!-- Choose Layout -->
    {{-- DISNI TEMPAT --}}
    @include('partials.change_layout')

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
                    
                    @yield('content')
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