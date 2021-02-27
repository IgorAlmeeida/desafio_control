<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->

            <li class="nav-item dropdown mx-1">
                <div class="dropdown mt-3 no-arrow">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Serviços
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                        <a class="dropdown-item" href="">Listar</a>
                        <a class="dropdown-item" href="">Adicionar</a>
                    </div>
                </div>
            </li>


            <li class="nav-item dropdown mx-1 ml-3">
                <div class="dropdown mt-3 no-arrow">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Ordens de Serviços
                    </button>
                    <div class="dropdown-menu dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                        <a class="dropdown-item" href="">Listar</a>
                        <a class="dropdown-item" href="">Adicionar</a>
                    </div>
                </div>
            </li>


    </ul>
    <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">

            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @auth
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->email }}</span>
                <img class="img-profile rounded-circle"
                     src="{{asset('img/undraw_profile.svg')}}">

                @else
                    <i class="fa fa-angle-down"></i>
                @endauth

            </a>

            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="userDropdown">
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 sm:block">
                        @auth
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="dropdown-item"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="dropdown-item"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Register</a>
                            @endif
                        @endauth
                    </div>
                @endif

            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->
