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
                      <h5 class="card-title fw-bold">Hello, Welcome Back Revie Arsena</h5>
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
        
          <div class="row mt-3">
            <div class="col-lg-6 col-md-12 col-12 mb-3">
              <div class="card rounded-15">
                <div class="card-body">
                  <h5 class="card-title fw-bold fs-16">Pemrograman Terstruktur</h5>
                  <div class="row">
                    <div class="col-6 px-5">
                      <div class="canvas">
                        <h3 class="percentage"> {{$percentage['petruk']."%"}}</h3>
                        <canvas id="Petruk"></canvas>
                      </div>
                    </div>
                    <div class="col-6 fs-16 px-3 mt-2" style="line-height: 10px;">
                        <p class="">In Progress</p>
                        <p class="fw-bold">{{$percentage['petrukInProgress']}} Practice</p><br>
                        <p class="">Complete</p>
                        <p class="fw-bold">{{$percentage['petrukFinish']}} Practice</p>

                      <a href="/materi-praktikum/{{$percentage['PT']->latihan_id}}/{{$percentage['PT']->materi_id}}" class="btn fw-bold fs-14 mt-2" style="background-color: #77B5F2 ;">Continue ></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
              <div class="card rounded-15">
                <div class="card-body">
                  <h5 class="card-title fw-bold fs-16">Struktur Data</h5>
                  <div class="row">
                    <div class="col-6 px-5">
                      <div class="canvas">
                        <canvas id="Strukdat"></canvas>
                        <h3 class="percentage"> {{$percentage['strukdat']."%"}}</h3>
                      </div>
                    </div>
                    <div class="col-6 fs-16 px-3 mt-2" style="line-height: 10px;">
                      <p class="">In Progress</p>
                      <p class="fw-bold">{{$percentage['strukdatInProgress']}} Practice</p><br>
                      <p class="">Complete</p>
                      <p class="fw-bold">{{$percentage['strukdatFinish']}} Practice</p>

                      <a href="/materi-praktikum/{{$percentage['SD']->latihan_id}}/{{$percentage['SD']->materi_id}}" class="btn fw-bold fs-14 mt-2" style="background-color: #77B5F2 ;">Continue ></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
</div>
</div>

<script>
   let petrukInProgress = "<?php echo $percentage['petrukInProgress'] ?>"
  let petrukFinish = "<?php echo $percentage['petrukFinish'] ?>"


  const labels = [

  ];

  const data = {
  labels: [
  
  ],
  datasets: [{
    label: 'Pemrograman Terstruktur',
    data: [ petrukFinish, petrukInProgress],
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
  let strukdatInProgress = "<?php echo $percentage['strukdatInProgress'] ?>"
   let strukdatFinish = "<?php echo $percentage['strukdatFinish'] ?>"
  const labels1 = [

  ];

  const data1 = {
  labels: [
  
  ],
  datasets: [{
    label: 'Struktur Data',
    data: [ strukdatFinish, strukdatInProgress],
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




@endsection