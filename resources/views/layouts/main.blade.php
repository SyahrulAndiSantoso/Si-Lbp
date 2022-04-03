<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $judul }}</title>
    {{-- Datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    {{-- Fontawesome Libraries --}}
    <link href="{{ asset('assets/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    {{-- Sweetalert --}}
    <script src="{{ asset('assets/sweetalert/sweetalert2.all.min.js') }}"></script>
    {{-- css modal --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap4-modal-fullscreen.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    {{-- shortcut icon --}}
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/circle-logo.png') }}">
    {{-- ckeditor --}}
    <script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
    {{-- chart js --}}
    <script src="{{ asset('assets/js/chart/Chart.min.js') }}"></script>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg bg-primary"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">


                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, Syahrul Riza</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a data-toggle="modal" data-target="#modalPengaturan" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Pengaturan
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Keluar
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html" class="text-primary">Admin</a>
                    </div>
                    {{-- <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html" class="text-primary">ADM</a>
          </div> --}}
                    <ul class="sidebar-menu">
                        <li class="menu-header">Halaman</li>
                        <li class="{{ $judul == 'Dashboard' ? 'active' : '' }}"><a class="nav-link"
                                href="/admin/dashboard"><i class="fa-brands fa-hotjar"></i><span>Dashboard</span></a>
                        </li>
                        <li class="{{ $judul == 'Pelajaran' ? 'active' : '' }}"><a class="nav-link"
                                href="/admin/pelajaran"><i class="fa-solid fa-book"></i> <span>Pelajaran</span></a></li>
                        <li class=" {{ $judul == 'Materi' ? 'active' : '' }}"><a class="nav-link"
                                href="/admin/materi"><i class="fa-solid fa-file-code"></i> <span>Materi</span></a></li>
                        <li class="{{ $judul == 'Latihan' ? 'active' : '' }}"><a class="nav-link"
                                href="/admin/latihan"><i class="fa-solid fa-clipboard-list"></i>
                                <span>Latihan</span></a></li>
                        <li class="menu-header">Pengguna</li>
                        <li class="{{ $judul == 'Praktikan' ? 'active' : '' }}"><a class="nav-link"
                                href="/admin/praktikan"><i class="fa-solid fa-users"></i> <span>Praktikan</span></a>
                        </li>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">

                <div class="modal fade" id="modalPengaturan" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pengaturan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Npm</label>
                                        <input type="text" class="form-control" id="npm" name="npm">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Kata Sandi</label>
                                        <input type="password" class="form-control" id="kataSandi" name="kataSandi">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                @yield('konten')
            </div>
            <footer class="main-footer">
                <div class="d-flex justify-content-center">
                    Made With <i class="text-danger fa-solid fa-heart"></i> <span class="text-primary">By Laboratorium
                        Bahasa Pemrograman</span>
                </div>
            </footer>
        </div>
    </div>



    <!-- General JS Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/myScript.js') }}"></script>

    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        // Area Chart Example
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Total Uang",
                    lineTension: 0.3,
                    backgroundColor: "#1185C8",
                    borderColor: "#1C2CC3",
                    pointRadius: 3,
                    pointBackgroundColor: "#1C2CC3",
                    pointBorderColor: "#1C2CC3",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "#1C2CC3",
                    pointHoverBorderColor: "#1C2CC3",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [80000, 60000, 40000, 60000, 30000, 100000, 70000, 90000, 80000, 80000,
                        100000, 100000
                    ],
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return 'Rp.' + number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
                        }
                    }
                }
            }
        });

    </script>


    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

    </script>

    @yield('ckeditor1')
    @yield('ckeditor2')
    <!-- Page Specific JS File -->
</body>

</html>
