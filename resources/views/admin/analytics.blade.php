@extends('admin.base')

@section('head')
    {{-- ===== Vendor CSS (same as admin/index) ===== --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/vendors/css/charts/chartist.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/vendors/css/charts/chartist-plugin-tooltip.css') }}">

    {{-- ===== Theme CSS ===== --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/components.css') }}">

    {{-- ===== Page CSS ===== --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/core/menu/menu-types/vertical-menu-modern.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/fonts/simple-line-icons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/pages/dashboard-ecommerce.css') }}">

    {{-- ===== Custom CSS ===== --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/assets/css/style.css') }}">

    {{-- ===== Chart.js CDN ===== --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <style>
        .analytics-header-title {
            color: #1E9FF2;
            margin-left: 5px;
            font-size: 20px;
            font-weight: bold;
            padding: 10px 0;
        }
        .filter-form .form-control {
            height: 36px;
            font-size: 13px;
            border-radius: 4px;
        }
        .filter-form .btn {
            height: 36px;
            font-size: 13px;
            padding: 0 16px;
        }
        .chart-canvas-wrapper {
            position: relative;
            height: 280px;
        }
        .online-pulse {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #28D094;
            margin-right: 6px;
            animation: pulse-green 1.5s infinite;
        }
        @keyframes pulse-green {
            0%   { box-shadow: 0 0 0 0 rgba(40,208,148,0.6); }
            70%  { box-shadow: 0 0 0 8px rgba(40,208,148,0); }
            100% { box-shadow: 0 0 0 0 rgba(40,208,148,0); }
        }
        .table-card thead th {
            font-size: 12px;
            text-transform: uppercase;
            color: #626262;
            border-top: none;
        }
        .table-card tbody td {
            font-size: 13px;
            vertical-align: middle;
        }
        .url-cell {
            max-width: 220px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .flag-icon {
            font-size: 16px;
            margin-right: 4px;
        }
    </style>
@endsection

@section('content')
<!-- BEGIN: Content -->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">

        {{-- ====== PAGE HEADER ====== --}}
        <div class="content-header row mb-0">
            <div class="col-md-7 col-sm-12">
                <h4 class="analytics-header-title">
                    <i class="icon-chart" style="font-size:18px;"></i>
                    &nbsp;Analytiques Visiteurs
                </h4>
            </div>
            <div class="col-md-5 col-sm-12 text-right">
                <form action="{{ route('admin.analytics') }}" method="GET" class="form-inline justify-content-end filter-form">
                    <input type="date" name="start_date" class="form-control mr-1" value="{{ $startDate }}">
                    <span class="mr-1" style="color:#626262;">→</span>
                    <input type="date" name="end_date" class="form-control mr-1" value="{{ $endDate }}">
                    <button type="submit" class="btn btn-info mr-1">
                        <i class="ft-filter"></i> Filtrer
                    </button>

                </form>
            </div>
        </div>

        <div class="content-body">

            {{-- ====== ROW 1 — STAT CARDS ====== --}}
            <p class="analytics-header-title">Statistiques Visiteurs</p>
            <div class="row">

                {{-- Online Now --}}
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="success">
                                            <span class="online-pulse"></span>{{ $onlineVisitors }}
                                        </h3>
                                        <h6>En Ligne Maintenant</h6>
                                    </div>
                                    <div>
                                        <i class="icon-people success font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Total Visits --}}
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="info">{{ $totalVisits }}</h3>
                                        <h6>Total Visites</h6>
                                        <small style="color:#626262;">
                                            Aujourd'hui: <strong>{{ $todayVisits }}</strong>
                                            &nbsp;|&nbsp; Semaine: <strong>{{ $thisWeekVisits }}</strong>
                                            &nbsp;|&nbsp; Mois: <strong>{{ $thisMonthVisits }}</strong>
                                        </small>
                                    </div>
                                    <div>
                                        <i class="icon-graph info font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 75%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Unique Visitors --}}
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="warning">{{ $uniqueVisitors }}</h3>
                                        <h6>Visiteurs Uniques</h6>
                                    </div>
                                    <div>
                                        <i class="icon-user-following warning font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 60%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Page Views --}}
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="danger">{{ $totalPageViews }}</h3>
                                        <h6>Vues de Pages</h6>
                                    </div>
                                    <div>
                                        <i class="icon-eye danger font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 80%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END ROW 1 --}}

            {{-- ROW 2 — CONTACT + QUICK STATS --}}
            <p class="analytics-header-title">Formulaires Contact</p>
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="info">{{ $totalSubmissions }}</h3>
                                        <h6>Soumissions Contact</h6>
                                    </div>
                                    <div>
                                        <i class="icon-envelope-open info font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 50%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="success">{{ $todayVisits }}</h3>
                                        <h6>Visites Aujourd'hui</h6>
                                    </div>
                                    <div>
                                        <i class="icon-calendar success font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 40%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="warning">{{ $thisWeekVisits }}</h3>
                                        <h6>Visites Cette Semaine</h6>
                                    </div>
                                    <div>
                                        <i class="icon-chart warning font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 55%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="danger">{{ $thisMonthVisits }}</h3>
                                        <h6>Visites Ce Mois</h6>
                                    </div>
                                    <div>
                                        <i class="icon-globe danger font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 65%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END ROW 2 --}}

            {{-- ROW 3 — CHARTS --}}
            <div class="row">
                {{-- Line Chart — Visits over time --}}
                <div class="col-xl-8 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" style="color:#2c3e50;">
                                <i class="icon-graph" style="color:#1E9FF2;"></i>
                                &nbsp;Visites au fil du temps
                            </h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content">
                            <div class="card-body" style="padding-bottom: 10px;">
                                <div class="chart-canvas-wrapper">
                                    <canvas id="visitsLineChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Doughnut Chart — Visits by Country --}}
                <div class="col-xl-4 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" style="color:#2c3e50;">
                                <i class="icon-globe" style="color:#1E9FF2;"></i>
                                &nbsp;Visites par Pays
                            </h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="chart-canvas-wrapper" style="height:240px;">
                                    <canvas id="countryDoughnutChart"></canvas>
                                </div>
                                {{-- Country list --}}
                                <div class="mt-1">
                                    @foreach(array_slice(array_combine($countryLabels, $countryData), 0, 5, true) as $country => $count)
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span style="font-size:13px;">{{ $country }}</span>
                                        <span class="badge badge-pill badge-info">{{ $count }}</span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END ROW 3 --}}

            {{-- ROW 4 — TABLES --}}
            <div class="row">
                {{-- Top Pages --}}
                <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" style="color:#2c3e50;">
                                <i class="icon-fire" style="color:#FF4961;"></i>
                                &nbsp;Pages les plus visitées
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover table-card mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>URL</th>
                                                <th>Titre</th>
                                                <th>Vues</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($topPages as $i => $page)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td class="url-cell">
                                                    <a href="{{ $page->url }}" target="_blank" title="{{ $page->url }}">
                                                        {{ $page->url }}
                                                    </a>
                                                </td>
                                                <td>{{ $page->page_title ?? '—' }}</td>
                                                <td>
                                                    <span class="badge badge-pill badge-info">{{ $page->views }}</span>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted py-3">
                                                    Aucune donnée pour la période sélectionnée
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-2 d-flex justify-content-center">
                                    {{ $topPages->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Recent Visitors --}}
                <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" style="color:#2c3e50;">
                                <i class="icon-user-following" style="color:#28D094;"></i>
                                &nbsp;Visiteurs Récents
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover table-card mb-0">
                                        <thead>
                                            <tr>
                                                <th>Pays / Ville</th>
                                                <th>IP</th>
                                                <th>Date</th>
                                                <th>Pages</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($recentVisitors as $visitor)
                                            <tr>
                                                <td>
                                                    <strong>{{ $visitor->country }}</strong>
                                                    @if($visitor->city && $visitor->city !== 'Unknown')
                                                        <br><small class="text-muted">{{ $visitor->city }}</small>
                                                    @endif
                                                </td>
                                                <td>
                                                    <code style="font-size:11px;">{{ $visitor->ip_address }}</code>
                                                </td>
                                                <td>
                                                    <small>{{ $visitor->created_at->diffForHumans() }}</small>
                                                </td>
                                                <td>
                                                    <span class="badge badge-pill badge-success">{{ $visitor->page_views_count }}</span>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted py-3">
                                                    Aucun visiteur enregistré
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-2 d-flex justify-content-center">
                                    {{ $recentVisitors->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END ROW 4 --}}

        </div>{{-- end content-body --}}
    </div>{{-- end content-wrapper --}}
</div>
<!-- END: Content -->
@endsection


@section('script')
    {{-- ===== Vendor JS (same as admin/index) ===== --}}
    <script src="{{ asset('assets/admin/vendors/js/vendors.min.js') }}"></script>

    {{-- ===== Theme JS ===== --}}
    <script src="{{ asset('assets/admin/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('assets/admin/js/core/app.js') }}"></script>

    {{-- ===== Charts ===== --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            // ── 1. Line Chart — Visits over time ──────────────────────────────
            var ctxLine = document.getElementById('visitsLineChart');
            if (ctxLine) {
                new Chart(ctxLine, {
                    type: 'line',
                    data: {
                        labels: {!! json_encode($chartDates) !!},
                        datasets: [{
                            label: 'Visites',
                            data: {!! json_encode($chartVisits) !!},
                            borderColor: '#1E9FF2',
                            backgroundColor: 'rgba(30, 159, 242, 0.08)',
                            borderWidth: 2.5,
                            pointBackgroundColor: '#1E9FF2',
                            pointRadius: 3,
                            fill: true,
                            tension: 0.45
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false }
                        },
                        scales: {
                            x: {
                                grid: { color: 'rgba(0,0,0,0.05)' },
                                ticks: { color: '#626262', font: { size: 11 } }
                            },
                            y: {
                                beginAtZero: true,
                                grid: { color: 'rgba(0,0,0,0.05)' },
                                ticks: {
                                    color: '#626262',
                                    font: { size: 11 },
                                    precision: 0
                                }
                            }
                        }
                    }
                });
            }

            // ── 2. Doughnut Chart — Visits by Country ─────────────────────────
            var ctxDoughnut = document.getElementById('countryDoughnutChart');
            if (ctxDoughnut) {
                new Chart(ctxDoughnut, {
                    type: 'doughnut',
                    data: {
                        labels: {!! json_encode($countryLabels) !!},
                        datasets: [{
                            data: {!! json_encode($countryData) !!},
                            backgroundColor: [
                                '#1E9FF2', '#28D094', '#FF4961', '#FF9149',
                                '#666EE8', '#28a745', '#dc3545', '#ffc107',
                                '#17a2b8', '#6c757d'
                            ],
                            borderWidth: 2,
                            borderColor: '#fff'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: '65%',
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    color: '#626262',
                                    font: { size: 11 },
                                    padding: 10,
                                    boxWidth: 12
                                }
                            }
                        }
                    }
                });
            }

        });
    </script>
@endsection
