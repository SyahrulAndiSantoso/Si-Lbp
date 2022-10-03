@extends('layouts.main2')

@section('konten')
@if (session()->has('sukses update'))
<div class="flash-data" data-flashdata="{{ session('sukses update') }}" data-halaman="praktikan">
</div>
@endif
<div class="row d-flex justify-content-center px-4">

  <div class="col-12">
    <div class="card rounded-15">
      <div class="">
        <div class="row">
          <div class="col-md-6 col-12 px-5 py-4">
            <h5 class="card-title fw-bold ">Hello, Welcome Back {{ Auth::guard('praktikan')->user()->nama_praktikan }}</h5>
            <div class="mt-3" style="line-height: 15px">
              <p>Lets start your New Practice</p>
              <p>Please read the <a href="/panduan" class="text-decoration-none">guide</a> first</p>
            </div>
            <a href="/praktikum" class="btn btn-dark px-4 mt-3">Start Now</a>
          </div>
          <div class="col-6 none">
            <div class="d-flex justify-content-end">
              <img src="{{ asset('assets/img/bg6.png') }}" alt="" width="280px">
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
</div>

@endsection