@extends('layouts.main')
@section('konten')
<section class="section">
  <div class="card" style="background-color: #FCFCFE;">
    <div class="card-body">
<div class="row d-flex justify-content-center">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="text-white fa-solid fa-users" style="font-size: 30px;"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Praktikan</h4>
          </div>
          <div class="card-body">
            {{$praktikan}}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="text-white fa-solid fa-book" style="font-size: 30px;"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Pelajaran</h4>
          </div>
          <div class="card-body">
            {{$materi}}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
          <i class="text-white fa-solid fa-clipboard-list" style="font-size: 30px;"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Latihan</h4>
          </div>
          <div class="card-body">
            {{$latihan}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="row">
<div class="col-xl-12 col-lg-12">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-dark-blue">Chart</h6>
        <div class="dropdown no-arrow">
            <a class="dropdown-toggle">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
        </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="chart-area">
            <canvas id="myAreaChart"></canvas>
        </div>
    </div>
</div>
</div>
</div>

</section>
@endsection