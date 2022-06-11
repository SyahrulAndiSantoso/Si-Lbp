@extends('layouts.main4')

@section('konten')

<section>
  <div class="container practice-wrapper">
    <div class="practice-1">
      <img src="{{ asset('assets/img/layer-practice-1.svg') }}" alt="" srcset="" />
      <h1>Pemrograman Terstruktur</h1>
      <p>Pada Praktikum Pemrograman Terstruktur membahas tentang tipe data, operator, pengkondisian, looping array, operasi string dan function</p>
        <form action="/panduan-praktikum" method="POST">
          @csrf
          <input type="hidden" name="id_praktikan" value="{{ Auth::guard('praktikan')->user()->id_praktikan }}">
          <input type="hidden" name="praktikumId" value="1">
            <button class="btn-start">Start Now</button>
        </form>
    </div>

    <div class="practice-2">
      <img src="{{ asset('assets/img/layer-practice-2.svg') }}" alt="" srcset="" />
      <h1>Struktur Data</h1>
      <p>Pada Praktikum Struktur Data, membahas tentang struct, stack, queue, search, sorting, pointer, dan linked list</p>
        <form action="/panduan-praktikum" method="POST">
            @csrf
            <input type="hidden" name="id_praktikan" value="{{ Auth::guard('praktikan')->user()->id_praktikan }}">
            <input type="hidden" name="praktikumId" value="2">
            <button class="btn-start">Start Now</button>
        </form>
    </div>
  </div>
</section>

<script src="{{ asset('assets/js/main.js') }}"></script>


@endsection