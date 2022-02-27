@extends('layouts.main')
@section('konten')

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama1" name="nama1">
          </div>
          <div class="mb-3">
            <label class="form-label">Nomer Hp</label>
            <input type="text" class="form-control" id="nomerHp1" name="nomerHp1">
          </div>
          <div class="mb-3">
            <label class="form-label">Npm</label>
            <input type="text" class="form-control" id="npm1" name="npm1">
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" id="email1" name="email1">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama2" name="nama2">
          </div>
          <div class="mb-3">
            <label class="form-label">Nomer Hp</label>
            <input type="text" class="form-control" id="nomerHp" name="nomerHp">
          </div>
          <div class="mb-3">
            <label class="form-label">Npm</label>
            <input type="text" class="form-control" id="npm2" name="npm2">
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email">
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
              <h4 class="text-dark">Praktikan</h4>
              <a data-toggle="modal" data-target="#modalTambah" class="btn btn-success text-white ml-auto">Tambah</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="display" width="100%" data-page-length="10" data-order="[[ 1, &quot;asc&quot; ]]">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nomer Hp</th>
                    <th>Npm</th>
                    <th>Email</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Rudy Salim</td>
                    <td>08188736647</td>
                    <td>06.2020.1.07727</td>
                    <td>rudisalim@gmail.com</td>
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