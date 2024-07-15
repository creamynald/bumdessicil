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

        <div class="row">
            <!-- Row #2 -->
            <div class="col-md-6">
                <div class="block block-rounded">
                    <div class="block-header">
                        <h3 class="block-title">
                            Pendapatan Bulanan <small>(This month)</small>
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
                    <div class="block-content p-1 bg-body-light"
                        data-sales-labels='["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]'
                        data-sales-data='[100, 150, 200, 250, 300, 350, 400, 450, 500, 550, 600, 650]'>
                        <canvas id="js-chartjs-dashboard-monthly"
                            style="height: 290px; display: block; box-sizing: border-box; width: 580px;" width="1160"
                            height="580"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
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
            </div>
            <!-- END Row #2 -->
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        /*!
         * codebase - v5.5.0
         * @author pixelcave - https://pixelcave.com
         * Copyright (c) 2023
         */
        ! function() {
            class e {
                static initDashboardChartJS() {
                    Chart.defaults.color = "#818d96",
                        Chart.defaults.scale.grid.color = "transparent",
                        Chart.defaults.scale.grid.zeroLineColor = "transparent",
                        Chart.defaults.scale.display = !1,
                        Chart.defaults.scale.beginAtZero = !0,
                        Chart.defaults.elements.line.borderWidth = 2,
                        Chart.defaults.elements.point.radius = 5,
                        Chart.defaults.elements.point.hoverRadius = 7,
                        Chart.defaults.plugins.tooltip.radius = 3,
                        Chart.defaults.plugins.legend.display = !1;

                    let e, t,
                        a = document.getElementById("js-chartjs-dashboard-lines"),
                        o = document.getElementById("js-chartjs-dashboard-lines2"),
                        m = document.getElementById("js-chartjs-dashboard-monthly");

                    null !== a && (e = new Chart(a, {
                        type: "line",
                        data: {
                            labels: ["MON", "TUE", "WED", "THU", "FRI", "SAT", "SUN"],
                            datasets: [{
                                label: "This Week",
                                fill: !0,
                                backgroundColor: "rgba(2, 132, 199, .45)",
                                borderColor: "rgba(2, 132, 199, 1)",
                                pointBackgroundColor: "rgba(2, 132, 199, 1)",
                                pointBorderColor: "#fff",
                                pointHoverBackgroundColor: "#fff",
                                pointHoverBorderColor: "rgba(2, 132, 199, 1)",
                                data: [25, 21, 23, 38, 36, 35, 39]
                            }]
                        },
                        options: {
                            responsive: !0,
                            maintainAspectRatio: !1,
                            tension: .4,
                            scales: {
                                y: {
                                    suggestedMin: 0,
                                    suggestedMax: 50
                                }
                            },
                            interaction: {
                                intersect: !1
                            },
                            plugins: {
                                tooltip: {
                                    callbacks: {
                                        label: function(e) {
                                            return " " + e.parsed.y + " Sales"
                                        }
                                    }
                                }
                            }
                        }
                    }));

                    null !== o && (t = new Chart(o, {
                        type: "line",
                        data: {
                            labels: ["MON", "TUE", "WED", "THU", "FRI", "SAT", "SUN"],
                            datasets: [{
                                label: "This Week",
                                fill: !0,
                                backgroundColor: "rgba(101, 163, 13, .45)",
                                borderColor: "rgba(101, 163, 13, 1)",
                                pointBackgroundColor: "rgba(101, 163, 13, 1)",
                                pointBorderColor: "#fff",
                                pointHoverBackgroundColor: "#fff",
                                pointHoverBorderColor: "rgba(101, 163, 13, 1)",
                                data: [190, 219, 235, 320, 360, 354, 390]
                            }]
                        },
                        options: {
                            responsive: !0,
                            maintainAspectRatio: !1,
                            tension: .4,
                            scales: {
                                y: {
                                    suggestedMin: 0,
                                    suggestedMax: 480
                                }
                            },
                            interaction: {
                                intersect: !1
                            },
                            plugins: {
                                tooltip: {
                                    callbacks: {
                                        label: function(e) {
                                            return " $" + e.parsed.y
                                        }
                                    }
                                }
                            }
                        }
                    }));

                    if (null !== m) {
                        const salesElement = m.closest('.block-content');
                        const salesLabels = JSON.parse(salesElement.getAttribute('data-sales-labels'));
                        const salesData = JSON.parse(salesElement.getAttribute('data-sales-data'));
                        new Chart(m, {
                            type: 'line',
                            data: {
                                labels: salesLabels,
                                datasets: [{
                                    label: 'Penjualan Bulanan',
                                    fill: true,
                                    backgroundColor: 'rgba(2, 132, 199, .45)',
                                    borderColor: 'rgba(2, 132, 199, 1)',
                                    pointBackgroundColor: 'rgba(2, 132, 199, 1)',
                                    pointBorderColor: '#fff',
                                    pointHoverBackgroundColor: '#fff',
                                    pointHoverBorderColor: 'rgba(2, 132, 199, 1)',
                                    data: salesData
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                tension: .4,
                                scales: {
                                    y: {
                                        suggestedMin: 0,
                                        suggestedMax: Math.max(...salesData) + 10
                                    }
                                },
                                interaction: {
                                    intersect: false
                                },
                                plugins: {
                                    tooltip: {
                                        callbacks: {
                                            label: function(context) {
                                                return ` ${context.parsed.y} Sales`;
                                            }
                                        }
                                    }
                                }
                            }
                        });
                    }
                }
                static init() {
                    this.initDashboardChartJS();
                }
            }
            Codebase.onLoad((() => e.init()));
        }();
    </script>
@endpush
