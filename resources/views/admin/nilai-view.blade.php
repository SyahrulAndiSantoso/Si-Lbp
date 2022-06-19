@extends('layouts.main')
@section('konten')

<section class="section">
    <div class="card" style="background-color: #FCFCFE;">
        <div class="card-body">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-dark">Penilaian</h4>
                                {{-- <a data-toggle="modal" data-target="#modalTambah" style="cursor:pointer"
                                    class="btn btn-success text-white ml-auto">Tambah</a> --}}
                            </div>
                            <div class="card-body">
                                <form action="/edit-nilai" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_nilai" value="{{$nilai[0]->id_nilai}}">
                                    <input type="hidden" name="praktikan_id" value="{{$nilai[0]->praktikan_id}}">
                                    <input type="hidden" name="praktikum_id" value="{{$nilai[0]->praktikum_id}}">
                                    <input type="hidden" name="latihan_id" value="{{$nilai[0]->latihan_id}}">

                                    <div class="mb-3">
                                        <label class="form-label">Npm</label>
                                        <input type="text" class="form-control" id="npm" value="{{$nilai[0]->npm}}"
                                            disabled>
                                    </div>
                                    <label class="form-label">Nama</label>
                                    <div class="mb-3 d-flex">
                                        <input type="text" class="form-control" id="nama"
                                            value="{{$nilai[0]->nama_praktikan}}" disabled>
                                    </div>
                                    <label class="form-label">Nilai</label>
                                    <div class="mb-3 d-flex">
                                        <input type="text" class="form-control" id="soal" name="nilai"
                                            value="{{$nilai[0]->nilai}}">
                                    </div>
                                    <button type="submit" class="btn btn-primary">submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection