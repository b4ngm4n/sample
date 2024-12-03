<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Title -->
    <title>@yield('title')</title>

    {{-- For Stling --}}
    @include('partials.style')

    @yield('style')
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

    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    <div class="main-content- h-100vh">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-sm-10 col-md-7 col-lg-5">
                    <!-- Middle Box -->
                    <div class="middle-box">
                        <div class="log-header-area p-4 mb-4 text-center">
                            <div class="lock-icon">
                                <i class='bx bx-error'></i>
                              </div>
                            @yield('content')
                        </div>

                        <div class="form-group text-center mb-3">
                            {{-- <button class="btn btn-primary w-100 btn-lg" type="submit">Unlock</button> --}}
                            <a href="{{ route('home') }}" class="btn btn-primary w-100 btn-lg">Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======================================
    ********* Page Wrapper Area End ***********
    ======================================= -->

    {{-- FOR SCRIPT --}}
    @include('partials.script')

    @yield('script')

</body>

</html>