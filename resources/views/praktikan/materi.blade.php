@extends('layouts.main4')

@section('konten')
<div class="container-fluid px-4">
    <div>
        {!!$materi->isi_materi!!}
    </div>
    
        <div class="row justify-content-end mt-5 mb-5">
            <div class="col-md-3">
                <a href="/dashboard" class="btn bg-button w-100 text-center text-white p-2 mb-2">Kembali</a>
            </div>
            <div class="col-md-3">
                <a href="/pengerjaan-soal/{{$latihan->id_latihan}}" class="btn bg-button w-100 text-center text-white p-2 mb-2">Mulai Sekarang</a>
            </div>
        </div>
</div>
@endsection