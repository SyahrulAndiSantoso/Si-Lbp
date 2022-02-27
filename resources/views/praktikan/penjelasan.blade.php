@extends('layouts.main2')

@section('konten')

<div class="container pt-5">
    <div class="row pt-5 justify-content-center">
        <div class="col-lg-8 col-sm-12">
            <p class="text-center fs-2 fw-bold">SELAMAT DATANG DI PELAJARAN PEMROGRAMAN TERSTRUKTUR</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6">
            <P class="text-center mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, architecto est alias libero illo facere aut laboriosam odit porro nobis voluptate soluta</P>
        </div>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-md-6">
            <img class="w-100 mt-3" src="{{ asset('assets/img/img-4.png') }}" alt="">
        </div>
    </div>
    
    <div class="row justify-content-between">
        <div class="col-md-6 my-auto">
            <p class="text-center fs-4 fw-bold mt-5 mb-3">Apa Yang Akan Dipelajari ?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, architecto est alias libero illo facere aut laboriosam odit porro nobis voluptate soluta</p>
        </div>
        <div class="col-md-6">
            <img class="w-100 mt-5" src="{{ asset('assets/img/img-5.png') }}" alt="">
        </div>
    </div>
    
    <div class="row justify-content-between">
        <div class="col-lg-6 order-lg-first col-md-6 order-md-first col-sm-12 order-sm-last">
            <img class="w-100 mt-5" src="{{ asset('assets/img/logo2.png') }}" alt="">
        </div>
        <div class="col-lg-6 my-auto order-lg-last col-md-6 order-md-last col-sm-12 order-sm-first">
            <p class="text-center fs-4 fw-bold mt-5 mb-3">Pengertian Tipe Data ?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, architecto est alias libero illo facere aut laboriosam odit porro nobis voluptate soluta</p>
        </div>
    </div>

    <div class="row justify-content-end mt-5 mb-5">
        <div class="col-md-3">
            <a href="/dashboard" class="btn bg-button w-100 text-center text-white p-2 mb-2">Kembali</a>
        </div>
        <div class="col-md-3">
            <a href="/pengerjaan-soal" class="btn bg-button w-100 text-center text-white p-2 mb-2">Mulai Sekarang</a>
        </div>
    </div>
</div>
@endsection