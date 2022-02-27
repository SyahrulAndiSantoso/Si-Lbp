<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- shortcut icon --}}
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/circle-logo.png') }}">
    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     {{-- Fontawesome Libraries --}}
  <link href="{{ asset('assets/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css">
    {{-- my css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style1.css') }}">
    <title>{{ $judul }}</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">
                <img class="navbar-brand w-101 h-51" src="{{ asset('assets/img/lbp-blue.svg') }}">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <div class="container d-flex justify-content-center">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active fw-bold mx-2" aria-current="page" href="/">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active fw-bold mx-2" href="#">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active fw-bold mx-2" href="/panduan">Panduan</a>
                        </li>
                    </ul>
                </div>

                <div class="contaner d-flex justify-content-lg-end justify-content-sm-center justify-content-center">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active mx-2" aria-current="page" href="/daftar">Daftar</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn bg-button rounded-5 shadow-sm text-white mx-2" href="/masuk">Masuk</a>
                        </li>
                    </ul>
                </div>


            </div>
        </div>
    </nav>

    @yield('konten')

    <!-- <footer class="text-center shadow p-3 mt-2 bg-body">Laboratorium Bahasa Pemrograman</footer> -->
    <div class="w-100 bg-white shadow bottom-0">
        <h6 class="text-center p-3 my-auto">Made With <i class="text-danger fa-solid fa-heart"></i> <span class="text-primary">By Laboratorium Bahasa Pemrograman</span></h6>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



</body>

</html>