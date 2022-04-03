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
        <form action="/praktikan/store" method="POST">
          @csrf
          <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama_praktikan" name="nama_praktikan">
          </div>
          <div class="mb-3">
            <label class="form-label">Nomer Hp</label>
            <input type="text" class="form-control" id="notelp" name="notelp">
          </div>
          <div class="mb-3">
            <label class="form-label">Npm</label>
            <input type="text" class="form-control" id="npm" name="npm">
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
              <a data-toggle="modal" data-target="#modalTambah" style="cursor:pointer" class="btn btn-success text-white ml-auto">Tambah</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="display" width="100%" data-page-length="10" data-order="[[ 1, &quot;asc&quot; ]]">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Npm</th>
                    <th>Nama</th>
                    <th>Nomer Hp</th>
                    <th>Email</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                      $no=1;
                  @endphp
                  @foreach ($praktikan as $row)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row['npm'] }}</td>
                    <td>{{ $row['nama_praktikan'] }}</td>
                    <td>{{ $row['notelp'] }}</td>
                    <td>{{ $row['email'] }}</td>
                    <td>
                        <a href="/praktikan/delete/{{$row->id_praktikan}}" id="hapus" class="btn btn-danger">Hapus</a>
                        <a href="/praktikan/view-edit/{{$row->id_praktikan}}" style="cursor:pointer" class="btn btn-warning text-white">Edit</a>
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