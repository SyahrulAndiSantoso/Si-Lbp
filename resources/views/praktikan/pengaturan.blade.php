@extends('layouts.main2')

@section('konten')

<div class="container d-flex justify-content-center w-100">
    <div class="card w-75 rounded-10">
        <div class="card-header bg-button">
            <h3 class="text-center text-white">Pengaturan Akun</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control rounded-10" placeholder="Revie Nur Arsena">
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" id="password"  class="form-control rounded-10" placeholder="***********">
                </div>

                <div class="mb-3">
                    <label class="form-label">No Telepon</label>
                    <input type="number" name="no_telp" id="no_telp" class="form-control rounded-10" placeholder="08123456789">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control rounded-10" placeholder="Revie@gmail.com">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn bg-button rounded-10 p-2 text-white w-100 fs-5 shadow-sm">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection