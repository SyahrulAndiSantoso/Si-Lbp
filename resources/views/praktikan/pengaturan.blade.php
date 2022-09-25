@extends('layouts.main2')

@section('konten')

@if (session()->has('sukses tambah'))
<div class="flash-data" data-flashdata="{{ session('sukses tambah') }}" data-halaman="pengaturan">
</div>
@elseif(session()->has('sukses update'))
<div class="flash-data" data-flashdata="{{ session('sukses update') }}" data-halaman="pengaturan">
</div>
@elseif(session()->has('sukses hapus'))
<div class="flash-data" data-flashdata="{{ session('sukses hapus') }}" data-halaman="pengaturan">
</div>
@endif

{{-- Notif Gagal --}}
@error('nama_praktikum')
<div class="flash-data" data-flashdata="Gagal" data-halaman="pengaturan">
</div>
@enderror

@error('gambar')
<div class="flash-data" data-flashdata="Gagal" data-halaman="pengaturan">
</div>
@enderror

@error('deskripsi')
<div class="flash-data" data-flashdata="Gagal" data-halaman="pengaturan">
</div>
@enderror

<div class="row justify-content-between">
        <div class="col-lg-3 col-5 text-end">
            <img class="" src="{{ asset('assets/img/logo-profile.svg') }}" width="100px" alt="">
        </div>
        <div class="col-lg-9 col-7 my-auto">
          <div class="lh-1">
            <p class="text-start fs-5 fw-bold">Revie Arsena</p>
            <p class="">Praktikan</p>
          </div>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-9">
          <form action="/update-profile" method="POST">
            <input type="hidden" id="id_praktikan" name="id_praktikan" value="{{ $data->id_praktikan }}">
              @csrf
              <div class="mb-3 mt-3">
                <label class="form-label">Npm</label>
                <input type="text" class="form-control rounded-pill @error('npm') is-invalid @enderror" id="npm" name="npm" value="{{ old('npm', $data->npm) }}" required>
                @error('npm')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" class="form-control rounded-pill @error('nama_praktikan') is-invalid @enderror" id="nama_praktikan" name="nama_praktikan" value="{{ old('nama_praktikan', $data->nama_praktikan) }}" required>
              @error('nama_praktikan')
              <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Nomer Hp</label>
              <input type="number" class="form-control rounded-pill @error('notelp') is-invalid @enderror" id="notelp" name="notelp" value="{{ old('notelp', $data->notelp) }}" required>
              @error('notelp')
              <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" class="form-control rounded-pill @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $data->email) }}" required>
              @error('email')
              <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" class="form-control rounded-pill @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password', $data->password) }}" required>
              @error('npm')
              <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="row justify-content-center">
                <div class="col-8 col-md-3 text-center">
                  <button type="submit" class="btn text-white w-100 rounded-pill" style="background-color: #07689f">Simpan</button>
                </div>
            </div>
          </form>
        </div>
      </div>

@endsection