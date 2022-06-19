<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- shortcut icon --}}
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
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
  <link rel="stylesheet" href="{{ asset('assets/css/daftar-materi.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/panduan.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/praktikum.css') }}" />

  <link type="text/css" href="{{ asset('assets/css/jquery.countdown.css') }}" rel="stylesheet" />
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
  <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
    <div class="container-fluid mx-3">
      <a class="navbar-brand" href="#"><img src="{{ asset('assets/img/logo-lbp.svg') }}" alt="Logo-lbp"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav d-flex container-fluid" style="margin-left: 100px">
          <li class="nav-item my-auto ">
            <a class="nav-link fw-bold" aria-current="page" href="/dashboard">Home</a>
          </li>
          <li class="nav-item my-auto">
            <a class="nav-link active fw-bold" href="/praktikum">Practice</a>
          </li>
          <li class="nav-item my-auto">
            <a class="nav-link fw-bold" href="/panduan">Guide</a>
          </li>
          <div class="col-9 container-fluid justify-content-lg-end">
            <div class="container-fluid col d-flex justify-content-lg-end" style="margin-left: 70px">
              <li class="nav-item dropdown d-flex">
                <img src="{{ asset('assets/img/profile.svg') }}" width="40px">
                <a class="nav-link text-reset fs-12 fw-bold text-center" href="#" id="navbarDropdownMenuLink"
                  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ Auth::guard('praktikan')->user()->nama_praktikan }} <br>
                  <div class="fw-normal">{{ Auth::guard('praktikan')->user()->email }}</div>
                </a>
                <a href="#" class="nav-link text-reset my-auto" id="navbarDropdownMenuLink" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false"><img src="{{ asset('assets/img/down-arrow.svg') }}"
                    id="navbarDropdownMenuLink" alt="arrow" width="20px"></a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="/pengaturan">
                      <img class="w-15 me-2" src="{{ asset('assets/img/icon-pengaturan.png') }}">
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
      </ul>
    </div>
    </div>
  </nav>


  @yield('konten')

  <!-- <footer class="text-center shadow p-3 mt-2 bg-body">Laboratorium Bahasa Pemrograman</footer> -->
  {{-- <div class="w-100 bg-white shadow bottom-0">
    <h6 class="text-center p-3 my-auto">Made With <i class="text-danger fa-solid fa-heart"></i> <span
        class="text-primary">By Laboratorium Bahasa Pemrograman</span></h6>
  </div> --}}

  {{-- Notif --}}
  {{-- <script src="{{ asset('assets/js/notif.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script> --}}

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>


  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

  {{-- Notif --}}
  <script src="{{ asset('assets/js/notif.js') }}"></script>
  <script>
    $(document).ready(function() {
            $('#example').DataTable();
        });
  </script>

  <script>
    $(document).ready(function () {
    
    $('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
    });
    
    });
  </script>


</body>

</html>