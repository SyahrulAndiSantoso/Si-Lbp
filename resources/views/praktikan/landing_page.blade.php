@extends('layouts.main3')

@section('konten')
    
<div class="container-fluid mb-12">
    <div class="container pt-5 mb-5">
        <div class="row justify-content-center mt-5 g-0">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                <h1 class="mt-5 fs-50 lh-70 fw-b my-auto">The Next
                    <span class="text-purple">Generation</span>
                    <p class="mb-3">Praktikum Method</p>
                </h1>
                <p class="fs-14">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit sint accusamus similique expedita laborum voluptas numquam maxime saepe aperiam totam!
                </p>

                <div class="row justify-content-lg-start justify-content-sm-center">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                        <a class="btn bg-button text-white rounded-5 mt-3 w-100 fs-16" href="/masuk">Mulai Sekarang</a>
                    </div>
                </div>
                
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                <img src="{{ asset('assets/img/landing-page.png') }}" class="mt-5 w-100">
            </div>
        </div>
    </div>
</div>

@endsection