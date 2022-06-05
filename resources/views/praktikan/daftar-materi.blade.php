@extends('layouts.main4')

@section('konten')
<section>
  <div class="container list-wrapper">
    <div class="materi-link">
      <i class="bx bxs-lock-open-alt"></i>
      <img src="{{ asset('assets/img/bg-list-materi.svg') }}" alt="" srcset="" />
      <p>Perintah Keluaran & Masukan</p>
      <i class="bx bxs-chevron-down down-arrow"></i>
    </div>
    <div class="list-materi">
      <div class="materi">
        <p>Menggunakan Perintah Keluaran Cout</p>
      </div>
      <div class="materi">
        <p>Menggunakan Perintah Keluaran Printf</p>
      </div>
    </div>

    <div class="materi-link">
      <i class="bx bxs-lock-alt"></i>
      <img src="{{ asset('assets/img/bg-list-materi.svg') }}" alt="" srcset="" />
      <p>Perulangan & Pengujian</p>
      <i class="bx bxs-chevron-down down-arrow"></i>
    </div>
    <div class="materi-link">
      <i class="bx bxs-lock-alt"></i>
      <img src="{{ asset('assets/img/bg-list-materi.svg') }}" alt="" srcset="" />
      <p>Array</p>
      <i class="bx bxs-chevron-down down-arrow"></i>
    </div>
    <div class="materi-link">
      <i class="bx bxs-lock-alt"></i>
      <img src="{{ asset('assets/img/bg-list-materi.svg') }}" alt="" srcset="" />
      <p>Fuction & Header</p>
      <i class="bx bxs-chevron-down down-arrow"></i>
    </div>
  </div>
</section>

<script>
  let arrowDown = document.querySelector(".down-arrow");
let listMateri = document.querySelector(".list-materi");
arrowDown.addEventListener("click", function () {
  listMateri.classList.toggle("inactive");
});
</script>

@endsection