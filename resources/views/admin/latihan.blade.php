@extends('layouts.main')

@section('konten')

    <!-- Modal Tambah -->
    <div class="modal fade modal-fullscreen" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/latihan/store" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Soal</label>
                            <textarea class="form-control" name="soal" id="soal" style="height: 100px"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jawaban</label>
                            <textarea class="form-control" name="jawaban" id="jawaban" style="height: 100px"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Praktikum</label>
                            <select class="form-control" id="praktikum_id" name="praktikum_id">
                                @foreach ($data_praktikum as $row)
                                    <option value="{{ $row->id_praktikum }}">{{ $row->nama_praktikum }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Materi</label>
                            <select class="form-control" id="materi_id" name="materi_id">
                                @foreach ($data_materi as $row)
                                    <option value="{{ $row->id_materi }}">{{ $row->nama_praktikum }} || {{ $row->nama_materi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kisi - kisi</label>
                            <input type="text" class="form-control" id="kisi_kisi" name="kisi_kisi">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <section class="section">
        <div class="card" style="background-color: #FCFCFE;">
            <div class="card-body">
                <div class="section-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="text-dark">Latihan</h4>
                                    <a data-toggle="modal" data-target="#modalTambah"
                                        class="btn btn-success text-white ml-auto">Tambah</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="display" width="100%" data-page-length="10"
                                            data-order="[[ 1, &quot;asc&quot; ]]">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Soal</th>
                                                    <th>Jawaban</th>
                                                    <th>Praktikum</th>
                                                    <th>Materi</th>
                                                    <th>Kisi - Kisi</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $row)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{!! $row->soal !!}</td>
                                                        <td>{!! $row->jawaban !!}</td>
                                                        <td>{{ $row->nama_praktikum }}</td>
                                                        <td>{{ $row->materi->nama_materi }}</td>
                                                        <td>{{ $row->kisi_kisi }}</td>
                                                        <td>
                                                            <a href="/latihan/delete/{{ $row->id_latihan }}"
                                                                class="btn btn-danger">Hapus</a>
                                                            <a href="/latihan/view-edit/{{ $row->id_latihan }}" class="btn btn-warning text-white">Edit</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>



                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('ckeditor1')
    @include('partials.ckeditorTambah')
@endsection
