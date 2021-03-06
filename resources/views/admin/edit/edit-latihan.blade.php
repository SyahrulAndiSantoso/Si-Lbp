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
                                    <h4 class="text-dark">Edit Latihan</h4>
                                </div>
                                <div class="card-body">
                                    <form action="/latihan/update" method="POST">
                                        @csrf
                                        <input type="hidden" class="form-control" name="id_latihan"
                                            value="{{ $data->id_latihan }}">
                                        <div class="mb-3">
                                            <label class="form-label">Soal</label>
                                            <textarea class="form-control" name="soal" id="soal"
                                                style="height: 100px">{{ $data->soal }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Jawaban</label>
                                            <textarea class="form-control" name="jawaban" id="jawaban"
                                                style="height: 100px">{{ $data->jawaban }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Praktikum</label>
                                            <select class="form-control" id="praktikum_id" name="praktikum_id">
                                                @foreach ($data_praktikum as $row)
                                                    @if ($row->id_praktikum == $data->praktikum_id)
                                                        <option value="{{ $row->id_praktikum }}" selected>
                                                            {{ $row->nama_praktikum }}</option>
                                                    @else
                                                        <option value="{{ $row->id_praktikum }}">
                                                            {{ $row->nama_praktikum }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Materi</label>
                                            <select class="form-control" id="materi_id" name="materi_id">
                                                @foreach ($data_materi as $row)
                                                    @if ($row->id_materi == $data->materi_id)
                                                        <option value="{{ $row->id_materi }}" selected>
                                                            {{ $row->nama_materi }}</option>
                                                    @else
                                                        <option value="{{ $row->id_materi }}">{{ $row->nama_materi }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Kisi - kisi</label>
                                            <input type="text" class="form-control" id="kisi_kisi" name="kisi_kisi"
                                                value="{{ $data->kisi_kisi }}">
                                        </div>
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

@section('ckeditor2')
    @include('partials.ckeditorEdit')
@endsection
