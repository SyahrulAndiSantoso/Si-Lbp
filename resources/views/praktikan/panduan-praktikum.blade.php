@extends('layouts.main2')

@section('konten')
    
    
<div class="container-fluid">
    <div class="container pt-5 mb-2">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-12">
                <div class="mt-5 d-flex mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-folder w-20" viewBox="0 0 16 16">
                        <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z" />
                    </svg>
                    <p class="fs-5 ms-2 my-auto">Panduan</p>
                </div>
            </div>
            <div class="col-lg-9 col-12">
                <div class="w-100 h-100 bg-white rounded-10 shadow-sm">
                    <div class="container d-flex justify-content-center">
                        <img class="w-51 m-3" src="{{ asset('assets/img/logo1.png') }}">
                    </div>

                    <h4 class="text-center fw-bold mb-4">{{$JudulPanduan}}</h4>
                    <p class="px-5">Pada Pelajaran Struktur Data, membahas tentang struct, stack, queue, search, sorting, pointer, dan linked list </p>
                    <div class="container px-5">
                        <p class="fw-bold ps-5 pt-2">Panduan Mengerjakan :</p>
                        <p class="ps-5">1. Kerjakan Sesuai Soal Yang Sudah Tertera</p>
                        <p class="ps-5">2. Jika Soal Sudah Dijawab, Klik Tombol Jawab Untuk Mengetahui Jawaban Benar Atau Salah</p>
                        <p class="ps-5">3. JIka Soal Berhasil Dijawab Maka Akan Mendapatkan EXP</p>
                        <p class="ps-5">4. EXP Yang Diperoleh Berfungsi Untuk Meningkatkan Level</p>
                    </div>

                    <div class="d-flex justify-content-end m-3">
                        <a class="btn bg-button text-white rounded" href="/penjelasan-praktikum/{{$AQ->id_materi}}">Mulai Sekarang</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection