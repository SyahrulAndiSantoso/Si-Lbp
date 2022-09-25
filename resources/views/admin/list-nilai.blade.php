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
                                <h4 class="text-dark">Hasil Jawaban Praktikum</h4>
                                {{-- <a data-toggle="modal" data-target="#modalTambah" style="cursor:pointer"
                                    class="btn btn-success text-white ml-auto">Tambah</a> --}}
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" width="100%" data-page-length="10"
                                        data-order="[[ 1, &quot;asc&quot; ]]">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Npm</th>
                                                <th>Nama</th>
                                                <th>praktikum</th>
                                                <th>Modul</th>
                                                <th>Nilai</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($nilai as $row)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$row->npm}}</td>
                                                <td>{{$row->nama_praktikan}}</td>
                                                <td>{{$row->nama_praktikum}}</td>
                                                <td>{{$row->nama_latihan}}</td>
                                                <td>{{$row->nilai}}</td>

                                                <td>
                                                    <a href="/hapus-nilai/{{$row->id_nilai}}"
                                                        class="btn btn-danger tombol-hapus">Hapus</a>
                                                    <a href="/edit-nilai-view/{{$row->id_nilai}}"
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