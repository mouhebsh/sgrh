       <style>
                              .logo-img{
                                height:50px;
                                width:50px;
                              } 
                              .logo-text{
                                font-family: Oswald; font-size: 24px; font-style: normal;
                                 font-variant: normal; font-weight: 100; line-height: 26.4px;
                                 color:black; opacity:70%;
                              
                              }
                              .topbar{
                                padding-right: 20px;
                              }
                            
                            </style>

        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    



                    @auth
                    <a class="navbar-brand" href="{{url('user')}}">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            
                            <img class="logo-img" src="{{asset('plugins/images/logo.png')}}"  alt="homepage" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <b> Satoripop </b>
                        </span>
                    </a>
                    @endauth
                    {{-- @guest
                    <a class="navbar-brand" href="{{url('login')}}">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            
                            <img class="logo-img" src="{{asset('plugins/images/logo.png')}}"  alt="homepage" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <b> Satoripop </b>
                        </span>
                    </a>
                    @endguest --}}





                   
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                   
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav ms-auto d-flex align-items-center">

                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        @guest
                        <li class=" in">
                            <a href="{{ url('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        </li>
                        @endguest
                        @auth
                        <li class=" in">
                            <a href="{{ url('logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Logout</a>

                        </li>
                        @endauth
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        @auth
                        <li>
                        
                            <a class="profile-pic " href="{{ url('/user/' . session('id')) }}">
                                <img src="{{asset('plugins/images/users/varun.jpg')}}" alt="user-img" width="36"
                                    class="img-circle"><span class="text-white font-medium">{{session('name')}}</span></a>
                        </li>
                        @endauth
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
 