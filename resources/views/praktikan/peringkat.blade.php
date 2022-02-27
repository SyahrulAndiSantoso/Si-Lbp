@extends('layouts.main2')

@section('konten')
    
<div class="container-fluid">
    <br><br><br>
    <div class="row justify-content-center">
    <div class="col-md-9 col-lg-9">
    <div class="card pt-12 mt-5 mb-12">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="display" width="100%" data-page-length="10" data-order="[[ 1, &quot;asc&quot; ]]">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Level</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>10</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>9</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Lary</td>
                            <td>8</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Ruby</td>
                            <td>7</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Max</td>
                            <td>6</td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td>Zei</td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <th scope="row">7</th>
                            <td>Yii</td>
                            <td>4</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        </div>

    </div>
</div>

@endsection