@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <!-- Header -->
        <div class="block block-rounded">
            <div class="block-content bg-white-5">
                <div class="py-4 text-center">
                    <h1 class="h2 fw-bold mb-2">SELAMAT DATANG DIWEBSITE PENJUALAN BERAS</h1>
                    <img src="{{ asset('assets/media/photos/header_dashboard.png') }}" alt="logo" class="img-fluid"
                        style="max-width: 100px;">
                    <h2 class="h5 fw-medium">BUMDES SEKECAMATAN SIAK KECIL</h2>
                </div>
            </div>
        </div>
        <!-- END Header -->

        {{-- user has role bumdes --}}
        @if (auth()->user()->hasRole('bumdes'))
            <div class="row">
                <!-- Row #2 -->
                <div class="col-md-6">
                    <div class="block block-rounded">
                        <div class="block-header">
                            <h3 class="block-title">
                                Pendapatan Bulanan <small>(2024)</small>
                            </h3>
                        </div>
                        <div class="block-content p-1 bg-body-light">
                            <canvas id="js-chartjs-dashboard-monthly" style="height: 290px; display: block; box-sizing: border-box; width: 580px;" width="1160" height="580"></canvas>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-md-6">
                    <div class="block block-rounded">
                        <div class="block-header">
                            <h3 class="block-title">
                                Earnings <small>This week</small>
                            </h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option"
                                    data-action="state_toggle" data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
                                <button type="button" class="btn-block-option">
                                    <i class="si si-wrench"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content p-1 bg-body-light">
                            <!-- Chart.js Chart is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _js/pages/be_pages_dashboard.js -->
                            <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                            <canvas id="js-chartjs-dashboard-lines2"
                                style="height: 290px; display: block; box-sizing: border-box; width: 580px;" width="1160"
                                height="580"></canvas>
                        </div>
                    </div>
                </div> --}}
                <!-- END Row #2 -->
            </div>
        @endif
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('js-chartjs-dashboard-monthly').getContext('2d');

            var labels = {!! json_encode($rekap_penjualan_perbulan->pluck('bulan')) !!};
            var data = {!! json_encode($rekap_penjualan_perbulan->pluck('total')) !!};

            var backgroundColors = [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ];

            var borderColors = [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ];

            var monthlyChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Total Penjualan',
                        data: data,
                        backgroundColor: backgroundColors,
                        borderColor: borderColors,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    // Menggunakan format rupiah pada sumbu Y
                                    return 'Rp ' + new Intl.NumberFormat('id-ID', {
                                        style: 'decimal',
                                        currency: 'IDR'
                                    }).format(value);
                                }
                            }
                        }
                    },
                    tooltips: {
                        callbacks: {
                            label: function(tooltipItem, data) {
                                var label = data.datasets[tooltipItem.datasetIndex].label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += 'Rp ' + new Intl.NumberFormat('id-ID', {
                                    style: 'decimal',
                                    currency: 'IDR'
                                }).format(tooltipItem.yLabel);
                                return label;
                            }
                        }
                    }
                }
            });
        });
    </script>
@endpush
