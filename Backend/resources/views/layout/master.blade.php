<!DOCTYPE html>
<html lang="en">

  @include('layout.head')
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="/home" class="brand-logo">
                <img class="brand-title" src="assets/images/logo-text-white1.png" alt=""> 
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
            
        <!--**********************************
            Header start(menu)
        ***********************************-->
        <div class="header">
            @include('layout.header')
        </div>

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            @include('layout.sidebar')
        </div>
       
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            @yield('dycontent')
        </div>


        <!--**********************************
            Footer start
        ***********************************-->
         @include('layout.footer')
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    
</body>
</html>