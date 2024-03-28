
    <header class="mb-5">
        <div class="header-top">
            <div class="container">
                <script src="assets/static/js/initTheme.js"></script>
                <div class="logo">
                    @include('include.component-item.logo')
                </div>
                <div class="header-top-right">
                    @include('include.component-item.theme')
                    <div class="dropdown">

                        <a href="#" id="topbarUserDropdown" class="user-dropdown d-flex align-items-center dropend dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="avatar avatar-md2">
                                <img src="{{asset('dist/assets/compiled/jpg/1.jpg')}}" alt="Avatar">
                            </div>
                            <div class="text">
                                <h6 class="user-dropdown-name">{{ auth()->user()->name }}</h6>
                                <p class="user-dropdown-status text-sm text-muted">Member</p>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                            <li><a class="dropdown-item" href="{{ route('user.profile') }}">My Account</a></li>
                            <li><a class="dropdown-item" href="{{ route('userGetPassword') }}">Change Password</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="{{ route('pegawai-sdm.index') }}">CTH KSDM</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>

                    <!-- Burger button responsive -->
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </div>
            </div>
        </div>

        @include('include.top-menu-header.navbar-menu')

    </header>
