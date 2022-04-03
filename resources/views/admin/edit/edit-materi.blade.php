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
                                        <input type="hidden" class="form-control" id="edit-id" name="id_materi"
                                            value="{{ $data->id_materi }}">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Materi</label>
                                            <input type="text" class="form-control" id="edit-namaMateri" name="nama_materi"
                                                value="{{ $data->nama_materi }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Praktikum</label>
                                            <select class="form-control" id="praktikum" name="praktikum_id"
                                                value="{{ $data->praktikum->nama_praktikum }}">
                                                <optgroup label="PRAKTIKUM">
                                                    @foreach ($data_praktikum as $row)
                                                        @if ($row->id_praktikum == $data->praktikum_id)
                                                            @php
                                                                $status = 'selected';
                                                            @endphp
                                                        @else
                                                            @php
                                                                $status = '';
                                                            @endphp
                                                        @endif
                                                        <option {{ $status }} value="{{ $row->id_praktikum }}">
                                                            {{ $row->nama_praktikum }}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Isi Materi</label>
                                            <textarea class="form-control" name="isi_materi" id="isi_materi"
                                                style="height: 100px">
                                                    {{ $data->isi_materi }}
                                                </textarea>
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

@section('ckeditor2')
    @include('partials.ckeditorEdit')
@endsection
