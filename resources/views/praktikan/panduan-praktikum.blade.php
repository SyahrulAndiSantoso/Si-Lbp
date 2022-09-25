@extends('layouts.main4')


@section('konten')

<section>
  <div class="container practice-wrapper">
    <div class="practice">
      <img src="{{ asset('assets/img/bg-guide.svg') }}" alt="" srcset="" />
      <div class="practice-desc">
        <h1>Panduan Mengerjakan</h1>
        <p>
          1. Kerjakan Sesuai Soal Yang Sudah Tertera <br />
          2. Jika Soal Sudah Dijawab, Klik Tombol Jawab Untuk Mengetahui Jawaban Benar Atau Salah <br />
          3. JIka Soal Berhasil Dijawab Maka Akan melanjutkan soal berikutnya
        </p>
      </div>
      <div>
        <a class="btn-start text-decoration-none" href="/latihan/{{$id}}">Start Practice</a>
      </div>
    </div>
  </div>
</section>

<script src="{{ asset('assets/js/main.js') }}"></script>

@endsection