<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- shortcut icon --}}
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/circle-logo.png') }}">
    {{-- Datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- my css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style1.css') }}">
    {{-- Fontawesome Libraries --}}
  <link href="{{ asset('assets/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('assets/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="{{asset('assets/css/vibrant-ink.min.css')}}">
  {{-- Notif Toast Js --}}
    <script src="{{ asset('assets/js/iziToast.min.js') }}"></script>
     {{-- Notif Toast Css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}">
    <title>{{ $judul }}</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">
                <img class="navbar-brand w-101 h-51" src="{{ asset('assets/img/lbp-blue.svg') }}">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item ms-3">
                        <a class="nav-link active fw-bolder" aria-current="page" href="/praktikum">Praktikum</a>
                    </li>
                    <li class="nav-item ms-3">
                        <a class="nav-link active fw-bolder" href="/peringkat">Peringkat</a>
                    </li>
                </ul>
                <!-- <div class="row"> -->
                <div class="col-9 container justify-content-lg-end">
                    <div class="container col d-flex justify-content-lg-end justify-content-sm-center">
                        <li class="nav-item dropdown d-flex">
                            <img class="w-51" src="{{ asset('assets/img/user-akun.png') }}">
                            <a class="nav-link dropdown-toggle text-reset" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::guard('praktikan')->user()->nama_praktikan }}
                            </a>
                            <ul class="dropdown-menu px-3" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="/dashboard">
                                        <img class="w-15 me-2"
                                            src="{{ asset('assets/img/icon-dashboard.png') }}">
                                        Dashboard
                                    </a>
                                </li>
                                <li><a class="dropdown-item" href="/pengaturan">
                                        <img class="w-15 me-2"
                                            src="{{ asset('assets/img/icon-pengaturan.png') }}">
                                        Pengaturan Akun
                                    </a>
                                </li>
                                <li><a class="dropdown-item" href="/praktikan/logout">
                                        <img class="w-15 me-2" src="{{ asset('assets/img/icon-keluar.png') }}">
                                        Keluar
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </div>

                </div>

                <!-- </div> -->
            </div>
        </div>
    </nav>

    @yield('konten')

    <!-- <footer class="text-center shadow p-3 mt-2 bg-body">Laboratorium Bahasa Pemrograman</footer> -->
    <div class="w-100 bg-white shadow bottom-0">
        <h6 class="text-center p-3 my-auto">Made With <i class="text-danger fa-solid fa-heart"></i> <span
                class="text-primary">By Laboratorium Bahasa Pemrograman</span></h6>
    </div>

    {{-- Notif --}}
    <script src="{{ asset('assets/js/notif.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

</body>

</html>
