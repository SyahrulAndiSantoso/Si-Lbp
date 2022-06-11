@extends('layouts.main4')

@section('konten')
<section>
  <div class="container list-wrapper">
 
      @foreach($materi as $row)
        
      <div class="materi-link">
        @php
          $isDisable = ($quiz->materi_id >= $row->id_materi)?  "bx bxs-lock-open-alt" : "bx bxs-lock-alt";
        @endphp

        <i class="{{$isDisable}}"></i>
        <img src="{{ asset('assets/img/bg-list-materi.svg') }}" alt="" srcset="" />
        <p>{{ $row->nama_materi }}</p>
        <i class="bx bxs-chevron-down down-arrow"></i>
      </div>

      <div class="list-materi">

        @foreach($latihan as $i)
          @if($i->materi_id == $row->id_materi)
            
          <div class="materi">
            @if($isDisable == "bx bxs-lock-open-alt")
                
                <a href="/materi-praktikum/{{$i->id_latihan}}/{{$row->id_materi}}">{{$i->nama_latihan}}</a>
            
            @else

                <a href="#">{{$i->nama_latihan}}</a>

            @endif
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