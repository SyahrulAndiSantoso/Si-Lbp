@extends('layouts.main4')

@section('konten')
<section>
    <div class="container list-wrapper">


        <div class="materi-link">
            <img src="{{ asset('assets/img/bg-list-materi.svg') }}" alt="" srcset="" />

        </div>

        @foreach($latihan as $row)
        <div class="list-materi">
            <p>{{ $row->nama_materi }}</p>
            <div class="materi">
                <a href="/pengerjaan-soal/{{$row->id_latihan}}">{{$row->nama_latihan}}</a>
            </div>
        </div>
        @endforeach

    </div>
</section>



@endsection