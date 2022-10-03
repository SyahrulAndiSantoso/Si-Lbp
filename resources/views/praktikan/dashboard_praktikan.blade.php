@extends('layouts.main2')

@section('konten')
@if (session()->has('sukses'))
<div class="flash-data" data-flashdata="{{ session('sukses') }}" data-halaman="praktikan">
</div>
@endif
<div class="row d-flex justify-content-center px-4">

  <div class="col-12">
    <div class="card rounded-15">
      <div class="">
        <div class="row">
          <div class="col-md-6 col-12 px-5 py-4">
            <h5 class="card-title fw-bold">Hello, Welcome Back {{ Auth::guard('praktikan')->user()->nama_praktikan }}
            </h5>
            <p>Lets start your New Practice</p>
            <a href="/praktikum" class="btn btn-dark px-4 mt-3">Start Now</a>
          </div>
          <div class="col-6 none">
            <div class="d-flex justify-content-end">
              <img src="{{ asset('assets/img/bg6.png') }}" alt="" width="280px">
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
</div>

{{-- <script>
  const labels = [

  ];

  const data = {
  labels: [
  
  ],
  datasets: [{
    label: 'Pemrograman Terstruktur',
    data: [ ],
    backgroundColor: [
      'rgb(50, 144, 237)',
      'rgb(119, 181, 242)',
    ],
    hoverOffset: 2
  }]
};

  const config = {
    type: 'doughnut',
    data: data,
    options: {}
  };

  const petruk = new Chart(
    document.getElementById('Petruk'),
    config
  );

</script>

<script>
  const labels1 = [

  ];

  const data1 = {
  labels: [
  
  ],
  datasets: [{
    label: 'Struktur Data',
    data: [ ],
    backgroundColor: [
      'rgb(50, 144, 237)',
      'rgb(119, 181, 242)', 
    ],
    hoverOffset: 2
  }]
};

  const config1 = {
    type: 'doughnut',
    data: data1,
    options: {}
  };

  const strukdat = new Chart(
    document.getElementById('Strukdat'),
    config1
  );
</script>
--}}



@endsection