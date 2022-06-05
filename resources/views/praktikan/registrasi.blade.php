@extends('layouts.main5')

@section('konten')

<body style="background-color: rgba(199, 207, 219, 0.63);">
    <div class="container pt-5 d-flex justify-content-center">
        <div class="card card-style" style="height: 520px">
            <div class="card-body">
                <div class="text-center" style="width: 107%; margin: -10px 0px -10px -9px; height: 55%; background: rgba(214, 100, 248, 0.52); border-radius: 20px; transform: rotate(0); ">
                  <img src="{{ asset('assets/img/bg7.png') }}" alt="icon" class="mt-3" width="222.75px">
                </div>
                <h4 class="text-center fw-bold mt-4"> Discover Your Praktikum Here </h4>
                <p class="fs-12 mt-3 mx-2 text-center"> Lorem ipsum dolor sit amet consectr sed do eiusmod tempor incididunt trcs</p>
                <div class="d-flex justify-content-center mt-4">
                    <div class="btn-group d-flex" role="group">
                        <a href="/daftar" class="btn btn-white fs-12" style=" border-radius: 5px 0px 0xp 5px; box-shadow: none;">Register</a>
                        <a href="/masuk" class="btn btn-white fs-12 bg-transparent" style="backdrop-filter: blur(400px); -webkit-backdrop-filter: blur(2em); border: 2px solid #FFFFFF; border-radius: 0px 5px 5px 0px; box-shadow: none;">Sign In</a>
                    </div>
                </div>
            </div>
        </div>
  
    <div class="card card-reg">
        <div class="card-body">
          <h4 class="text-center fw-bold ">Create Account</h4>
          <div class="d-flex justify-content-center">
                  <img src="{{ asset('assets/img/bg4.png') }}" alt="bg-4" width="180px">
          </div>
          <form method="POST" action="/praktikan/register" class="px-4">
            @csrf
            <div class="mb-2 mt-3">
                <input id="npm" type="text" placeholder="Npm"
                    class="form-control @error('npm') is-invalid @enderror" name="npm"
                    value="{{ old('npm') }}">
                @error('npm')
                    <div class="text-danger fs-12">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <input id="nama_praktikan" type="text" placeholder="Nama"
                    class="form-control @error('nama_praktikan') is-invalid @enderror"
                    value="{{ old('nama_praktikan') }}" name="nama_praktikan">
                @error('nama_praktikan')

                    <div class="text-danger fs-12">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <input id="password" type="password" placeholder="password"
                    class="form-control @error('password') is-invalid @enderror"
                    value="{{ old('password') }}" name="password">
                @error('password')

                    <div class="text-danger fs-12">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <input id="notelp" type="number" placeholder="Notelp"
                    class="form-control @error('notelp') is-invalid @enderror"
                    value="{{ old('notelp') }}" name="notelp">
                @error('notelp')
                    <div class="text-danger fs-12">{{ $message }}</div>

                @enderror
            </div>

            <div class="mb-2">
                <input id="email" type="text" placeholder="Email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" name="email">
                @error('email')
                    <div class="text-danger fs-12">{{ $message }}</div>

                @enderror
            </div>

            <div class="">
                <button type="submit" class="btn w-100 fs-14 text-white fw-bold rounded-5" style="background: #FF7979 ;">Register</button>
            </div>
            </form>
                <div class="d-flex justify-content-center mt-2">
                    <p class="fs-12 me-2">have a Account ?</p>
                    <a href="/masuk" class="fs-12 text-decoration-none">Sign In Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection