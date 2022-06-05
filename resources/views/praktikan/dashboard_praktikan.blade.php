@extends('layouts.main2')

@section('konten')
@if (session()->has('sukses'))
        <div class="flash-data" data-flashdata="{{ session('sukses') }}" data-halaman="praktikan">
        </div>
@endif
      <div class="row d-flex justify-content-center px-4">
        
          <div class="col-12">
              <div class="card rounded-15">
                <div class="">
                  <div class="row">
                    <div class="col-md-6 col-12 px-5 py-4">
                      <h5 class="card-title fw-bold">Hello, Welcome Back Revie Arsena</h5>
                      <p>Lets start your New Practice</p>
                      <a href="#" class="btn btn-dark px-4 mt-3">Start Now</a>
                    </div>
                    <div class="col-6 none">
                      <div class="d-flex justify-content-end">
                        <img src="{{ asset('assets/img/bg6.png') }}" alt="" width="280px">
                      </div>
                    </div>
                </div>
              </div>
          </div>
        
          <div class="row mt-3">
            <div class="col-lg-6 col-md-12 col-12 mb-3">
              <div class="card rounded-15">
                <div class="card-body">
                  <h5 class="card-title fw-bold fs-16">Pemrograman Terstruktur</h5>
                  <div class="row">
                    <div class="col-6 px-5">
                      <img src="{{ asset('assets/img/chart1.png') }}" alt="chart1" class="position-absolute top-50 start-0 translate-middle-y mx-3 mt-3" width="150px">
                    </div>
                    <div class="col-6 fs-16 px-3 mt-2" style="line-height: 10px;">
                        <p class="">In Progress</p>
                        <p class="fw-bold">12 Practice</p><br>
                        <p class="">Complete</p>
                        <p class="fw-bold">4 Practice</p>

                      <a href="#" class="btn fw-bold fs-14 mt-2" style="background-color: #77B5F2 ;">Continue ></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
              <div class="card rounded-15">
                <div class="card-body">
                  <h5 class="card-title fw-bold fs-16">Struktur Data</h5>
                  <div class="row">
                    <div class="col-6 px-5">
                      <img src="{{ asset('assets/img/chart2.png') }}" alt="chart1" class="position-absolute top-50 start-0 translate-middle-y mx-3 mt-3" width="150px">
                    </div>
                    <div class="col-6 fs-16 px-3 mt-2" style="line-height: 10px;">
                      <p class="">In Progress</p>
                      <p class="fw-bold">8 Practice</p><br>
                      <p class="">Complete</p>
                      <p class="fw-bold">8 Practice</p>

                      <a href="#" class="btn fw-bold fs-14 mt-2" style="background-color: #77B5F2 ;">Continue ></a>
                    </div>
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