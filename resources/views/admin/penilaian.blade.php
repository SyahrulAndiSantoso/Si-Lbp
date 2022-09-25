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
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama"
                                        value="{{$jawaban[0]->nama_praktikan}}" disabled>
                                </div>
                                <label class="form-label">Jawaban</label>
                                <div class="mb-3 d-flex">
                                    <textarea type="text" class="form-control" id="jawaban" style="height: 200px"
                                        value="" disabled>{{$jawaban[0]->jawaban}} </textarea>
                                </div>
                                <label class="form-label">Soal</label>
                                <div class="mb-3 d-flex">
                                    <textarea type="text" class="form-control" id="soal" style="height: 200px"
                                        disabled> {{$jawaban[0]->soal}} </textarea>
                                </div>
                                <label class="form-label">Hasil Running</label>
                                <div class="mb-3 d-flex">
                                    <textarea type="text" class="form-control" id="soal" style="height: 200px"
                                        disabled> {{$jawaban[0]->hasil}} </textarea>
                                </div>

                                <form action="/store-nilai" method="POST">
                                    @csrf
                                    <label class="form-label">Nilai</label>
                                    <input type="hidden" name="praktikan_id" value="{{$jawaban[0]->praktikan_id}}">
                                    <input type="hidden" name="latihan_id" value="{{$jawaban[0]->latihan_id}}">
                                    <input type="hidden" name="praktikum_id" value="{{$jawaban[0]->praktikum_id}}">
                                    <input type=" text" name="nilai" class="form-control mb-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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