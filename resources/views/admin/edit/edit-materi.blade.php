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
                                    <h4 class="text-dark">Edit Materi</h4>
                                </div>
                                <div class="card-body">
                                    <form action="/materi/update" method="post">
                                        @csrf
                                        <input type="hidden" class="form-control" id="edit-id" name="id_materi">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Materi</label>
                                            <input type="text" class="form-control" id="edit-namaMateri"
                                                name="nama_materi">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Isi Materi</label>
                                            <textarea class="form-control" name="isi_materi" id="editor1" style="height: 100px">

                                            </textarea>
                                        </div>
                                        {{-- <div class="mb-3"> --}}
                                        {{-- <label class="form-label">Pelajaran</label> --}}
                                        {{-- <input type="text" class="form-control" id="pelajaran" name="pelajaran"> --}}
                                        {{-- </div> --}}
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

@section('ckeditor2')
    @include('partials.ckeditorEdit')
@endsection
