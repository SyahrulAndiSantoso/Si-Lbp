@extends('layouts.main')
@section('konten')
    {{-- @dump($praktikum) --}}
    <section class="section">
        <div class="card" style="background-color: #FCFCFE;">
            <div class="card-body">
                <div class="section-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="text-dark">Edit Pelajaran</h4>
                                </div>
                                <div class="card-body">
                                    <form action="/admin/praktikum/update" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id_praktikum" value="{{ $praktikum->id_praktikum }}">
                                        <input type="hidden" name="gambarLama" value="{{ $praktikum->gambar }}">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Praktikum</label>
                                            <input type="text"
                                                class="form-control @error('nama_praktikum') is-invalid @enderror"
                                                id="nama_praktikum" name="nama_praktikum"
                                                value="{{ old('nama_praktikum', $praktikum->nama_praktikum) }}">
                                            @error('nama_praktikum')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi</label>
                                            <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                                                name="deskripsi" id="deskripsi"> {{ $praktikum->deskripsi }}</textarea>
                                            @error('deskripsi')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Gambar</label>
                                            @if ($praktikum->gambar)
                                                <img src="{{ asset('storage/' . $praktikum->gambar) }}"
                                                    class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                            @else
                                                <img class="img-preview img-fluid mb-3 col-sm-5">
                                            @endif
                                            <input class="form-control" type="file" id="gambar" name="gambar"
                                                onchange="preview()">
                                            @error('gambar')
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

    <script>
        function preview() {
            const image = document.querySelector('#gambar');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

    </script>
@endsection

@section('ckeditor2')
    @include('partials.ckeditorEdit')
@endsection
