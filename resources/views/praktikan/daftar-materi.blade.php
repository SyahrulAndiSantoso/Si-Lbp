@extends('layouts.main4')

@section('konten')
<section>
  <div class="container list-wrapper">

    @foreach($materi as $row)

    <div class="materi-link">
      <img src="{{ asset('assets/img/bg-list-materi.svg') }}" alt="" srcset="" />
      <p>{{ $row->nama_materi }}</p>
      <i class="bx bxs-chevron-down down-arrow"></i>
    </div>

    <div class="list-materi">

      @foreach($latihan as $i)
      @if($i->materi_id == $row->id_materi)

      <div class="materi">
        <a href="#">{{$i->nama_latihan}}</a>

      </div>

      @endif
      @endforeach

    </div>
    @endforeach

  </div>
</section>

<script>
  let arrowDown = document.querySelectorAll(".down-arrow");
  let listMateri = document.querySelectorAll(".list-materi");
  
for (i = 0; i < arrowDown.length; i++) {
  arrowDown[i].addEventListener('click', function(i) {
    listMateri[i].classList.toggle("inactive");
  }.bind(this, i));  
}

</script>

@endsection