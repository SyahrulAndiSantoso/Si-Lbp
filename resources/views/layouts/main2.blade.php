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
    
    {{-- chartjs --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     {{-- Notif Toast Css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}">
    <title>{{ $judul }}</title>
</head>

<body class="bg-black">
    <!-- Navbar -->
    <div class="card rounded-15" style="width: 93%; height: 919px; background-color: #fff; margin: 30px auto;">
        <div class="wrapper">
          <!-- Sidebar -->
          <nav id="sidebar">
              <div class="sidebar-header">
                  <div class="d-flex justify-content-center">
                    <img src="{{ asset('assets/img/lbp-blue.svg') }}" alt="logo-lbp" width="80px">
                  </div>
              </div>
      
              <ul class="list-unstyled components px-5">
                  <li>
                      <a href="/dashboard" class="text-decoration-none text-dark"><img src="{{ asset('assets/img/home.png') }}" alt="" width="15px" class="me-3">Home</a>
                  </li>
                  <li>
                      <a href="#" class="text-decoration-none text-dark"><img src="{{ asset('assets/img/profile.png') }}" alt="" width="15px" class="me-3">Profile</a>
                  </li>
                  <li>
                      <a href="/praktikum" class="text-decoration-none text-dark"><img src="{{ asset('assets/img/practice.png') }}" alt="" width="15px" class="me-3">Practices</a>
                  </li>
                  <li>
                      <a href="/panduan" class="text-decoration-none text-dark"><img src="{{ asset('assets/img/guide.png') }}" alt="" width="15px" class="me-3">Guides</a>
                  </li>
                  <div class="position-absolute rounded-5" style="width: 169.87px; height: 238px; margin-top: 370px; background-color: #E8EDF5;">
                    
                      <img src="{{ asset('assets/img/circle.png') }}" alt="" width="80px" class="position-absolute top-0 start-50 translate-middle">
                    <div class="text-black text-center mt-5">
                      <h6 class="fw-bold">Join With Us</h6>
                      <p class="text-black fs-12">
                      Lorem ipsum dolor sit <br />
                      amet consectetur <br />
                      adipisicing elit <br />
                      sed do eiusmod tempor
                    </p>
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLScI2n2Ildq94B73Fe5FZcyypqj-FZc-ypBJpzLpzgqEMwAh_A/viewform" class="btn btn-white mb-3 fw-bold">Let's Join</a>
                    </div>
                  </div>
          </nav>

          <div id="content" class="rounded-15" style="background-color: #E8EDF5; width: 100%; height: 916px; border: 10px solid #fff;">
            <nav class="navbar navbar-expand-lg navbar-light bg-tratransparent">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn2" style="background-color: transparent;">
                        <!-- <i class="fas fa-align-left"></i> -->
                        <div class="burger">
                          <span></span>
                          <span></span>
                          <span></span>
                        </div>
                    </button>
                    <div class="dropdown me-3">
                        <img src="{{ asset('assets/img/profile2.png') }}" alt="" width="45px" class="mb-3 me-3">
                        <a class="btn2 bg-transparent text-decoration-none text-dark fs-14" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::guard('praktikan')->user()->nama_praktikan }}
                          <p class="fs-12">{{ Auth::guard('praktikan')->user()->email }}</p>
                        </a>
                      
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
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
    <script src="{{ asset('assets/js/notif.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

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
