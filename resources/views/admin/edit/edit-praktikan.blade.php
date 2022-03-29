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
                                    <form action="/admin/praktikan/edit" method="POST">
                                        <input type="hidden" id="id_praktikan" name="id_praktikan">
                                        @csrf
                                        @method('put')
                                        <div class="mb-3">
                                            <label class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="nama2" name="nama_praktikan">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nomer Hp</label>
                                            <input type="text" class="form-control" id="notelp2" name="notelp">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Npm</label>
                                            <input type="text" class="form-control" id="npm2" name="npm">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="text" class="form-control" id="email2" name="email">
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
