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
        <form action="" method="POST">
          <div class="mb-3">
            <label class="form-label">Nama Materi</label>
            <input type="text" class="form-control" id="namaMateri1" name="namaMateri1">
          </div>
          <div class="mb-3">
            <label class="form-label">Isi Materi</label>
            <textarea class="form-control" name="isiMateri1" id="editor" style="height: 100px"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Pelajaran</label>
            <input type="text" class="form-control" id="pelajaran1" name="pelajaran1">
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
        <form>
          <div class="mb-3">
            <label class="form-label">Nama Materi</label>
            <input type="text" class="form-control" id="namaMateri" name="namaMateri">
          </div>
          <div class="mb-3">
            <label class="form-label">Isi Materi</label>
            <textarea class="form-control" name="isiMateri" id="editor1" style="height: 100px"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Pelajaran</label>
            <input type="text" class="form-control" id="pelajaran" name="pelajaran">
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
              <a data-toggle="modal" data-target="#modalTambah" class="btn btn-success text-white ml-auto">Tambah</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="display" width="100%" data-page-length="10" data-order="[[ 1, &quot;asc&quot; ]]">
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
                  <tr>
                    <td>1</td>
                    <td>variable</td>
                    <td>Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit, sed do eiusmod
                       tempor 
                       incididunt ut labore et dolore magna 
                       aliqua. Ut enim ad minim veniam,
                       quis 
                       nostrud exercitation </td>
                    <td>Pemrograman Terstruktur</td>
                    <td>
                        <a href="#" id="hapus" class="btn btn-danger">Hapus</a>
                        <a data-toggle="modal" data-target="#modalEdit" class="btn btn-warning text-white">Edit</a>
                  </td>
                  </tr>
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
@section('ckeditor2')
    @include('partials.ckeditorEdit')
@endsection