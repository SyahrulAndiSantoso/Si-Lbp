@extends('layouts.main4')

@section('konten')

<section>
  <div class="container practice-wrapper">
    <div class="practice-1">
      <img src="{{ asset('assets/img/layer-practice-1.svg') }}" alt="" srcset="" />
      <h1>Pemrograman Terstruktur</h1>
      <p>Pada Praktikum Pemrograman Terstruktur membahas tentang tipe data, operator, pengkondisian, looping array,
        operasi string dan function</p>
      <a href="/latihan/1" class=" btn-start">Start Now</a>

    </div>

    <div class="practice-2">
      <img src="{{ asset('assets/img/layer-practice-2.svg') }}" alt="" srcset="" />
      <h1>Struktur Data</h1>
      <p>Pada Praktikum Struktur Data, membahas tentang struct, stack, queue, search, sorting, pointer, dan linked list
      </p>
      <a href="/latihan/2" class=" btn-start">Start Now</a>
    </div>
  </div>
</section>

<script src="{{ asset('assets/js/main.js') }}"></script>


@endsection