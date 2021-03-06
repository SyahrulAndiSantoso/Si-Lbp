<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>{{ $judul }}</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="{{ asset('assets/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">

            <div class="card pt-2 card-primary">
              <div class="card-header justify-content-center"><h3 class="text-primary">Daftar Praktikan</h3></div>

              <div class="card-body">
                <form method="GET" action="/masuk">

                  <div class="form-group">
                    <label for="email">Npm</label>
                    <input id="npm" type="text" class="form-control" name="npm">
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email">Nama</label>
                    <input id="nama" type="text" class="form-control" name="nama">
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email">Kata Sandi</label>
                    <input id="kataSandi" type="password" class="form-control" name="kataSandi">
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email">No.Hp/Whatsapp</label>
                    <input id="nomer" type="number" class="form-control" name="nomer">
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Registrasi
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
                Made With <i class="text-danger fa-solid fa-heart"></i> <span class="text-primary">By Laboratorium Bahasa Pemrograman</span>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

 <!-- General JS Scripts -->
 <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
 <script src="{{ asset('assets/js/stisla.js') }}"></script>

  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('assets/js/page/auth-register.js') }}"></script>
</body>
</html>
