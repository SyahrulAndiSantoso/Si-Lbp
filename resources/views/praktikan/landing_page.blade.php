@extends('layouts.main3')

@section('konten')

<div class="container pt-md-5 pt-0">
    <div class="row justify-content-center g-0 mt-md-3 mt-0">
        <div class="col-lg-6 col-md-12 col-sm-12 col-12" style="margin-top: 80px;">
            <h1 class="mt-lg-2 mt-md-2 mt-sm-2 mt-5 fs-50 lh-70 fw-b my-auto text-yellow">The Next
                <span class="text-purple">Generation</span>
                <p class="mb-3">Praktikum Method <span class="text-purple">LBP</span></p>
            </h1>
            <p class="fs-14" style="color:#454444; font-weight:400"> Praktikum Pemrograman Terstruktur & Struktur Data Lab Bahasa Pemrograman Menggunakan Bahasa Pemrograman C++. Dilakukan secara Online melalui Website ini Tanpa perlu Melakukan instalasi IDE C++ di local Komputer karena disini sudah tersedia Compiler Online yang bisa digunakan tanpa instalasi terlebih dahulu.
            </p>

            <div class="row justify-content-lg-start justify-content-sm-center">
                <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                    <a href="/daftar" class="btn bg-yellow w-100 mt-3 py-2 rounded-15 text-white fw-bold">Daftar</a>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                    <a href="/masuk" class="btn bg-purple w-100 mt-3 py-2 rounded-15 fw-bold">Mulai Sekarang !</a>
                </div>
            </div>

            <div class="row justify-content-start mt-4 g-0">
                <div class="col-lg-1 col-md-1 col-2 mt-3">
                    <a href="#"><img src="{{ asset('assets/img/ig2.png') }}" alt="instagram" class="w-30"></a>
                </div>

                <div class="col-lg-1 col-md-1 col-sm-2 col-2 mt-3">
                    <a href="#"><img src="{{ asset('assets/img/yt.png') }}" alt="you tube" class="w-30"></a>
                </div>

                <div class="col-lg-1 col-md-1 col-sm-2 col-2 mt-3">
                    <a href="#"><img src="{{ asset('assets/img/github.svg') }}" alt="github" class="w-30"></a>
                </div>
            </div>

        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-12 mt-md-3 mt-5 d-none d-md-block">
            <div class="d-md-flex justify-content-end landing-page">
                <div class="text-white icon-landing-page">
                    <img src="{{ asset('assets/img/landing-page.png') }}" alt="landing-page" class="mt-4"
                        style="width: 100%;">
                </div>
            </div>
        </div>
    </div>
</div>

<img src="{{ asset('assets/img/ball-1.png') }}" alt="ball1" class="position-absolute top-0 start-0" width="82px"
    style="margin-top: 220px; margin-left: 65px; opacity: 0.2;">

<img src="{{ asset('assets/img/bg3.png') }}" alt="bg3" class="position-absolute top-0 end-0 d-none d-md-block"
    width="90px" style="margin-top: 80px; margin-right: 126px;">

<img src="{{ asset('assets/img/bg2.png') }}" alt="bg2" class="position-absolute top-0 end-0 d-none d-md-block"
    width="126px" style="margin-top: 80px;">

<div class="position-absolute bottom-0 end-0 h-25 d-none d-md-block"
    style="width: 101px; border-top-left-radius: 50px; background-color: #E5F0FC;"></div>

<img src="{{ asset('assets/img/ball-2.png') }}" alt="ball2"
    class="position-absolute bottom-0 start-50 translate-middle-x d-none d-md-block" width="119px">
</div>

@endsection