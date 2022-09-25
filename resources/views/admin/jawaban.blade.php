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
                                <h4 class="text-dark">Hasil Jawaban Praktikum</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" width="100%" data-page-length="10"
                                        data-order="[[ 1, &quot;asc&quot; ]]">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>praktikum</th>
                                                <th>Latihan</th>
                                                <th>Jawaban</th>
                                                <th>Hasil Running</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jawaban as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$row->nama_praktikan}}</td>
                                                <td>{{$row->nama_praktikum}}</td>
                                                <td>{{$row->nama_latihan}}</td>
                                                <td>{{$row->jawaban}}</td>
                                                <td>{{$row->hasil}}</td>

                                                <td>
                                                    <a href="/admin/penilaian/{{$row->praktikan_id}}/{{$row->latihan_id}}"
                                                        class=" btn btn-success" id="inputNilai">Penilaian</a>
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