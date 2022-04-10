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
                                    <h4 class="text-dark">Edit Praktikan</h4>
                                </div>
                                <div class="card-body">
                                    <form action="/praktikan/update" method="POST">
                                        <input type="hidden" id="id_praktikan" name="id_praktikan"
                                            value="{{ $data->id_praktikan }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Npm</label>
                                            <input type="text" class="form-control @error('npm') is-invalid @enderror"
                                                id="npm" name="npm" value="{{ old('npm', $data->npm) }}" required>
                                            @error('npm')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nama</label>
                                            <input type="text"
                                                class="form-control @error('nama_praktikan') is-invalid @enderror"
                                                id="nama_praktikan" name="nama_praktikan"
                                                value="{{ old('nama_praktikan', $data->nama_praktikan) }}" required>
                                            @error('nama_praktikan')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nomer Hp</label>
                                            <input type="number" class="form-control @error('notelp') is-invalid @enderror"
                                                id="notelp" name="notelp" value="{{ old('notelp', $data->notelp) }}"
                                                required>
                                            @error('notelp')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email" value="{{ old('email', $data->email) }}" required>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                                id="password" name="password" value="{{ old('password', $data->password) }}" required>
                                            @error('npm')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
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
