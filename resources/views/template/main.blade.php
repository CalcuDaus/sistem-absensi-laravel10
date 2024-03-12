<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/dasify.css') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/img/logo-lkp.png') }}" type="image/png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Data Table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.min.css') }}">
    <script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>

</head>

<body>
    <aside id="sidebar">
        <div class="logo text-center mt-3">
            <img src="{{ asset('assets/img/logo-lkp.png') }}" alt="" width="100px" />
        </div>
        <nav class="mt-5">
            <ul class="menu-sidebar">
                <!-- S: Dashboard -->
                <li class="nav-btn {{ $title === 'Dashboard' ? 'nav-btn-active' : '' }}">
                    <img src="{{ asset('assets/img/icons-home.png') }}" width="22px" alt="" />
                    <a href="/admin">Dashboard</a>
                </li>
                <!-- E: Dashboard -->
                {{-- CREDENTIALS ADMIN --}}
                @auth
                    @if (auth()->user()->level == 'admin')
                        <li
                            class="nav-btn drop-nav c-pointer {{ $title === 'Master Data' ? 'nav-btn-active' : '' }} d-flex flex-column justify-content-start align-items-start">
                            <div class="">
                                <i class="fa-solid fa-table fa-lg"></i>
                                <a href="#" class="btn-dropdown">Data </a>
                            </div>
                            <i class="fa-solid fa-less-than less-than"></i>
                            <div class="dropdown-sidebar mt-2 ms-1 d-flex flex-column">
                                <ul>
                                    <li class="mt-2">
                                        <a href="/admin/siswa" class="d-flex align-items-center">
                                            <i class="fa-solid fa-crosshairs pe-2"></i>
                                            <span>Data Siswa</span>
                                        </a>
                                    </li>
                                    <li class="mt-2">
                                        <a href="/admin/sekolah" class="d-flex align-items-center">
                                            <i class="fa-solid fa-crosshairs pe-2"></i>
                                            <span>Sekolah</span>
                                        </a>
                                    </li>
                                    <li class="mt-2">
                                        <a href="/admin/jurusan" class="d-flex align-items-center">
                                            <i class="fa-solid fa-crosshairs pe-2"></i>
                                            <span>Jurusan</span>
                                        </a>
                                    </li>
                                    <li class="mt-2">
                                        <a href="/admin/periode" class="d-flex align-items-center">
                                            <i class="fa-solid fa-crosshairs pe-2"></i>
                                            <span>Periode</span>
                                        </a>
                                    </li>
                                    <li class="mt-2">
                                        <a href="/admin/instruktur" class="d-flex align-items-center">
                                            <i class="fa-solid fa-crosshairs pe-2"></i>
                                            <span>Instruktur</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @elseif(auth()->user()->level == 'instruktur')
                        <li class="nav-btn {{ $title === 'Absen Siswa' ? 'nav-btn-active' : '' }}">
                            <img src="{{ asset('assets/img/icons-user.png') }}" width="22px" alt="" />
                            <a href="{{ route('absen') }}">Absen Siswa</a>
                        </li>
                    @endif
                @endauth
                <!-- E: Table -->
                <!-- S: Setting -->
                <li class="nav-btn setting {{ $title === 'Pengaturan' ? 'nav-btn-active' : '' }}">
                    <img src="{{ asset('assets/img/icons-setting.png') }}" width="22px" alt="" />
                    <a href="/admin/pengaturan">Pengaturan</a>
                </li>
                <!-- E: Setting -->
                <li class="nav-btn c-pointer btn-shorten">
                    <i class="fa-solid fa-arrow-left"></i>
                </li>
            </ul>
        </nav>
    </aside>
    <main id="main">
        <header class="d-flex w-100 justify-content-between align-items-center">
            <div class="img-left d-flex justify-content-center align-items-center">
                <img src="{{ asset('assets/img/hamburger-icon.jpg') }}" alt=""
                    class="hamburger-icon icon-img" />
                <h4 class="ms-4 mt-2 company-name">LKP Utama Jaya</h4>
            </div>
            <div class="container-header d-flex">
                <div class="search">
                    <img src="{{ asset('assets/img/icons-search.png') }}" class="ms-4 search-img icon-img"
                        alt="" />
                    <input type="text" autofocus placeholder="search.." class="search-field" />
                </div>
                <div class="notif">
                    <img src="{{ asset('assets/img/icons-notification.png') }}" class="ms-4 icon-img" alt="" />
                    <div class="notif-count">2</div>
                    <div class="container-notif">
                        <div class="container">
                            <div class="row li-notif d-flex justify-content-center pt-3 pb-3 align-items-center">
                                <div class="col-1"><i class="fa-solid fa-envelope"></i></div>
                                <div class="col-7">
                                    <p class="fs-8">4 New Messages</p>
                                </div>
                                <div class="col-3">
                                    <p class="fs-7">3 mins</p>
                                </div>
                            </div>
                            <div class="row li-notif d-flex justify-content-center pt-3 pb-3 align-items-center">
                                <div class="col-1"><i class="fa-solid fa-envelope"></i></div>
                                <div class="col-7">
                                    <p class="fs-8">4 New Messages</p>
                                </div>
                                <div class="col-3">
                                    <p class="fs-7">3 mins</p>
                                </div>
                            </div>
                            <div class="row li-notif d-flex justify-content-center pt-3 pb-3 align-items-center">
                                <div class="col-1"><i class="fa-solid fa-envelope"></i></div>
                                <div class="col-7">
                                    <p class="fs-8">4 New Messages</p>
                                </div>
                                <div class="col-3">
                                    <p class="fs-7">3 mins</p>
                                </div>
                            </div>
                            <div class="row li-notif d-flex justify-content-center pt-3 pb-3 align-items-center">
                                <div class="col-1"><i class="fa-solid fa-envelope"></i></div>
                                <div class="col-7">
                                    <p class="fs-8">4 New Messages</p>
                                </div>
                                <div class="col-3">
                                    <p class="fs-7">3 mins</p>
                                </div>
                            </div>
                            <div class="row li-notif d-flex justify-content-center pt-3 pb-3 align-items-center">
                                <div class="col-1"><i class="fa-solid fa-envelope"></i></div>
                                <div class="col-7">
                                    <p class="fs-8">4 New Messages</p>
                                </div>
                                <div class="col-3">
                                    <p class="fs-7">3 mins</p>
                                </div>
                            </div>

                            <div class="row li-notif d-flex justify-content-center pt-3 pb-3 align-items-center">
                                <div class="col-1"><i class="fa-solid fa-envelope"></i></div>
                                <div class="col-7">
                                    <p class="fs-8">4 New Messages</p>
                                </div>
                                <div class="col-3">
                                    <p class="fs-7">3 mins</p>
                                </div>
                            </div>
                            <div class="row li-notif d-flex justify-content-center pt-3 pb-3 align-items-center">
                                <div class="col">
                                    <p class="fs-8">Show All Notification</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button-theme ms-3">
                    <button>
                        <i class="fa-solid fa-circle-half-stroke icon-img"></i>
                    </button>
                </div>
                <div class="profile">
                    <img src="{{ asset('assets/img/daus.png') }}" alt="" class="ms-4 profile-img" />
                    <div class="container-profile">
                        <div class="container">
                            <div class="row pt-2 pb-2 li-notif">
                                <div class="col fs-8">
                                    <i class="fa-solid fa-user pe-2"></i> Info Akun
                                </div>
                            </div>
                            <div class="row pt-2 pb-2 li-notif">
                                <div class="col fs-8">
                                    <a href="{{ route('logout') }}" class="text-decoration-none text-white"><i
                                            class="fa-solid fa-right-from-bracket pe-2"></i> logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <hr id="hr" />
        <div class="content">
            @yield('content')
            <footer>
                <p>
                    &copy; Dasify, Inc. All Rights Reserved.
                    <a target="_blank" class="text-cyan" href="https://instagram.com/e.about.us">Muhammad Firdaus</a>
                </p>
            </footer>
        </div>
    </main>
    <div class="wrapper-loader">
        <span class="loader"></span>
        <span class="text-loader">Loading...</span>
    </div>
    @if (session()->has('error'))
        <div class="alert alert-danger shadow position-absolute" style="top: 2%;right: 2%"
            onclick="hideElement(this)">
            {{ session('error') }} <i class="ms-2 fa-solid fa-x c-pointer"></i>
        </div>
    @endif

    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('assets/js/main-chart.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        new DataTable("#example");
    </script>
</body>

</html>
