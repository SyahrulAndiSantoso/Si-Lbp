@extends('layouts.main5')

@section('konten')

@if (session()->has('login gagal'))
<div class="flash-data" data-flashdata="{{ session('login gagal') }}" data-halaman="praktikan">
</div>
@elseif (session()->has('registrasi berhasil'))
<div class="flash-data" data-flashdata="{{ session('registrasi berhasil') }}" data-halaman="praktikan">
</div>
@elseif (session()->has('logout'))
<div class="flash-data" data-flashdata="{{ session('logout') }}" data-halaman="praktikan">
</div>
@endif

<div class="container pt-5 d-flex justify-content-center">
<div class="card card-style">
    <div class="card-body">
        <div class="text-center" style="width: 107%; margin: -10px 0px -10px -9px; height: 55%; background: rgba(214, 100, 248, 0.52); border-radius: 20px; transform: rotate(0); ">
            <img src="{{ asset('assets/img/bg7.png') }}" alt="icon" class="mt-3" width="222.75px">
        </div>
        <h4 class="text-center fw-bold mt-3"> Discover Your Praktikum Here </h4>
        <p class="fs-12 mt-3 mx-2 text-center"> Lorem ipsum dolor sit amet consectr sed do eiusmod tempor incididunt trcs</p>
        <div class="d-flex justify-content-center mt-4">
            <div class="btn-group d-flex" role="group">
                <a href="/daftar" class="btn btn-white fs-12" style=" border-radius: 5px 0px 0xp 5px; box-shadow: none;">Register</a>
                <a href="/masuk" class="btn btn-white fs-12 bg-transparent" style="backdrop-filter: blur(400px); -webkit-backdrop-filter: blur(2em); border: 2px solid #FFFFFF; border-radius: 0px 5px 5px 0px; box-shadow: none;">Sign In</a>
            </div>
        </div>
    </div>
</div>

<div class="card" style="width: 300px; height: 500px; background: #E5EAEC; border: 2px solid #FFFFFF; backdrop-filter: blur(20px); border-radius: 30px;">
<div class="card-body">
    <h4 class="fw-bold text-center mt-3">Hello Again !</h4>
    <p class="text-center fs-20">welcome back you’ve been missed !</p>
    
        <div class="d-flex justify-content-center">
            <img src="{{ asset('assets/img/bg4.png') }}" alt="bg-4" width="180px">
        </div>
        <form method="POST" action="/praktikan/login" class="needs-validation px-4" novalidate="">
            @csrf
            <div class="form-group">
                <input id="npm" type="text" placeholder="Enter Npm"
                    class="mb-3 mt-4 form-control @error('npm') is-invalid @enderror" name="npm"
                    value="{{ old('npm') }}" tabindex="1" required autofocus>
            </div>
            @error('npm')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <input id="password" type="password" placeholder="Enter Password"
                    class="form-control @error('password') is-invalid @enderror" name="password"
                    value="{{ old('password') }}" tabindex="2" required>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        <div class="text-end my-2">
            {{-- <a href="/forgot-password" class="fs-12 text-body" style="text-decoration: none;">Forgot Password ?</a> --}}
        </div>
        <div class="">
            <button type="submit" class="btn w-100 fs-14 fw-bold text-white rounded-5" style="background: #FF7979 ;">Sign</button>
        </div>
        <div class="">
            <button type="submit" class="btn btn-reg mt-2 w-100 fs-14 text-white fw-bold rounded-5" style="background: #FF7979 ;">Register</button>
        </div>
      </form>
</div>
</div>
</div>
</div>
@endsection

