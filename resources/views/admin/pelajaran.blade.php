@extends('layouts.main')

@section('konten')

<!-- Modal Tambah -->
<div class="modal fade modal-fullscreen" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/admin/pelajaran/create" method="POST">
          @csrf
          <div class="mb-3">
            <label class="form-label">Nama Pelajaran</label>
            <input type="text" class="form-control" id="pelajaran1" name="pelajaran1">
          </div>
          <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi1" id="editor"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Gambar</label>
            <input class="form-control" type="file" id="gambar1" name="gambar1">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade modal-fullscreen" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="mb-3">
            <label class="form-label">Nama Pelajaran</label>
            <input type="text" class="form-control" id="pelajaran" name="pelajaran">
          </div>
          <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" id="editor1"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Gambar</label>
            <input class="form-control" type="file" id="gambar" name="gambar">
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
            <h4 class="text-dark">Pelajaran</h4>
            <a data-toggle="modal" data-target="#modalTambah" class="btn btn-success text-white ml-auto">Tambah</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="example" class="display" width="100%" data-page-length="10" data-order="[[ 1, &quot;asc&quot; ]]">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pelajaran</th>
                  <th>Deskripsi</th>
                  <th>Gambar</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $no=1;
                @endphp
                @foreach ($praktikum as $p)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $p['nama_praktikum'] }}</td>
                  <td>{{ $p['deskripsi']}}</td>
                  <td><img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" width="90"></td>
                  <td>
                    <form action="/admin/pelajaran/delete/{{ $p['id_praktikum'] }}" method="POST" class="d-inline">
                      @csrf
                      @method('delete')
                      <button id="hapus" class="btn btn-danger mb-1">Hapus</button>
                    </form>
                      {{-- <a href="" id="hapus" class="btn btn-danger">Hapus</a> --}}
                      <a data-toggle="modal" data-target="#modalEdit" class="btn btn-warning text-white">Edit</a>
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
  <!-- Modal -->
 
@endsection

@section('ckeditor1')
    @include('partials.ckeditorTambah')
@endsection
@section('ckeditor2')
    @include('partials.ckeditorEdit')
@endsection

