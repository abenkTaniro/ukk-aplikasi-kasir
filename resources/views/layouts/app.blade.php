<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ url('assets/images/logo.png') }}" type="image/x-icon">
    <title>Dashboard</title>

    <link rel="stylesheet" href="{{ url('assets/vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendors/boxicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
</head>

<body class="bg-soft-blue">
    <nav class="navbar navbar-expand-lg bg-white py-3">
        <div class="container-fluid">
            <a href="." class="navbar-brand logo">
                <img src="{{ url('assets/images/logo.png') }}" alt=""> KasirOnlen
            </a>
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                @if (Auth::user()->role == 'kasir')
                    <ul class="navbar-nav mx-auto gap-2">
                        <li class="nav-item">
                            <a href="{{ route('home') }}"
                                class="nav-link px-4 {{ request()->is('/') ? 'active' : '' }}">
                                <i class="bx bxs-dashboard"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('transaksi.index') }}"
                                class="nav-link px-4 {{ request()->is('produk') ? 'active' : '' }}">
                                <i class="bx bx-food-menu"></i> Transaksi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pelanggan.index') }}"
                                class="nav-link px-4 {{ request()->is('pelanggan') ? 'active' : '' }}">
                                <i class="bx bx-money"></i> Laporan
                            </a>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav mx-auto gap-2">
                        <li class="nav-item">
                            <a href="{{ route('home') }}"
                                class="nav-link px-4 {{ request()->is('/') ? 'active' : '' }}">
                                <i class="bx bxs-dashboard"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('produk.index') }}"
                                class="nav-link px-4 {{ request()->is('produk') ? 'active' : '' }}">
                                <i class="bx bx-food-menu"></i> Produk
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pelanggan.index') }}"
                                class="nav-link px-4 {{ request()->is('pelanggan') ? 'active' : '' }}">
                                <i class="bx bx-money"></i> Pelanggan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kasir.index') }}"
                                class="nav-link px-4 {{ request()->is('kasir') ? 'active' : '' }}">
                                <i class="bx bx-user-pin"></i> Kasir
                            </a>
                        </li>
                    </ul>
                @endif
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end mt-2">
                            <li><a class="dropdown-item" href="">{{Auth::user()->role}}</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="container-fluid py-5 px-1 px-lg-5">
        @yield('content')
    </section>

    <footer class="pt-5 pb-4">
        <div class="container">
            <p class="mb-0 text-center text-secondary fs-7">
                Copyright &copy; PT Onlenkan Teknologi Indonesia 2024. Seluruh hak cipta dilindungi.
            </p>
        </div>
    </footer>

    <script src="{{ url('assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
