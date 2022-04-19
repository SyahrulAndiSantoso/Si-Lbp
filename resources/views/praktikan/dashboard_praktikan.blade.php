@extends('layouts.main2')

@section('konten')
@if (session()->has('sukses'))
        <div class="flash-data" data-flashdata="{{ session('sukses') }}" data-halaman="praktikan">
        </div>
@endif

<div class="container-fluid">
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-10 col-sm-12 col-12">
                <div class="d-flex mt-5 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-graph-up-arrow w-20" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
                    </svg>
                    <p class="my-auto ms-3">Pencapaian</p>
                </div>


                <div class="card w-100 rounded-10 shadow-sm">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-4 border-end border-3 border-dark">
                                <div class="row">
                                    <div class="col col-sm-12 d-lg-flex d-md-flex d-sm-flex d-block justify-content-center">
                                        <img class="my-lg-4 my-md-4 my-sm-4 my-2 mx-auto mx-lg-2 mx-md-1 d-block d-lg-block d-md-block w-70 h-70" src="{{ asset('assets/img/user-akun.png') }}">
                                        <p class="my-auto mx-lg-2 mx-md-2 mx-sm-2 mx-auto d-block text-center fs-20 ">Revie Nur A</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4 border-end border-3 border-dark">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center mb-1 mt-2">
                                        <img class="my-2 me-lg-2 me-md-2 me-sm-2 me-2 w-40" src="{{ asset('assets/img/icon-buku.png') }}">
                                        <p class="my-auto fs-3">4</p>
                                    </div>
                                    <div class="col-12">
                                        <p class="text-center my-auto mt-2 fs-18">Latihan Yang Diselesaikan</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="row">
                                    <div class="col col-sm-12 d-lg-flex d-md-flex d-sm-flex d-block justify-content-center">
                                        <!-- <img class="my-lg-4 my-md-4 my-sm-4 my-2 mx-auto mx-lg-1 mx-md-1 d-block d-lg-block d-md-block text-center w-70" src="img/icon-bintang.png"> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-award-fill my-lg-4 my-md-4 my-sm-4 my-2 mx-auto mx-lg-1 mx-md-1 d-block d-lg-block d-md-block text-center w-70 text-blue" viewBox="0 0 16 16">
                                            <path d="m8 0 1.669.864 1.858.282.842 1.68 1.337 1.32L13.4 6l.306 1.854-1.337 1.32-.842 1.68-1.858.282L8 12l-1.669-.864-1.858-.282-.842-1.68-1.337-1.32L2.6 6l-.306-1.854 1.337-1.32.842-1.68L6.331.864 8 0z" />
                                            <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z" />
                                        </svg>
                                        <p class="my-auto mx-lg-2 mx-md-2 mx-sm-2 mx-auto text-center fs-20">Lv. 10</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Latihan Yang Berlangsung -->
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-10 col-sm-12 col-12">
                <div class="d-flex mt-5 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-journal-bookmark-fill w-20" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z" />
                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                    </svg>
                    <p class="my-auto ms-3">Latihan Yang Sedang Berlangsung</p>
                </div>

                <div class="row">
                    <div class="col-lg-7 col-md-10 col-sm-12 col-12">
                        <div class="card bg-dark text-white shadow-sm mb-5 bg-body h-75 bg-danger rounded-10">
                            <img src="{{ asset('assets/img/card.png') }}" class="card-img h-100">
                            <div class="card-img-overlay">
                                <h5 class="card-title text-center text-black fw-bold fs-2">Struktur Data</h5>
                                <a href="/pengerjaan-soal" class="btn bg-button text-white rounded-5 shadow-sm m-3 position-absolute bottom-0 end-0">Lanjutkan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Latihan yang sudah selesai -->

        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-10 col-sm-12 col-12">
                <div class="d-flex mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-journals w-20" viewBox="0 0 16 16">
                        <path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z" />
                        <path d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0z" />
                    </svg>
                    <p class="my-auto ms-3">Latihan Yang Sudah Selesai</p>
                </div>


                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <a href="/panduan-pelajaran">
                        <div class="card shadow mb-5 bg-body h-75 rounded-10">
                            <img src="{{ asset('assets/img/card2.png') }}" class="card-img h-100">
                            <div class="card-img-overlay">
                                <h5 class="card-title text-center text-black fw-bold fs-6 m-3 py-5">Pemrograman Terstruktur</h5>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection