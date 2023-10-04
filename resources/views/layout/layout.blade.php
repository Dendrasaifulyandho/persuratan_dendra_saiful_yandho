<html>

<head>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
    <title>@yield('title')</title>
    @yield('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Tautan ke SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    {{-- <!-- Tautan ke JavaScript Anda -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- ... tautan JavaScript lainnya ... --> --}}

    <!-- Tautan ke Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        /* Show it is fixed to the top */
        body {
            min-height: 75rem;
            padding-top: 5.5rem;
        }
        .navbar-right {
            display: inline-block;
            gap: 10px;
            
        }

        /* Style untuk tombol logout */
        .logout-button {
            background-color: #f44336; /* Warna merah */
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            margin-left: 10px;
        }

        .logout-button:hover {
            background-color: #d32f2f; /* Warna merah yang lebih gelap saat hover */
        }
        
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="http://127.0.0.1:8000">SURAT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Aplikasi Manajemen Persuratan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">aplikasi manajemen pengguna</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="http://127.0.0.1:8000/dashboard/perusahaan">Cabang</a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li> --}}
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                    <a href="#" class="logout-button">Logout</a>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        @include('layout.flash-message')
        @yield('content')
    </div>
</body>
<footer>
    @yield('footer')
</footer>
<html>