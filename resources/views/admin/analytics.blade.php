@extends('admin.base')

@section('head')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .stat-card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 20px;
            background: #fff;
        }
        .stat-card h3 {
            font-size: 2rem;
            margin-bottom: 0;
            color: #2c3e50;
        }
        .stat-card p {
            color: #7f8c8d;
            margin-bottom: 0;
            font-weight: 600;
        }
        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
        }
        .table-responsive {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
    </style>
@endsection

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row mb-2">
            <div class="col-md-6">
                <h2 class="content-header-title">Analytiques Visiteurs</h2>
            </div>
            <div class="col-md-6 text-right">
                <form action="{{ route('admin.analytics') }}" method="GET" class="form-inline float-right">
                    <input type="date" name="start_date" class="form-control mr-1" value="{{ $startDate }}">
                    <input type="date" name="end_date" class="form-control mr-1" value="{{ $endDate }}">
                    <button type="submit" class="btn btn-primary mr-1">Filtrer</button>
                    <a href="{{ route('admin.analytics.export', ['start_date' => $startDate, 'end_date' => $endDate]) }}" class="btn btn-success">Exporter CSV</a>
                </form>
            </div>
        </div>

        <div class="content-body">
            <!-- Stats Row -->
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="stat-card border-top-primary">
                        <p>Visiteurs en ligne (5m)</p>
                        <h3 class="text-primary">{{ $onlineVisitors }}</h3>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="stat-card border-top-success">
                        <p>Total Visites</p>
                        <h3 class="text-success">{{ $totalVisits }}</h3>
                        <small>Aujourd'hui: {{ $todayVisits }} | Cette semaine: {{ $thisWeekVisits }}</small>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="stat-card border-top-info">
                        <p>Visiteurs Uniques</p>
                        <h3 class="text-info">{{ $uniqueVisitors }}</h3>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="stat-card border-top-warning">
                        <p>Vues de pages</p>
                        <h3 class="text-warning">{{ $totalPageViews }}</h3>
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Visites au fil du temps</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="chart-container">
                                    <canvas id="visitsChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Visites par Pays</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="chart-container">
                                    <canvas id="countryChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tables Row -->
            <div class="row mt-2">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pages les plus visitées</h4>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>URL</th>
                                            <th>Titre</th>
                                            <th>Vues</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($topPages as $page)
                                        <tr>
                                            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                <a href="{{ $page->url }}" target="_blank">{{ $page->url }}</a>
                                            </td>
                                            <td>{{ $page->page_title }}</td>
                                            <td><span class="badge badge-info">{{ $page->views }}</span></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Visiteurs Récents</h4>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Pays/Ville</th>
                                            <th>IP</th>
                                            <th>Date</th>
                                            <th>Pages vues</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recentVisitors as $visitor)
                                        <tr>
                                            <td>{{ $visitor->country }} / {{ $visitor->city }}</td>
                                            <td>{{ $visitor->ip_address }}</td>
                                            <td>{{ $visitor->created_at->diffForHumans() }}</td>
                                            <td>{{ $visitor->page_views_count }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Line Chart for Visits over time
        var ctxVisits = document.getElementById('visitsChart').getContext('2d');
        var visitsChart = new Chart(ctxVisits, {
            type: 'line',
            data: {
                labels: {!! json_encode($chartDates) !!},
                datasets: [{
                    label: 'Visites',
                    data: {!! json_encode($chartVisits) !!},
                    borderColor: '#1E9FF2',
                    backgroundColor: 'rgba(30, 159, 242, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { precision: 0 }
                    }
                }
            }
        });

        // Doughnut Chart for Country
        var ctxCountry = document.getElementById('countryChart').getContext('2d');
        var countryChart = new Chart(ctxCountry, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($countryLabels) !!},
                datasets: [{
                    data: {!! json_encode($countryData) !!},
                    backgroundColor: [
                        '#1E9FF2', '#28D094', '#FF4961', '#FF9149', '#666EE8',
                        '#28a745', '#dc3545', '#ffc107', '#17a2b8', '#6c757d'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                    }
                }
            }
        });
    });
</script>
@endsection
