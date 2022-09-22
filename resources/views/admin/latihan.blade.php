@extends('layouts.main')

@section('konten')
{{-- Notif Berhasil --}}
@if (session()->has('sukses tambah'))
<div class="flash-data" data-flashdata="{{ session('sukses tambah') }}" data-halaman="Latihan">
</div>
@elseif(session()->has('sukses update'))
<div class="flash-data" data-flashdata="{{ session('sukses update') }}" data-halaman="Latihan">
</div>
@elseif(session()->has('sukses hapus'))
<div class="flash-data" data-flashdata="{{ session('sukses hapus') }}" data-halaman="Latihan">
</div>
@endif
{{-- Notif Gagal --}}
@error('soal')
<div class="flash-data" data-flashdata="Gagal" data-halaman="Latihan">
</div>
@enderror

@error('jawaban')
<div class="flash-data" data-flashdata="Gagal" data-halaman="Latihan">
</div>
@enderror

@error('kisi_kisi')
<div class="flash-data" data-flashdata="Gagal" data-halaman="Latihan">
</div>
@enderror
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
                        <label class="form-label">nama Latihan</label>
                        <input class="form-control" name="nama_latihan" id="nama_latihan" required />
                        @error('nama_latihan')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Soal</label>
                        <textarea class="form-control" name="soal" id="soal" style="height: 100px" required></textarea>
                        @error('soal')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
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
                        <label class="form-label">Waktu Praktikum</label>
                        <input type="datetime-local" class="form-control @error('time') is-invalid @enderror" id="time"
                            name="time" value="{{ old('time') }}" style="width: 10%" required>
                        @error('time')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
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
                                                <th>Nama Latihan</th>
                                                <th>Soal</th>
                                                <th>Praktikum</th>
                                                <th>Waktu praktikum Dimulai</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{!! $row->nama_latihan !!}</td>
                                                <td>{!! $row->soal !!}</td>
                                                <td>{{ $row->nama_praktikum }}</td>
                                                <td>{{ $row-> time}}</td>
                                                <td>
                                                    <a href="/latihan/delete/{{ $row->id_latihan }}"
                                                        class="btn btn-danger tombol-hapus">Hapus</a>
                                                    <a href="/latihan/view-edit/{{ $row->id_latihan }}"
                                                        class="btn btn-warning text-white">Edit</a>
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