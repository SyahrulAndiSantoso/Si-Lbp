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
                    <form action="/materi/store" method="POST">
                        <input type="hidden" class="form-control" value="1" id="kode_praktikum" name="praktikum_id">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Materi</label>
                            <input type="text" class="form-control" id="namaMateri1" name="nama_materi">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Praktikum</label>
                            <select class="form-control" id="praktikum" name="praktikum_id">
                                <optgroup label="PRAKTIKUM">
                                    @foreach ($data_praktikum as $row)
                                        <option value="{{ $row->id_praktikum }}">{{ $row->nama_praktikum }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Isi Materi</label>
                            <textarea class="form-control" name="isi_materi" id="isi_materi"
                                style="height: 100px"> </textarea>
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
                                    <h4 class="text-dark">Materi</h4>
                                    <a data-toggle="modal" data-target="#modalTambah"
                                        class="btn btn-success text-white ml-auto" style="cursor:pointer">Tambah</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="display" width="100%" data-page-length="10"
                                            data-order="[[ 1, &quot;asc&quot; ]]">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Materi</th>
                                                    <th>Isi Materi</th>
                                                    <th>Pelajaran</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $row)
                                                    <tr>
                                                        <td>1</td>
                                                        <td>{{ $row->nama_materi }}</td>
                                                        <td>{!! $row->isi_materi !!}</td>
                                                        <td>{{ $row->praktikum->nama_praktikum }}</td>
                                                        <td>
                                                            <a href="/materi/delete/{{ $row->id_materi }}" id="hapus"
                                                                class="btn btn-danger">Hapus</a>
                                                            <a href="/materi/view-edit/{{ $row->id_materi }}"
                                                                style="cursor:pointer"
                                                                class="btn btn-warning text-white tombol-edit-materi">Edit</a>
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


    <script>
        $('.tombol-edit-materi').on('click', function() {
            let id_materi = $(this).data('id');
            let materi = $(this).data('materi');
            let isi = $(this).data('isi_materi');

            $('#edit-id').val(id_materi);
            $('#edit-namaMateri').val(materi);
            $('#editor1').val(isi);

        });

    </script>

@endsection

@section('ckeditor1')
    @include('partials.ckeditorTambah')
@endsection
@section('ckeditor2')
    @include('partials.ckeditorEdit')
@endsection
