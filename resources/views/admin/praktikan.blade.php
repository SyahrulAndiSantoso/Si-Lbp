@extends('layouts.main')
@section('konten')
    {{-- Notif Berhasil --}}
    @if (session()->has('sukses tambah'))
        <div class="flash-data" data-flashdata="{{ session('sukses tambah') }}" data-halaman="Praktikan">
        </div>
    @elseif(session()->has('sukses update'))
        <div class="flash-data" data-flashdata="{{ session('sukses update') }}" data-halaman="Praktikan">
        </div>
    @elseif(session()->has('sukses hapus'))
        <div class="flash-data" data-flashdata="{{ session('sukses hapus') }}" data-halaman="Praktikan">
        </div>
    @endif

    {{-- Notif Gagal --}}
    @error('nama_praktikan')
        <div class="flash-data" data-flashdata="Gagal" data-halaman="Praktikan">
        </div>
    @enderror

    @error('notelp')
        <div class="flash-data" data-flashdata="Gagal" data-halaman="Praktikan">
        </div>
    @enderror

    @error('npm')
        <div class="flash-data" data-flashdata="Gagal" data-halaman="Praktikan">
        </div>
    @enderror

    @error('email')
        <div class="flash-data" data-flashdata="Gagal" data-halaman="Praktikan">
        </div>
    @enderror
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
                            <input type="text" class="form-control @error('nama_praktikan') is-invalid @enderror"
                                id="nama_praktikan" name="nama_praktikan" value="{{ old('nama_praktikan') }}" required>
                            @error('nama_praktikan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nomer Hp</label>
                            <input type="number" class="form-control @error('notelp') is-invalid @enderror" id="notelp"
                                name="notelp" value="{{ old('notelp') }}" required>
                            @error('notelp')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Npm</label>
                            <input type="text" class="form-control @error('npm') is-invalid @enderror" id="npm" name="npm"
                                value="{{ old('npm') }}" required>
                            @error('npm')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Password</label>
                          <input type="password" class="form-control @error('password') is-invalid @enderror"
                              id="password" name="password" value="{{ old('password') }}" required>
                          @error('password')
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
                                    <h4 class="text-dark">Praktikan</h4>
                                    <a data-toggle="modal" data-target="#modalTambah" style="cursor:pointer"
                                        class="btn btn-success text-white ml-auto">Tambah</a>
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
                                                    <th>Nomer Hp</th>
                                                    <th>Email</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($praktikan as $row)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $row->npm }}</td>
                                                        <td>{{ $row->nama_praktikan }}</td>
                                                        <td>{{ $row->notelp }}</td>
                                                        <td>{{ $row->email }}</td>
                                                        <td>
                                                            <a href="/praktikan/delete/{{ $row->id_praktikan }}"
                                                                id="hapus" class="btn btn-danger tombol-hapus">Hapus</a>
                                                            <a href="/praktikan/view-edit/{{ $row->id_praktikan }}"
                                                                style="cursor:pointer"
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
