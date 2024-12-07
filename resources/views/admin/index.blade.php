@extends('admin.base')

@section('head')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/vendors/css/weather-icons/climacons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/fonts/meteocons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/vendors/css/charts/morris.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/vendors/css/charts/chartist.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/admin/vendors/css/charts/chartist-plugin-tooltip.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/components.css') }}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/admin/css/core/menu/menu-types/vertical-menu-modern.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/fonts/simple-line-icons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/pages/timeline.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/pages/dashboard-ecommerce.css') }}">
    <!-- END: Page CSS-->



    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/assets/css/style.css') }}">
    <!-- END: Custom CSS-->

    <style>
        .order-tr{
            cursor: pointer;
        }
    </style>

@endsection

@php
    use Illuminate\Support\Str;
@endphp

@section('content')
    <!-- BEGIN: Content-->
                <div class="app-content content">
                    <div class="content-overlay"></div>
                    <div class="content-wrapper">
                        <div class="content-header row">
                        </div>
                        <div class="content-body">
                            <p style="color: #1E9FF2; margin-left: 5px; font-size: 20px; font-weight: bold;">Statistiques Produits</p>

                            <!-- eCommerce statistic -->
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12">
                                    <div class="card pull-up">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="media d-flex">
                                                    <div class="media-body text-left">
                                                        <h3 class="info">{{ $totalProducts }}</h3>
                                                        <h6>Total Produits</h6>
                                                    </div>
                                                    <div>
                                                        <i class="icon-basket-loaded info font-large-2 float-right"></i>
                                                    </div>
                                                </div>
                                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                                    <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: {{ $totalProducts }}%"
                                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
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
                                                        <h3 class="warning">{{ $totalProductsOutStock }}</h3>
                                                        <h6>Total Produits En Rupture</h6>
                                                    </div>
                                                    <div>
                                                        <i class="icon-pie-chart warning font-large-2 float-right"></i>
                                                    </div>
                                                </div>
                                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                                    <div class="progress-bar bg-gradient-x-warning" role="progressbar"
                                                        style="width: {{ $totalProductsOutStock }}%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
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
                                                        <h3 class="success">{{ $totalProductsInStock }}</h3>
                                                        <h6>Total Produits En Stock</h6>
                                                    </div>
                                                    <div>
                                                        <i class="icon-pie-chart success font-large-2 float-right"></i>
                                                    </div>
                                                </div>
                                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                                    <div class="progress-bar bg-gradient-x-success" role="progressbar"
                                                        style="width: {{ $totalProductsInStock }}%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
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
                                                        <h3 class="danger">{{ $totalProductsLowStock }}</h3>
                                                        <h6>Total Produits Avec Stock Faible</h6>
                                                    </div>
                                                    <div>
                                                        <i class="icon-bell danger font-large-2 float-right"></i>
                                                    </div>
                                                </div>
                                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                                    <div class="progress-bar bg-gradient-x-danger" role="progressbar"
                                                        style="width: {{ $totalProductsLowStock }}%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p style="color: #1E9FF2; margin-left: 5px; font-size: 20px; font-weight: bold; padding: 10px 0;">Statistiques Commandes</p>
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12">
                                    <div class="card pull-up">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="media d-flex">
                                                    <div class="media-body text-left">
                                                        <h3 class="info">{{ $totalOrders }}</h3>
                                                        <h6>Total Commandes</h6>
                                                    </div>
                                                    <div>
                                                        <i class="icon-basket-loaded info font-large-2 float-right"></i>
                                                    </div>
                                                </div>
                                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                                    <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: {{ $totalOrders }}%"
                                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
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
                                                        <h3 class="warning">{{ $totalOrdersEnAttente }}</h3>
                                                        <h6>Total Commandes En Attente</h6>
                                                    </div>
                                                    <div>
                                                        <i class="icon-hourglass warning font-large-2 float-right"></i>
                                                    </div>
                                                </div>
                                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                                    <div class="progress-bar bg-gradient-x-warning" role="progressbar"
                                                        style="width: {{ $totalOrdersEnAttente }}%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
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
                                                        <h3 class="success">{{ $totalOrdersValidee }}</h3>
                                                        <h6>Total Commandes Validées</h6>
                                                    </div>
                                                    <div>
                                                        <i class="icon-check success font-large-2 float-right"></i>
                                                    </div>
                                                </div>
                                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                                    <div class="progress-bar bg-gradient-x-success" role="progressbar"
                                                        style="width: {{ $totalOrdersValidee }}%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
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
                                                        <h3 class="danger">{{ $totalOrdersAnnulee }}</h3>
                                                        <h6>Total Commandes Annulées</h6>
                                                    </div>
                                                    <div>
                                                        <i class="icon-trash danger font-large-2 float-right"></i>
                                                    </div>
                                                </div>
                                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                                    <div class="progress-bar bg-gradient-x-danger" role="progressbar"
                                                        style="width: {{ $totalOrdersAnnulee }}%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--/ eCommerce statistic -->

                            <!-- Products sell and New Orders -->
                            <div class="row match-height">
                                <div class="col-xl-8 col-12" id="ecommerceChartView">
                                    <div class="card card-shadow">
                                        <div class="card-header card-header-transparent py-20">
                                            <div class="btn-group dropdown">
                                                <a href="#" class="text-body dropdown-toggle blue-grey-700"
                                                    data-toggle="dropdown">PRODUCTS SALES</a>
                                                <div class="dropdown-menu animate" role="menu">
                                                    <a class="dropdown-item" href="#" role="menuitem">Sales</a>
                                                    <a class="dropdown-item" href="#" role="menuitem">Total sales</a>
                                                    <a class="dropdown-item" href="#" role="menuitem">profit</a>
                                                </div>
                                            </div>
                                            <ul class="nav nav-pills nav-pills-rounded chart-action float-right btn-group"
                                                role="group">
                                                <li class="nav-item"><a class="active nav-link" data-toggle="tab"
                                                        href="#scoreLineToDay">Day</a></li>
                                                <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                        href="#scoreLineToWeek">Week</a></li>
                                                <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                        href="#scoreLineToMonth">Month</a></li>
                                            </ul>
                                        </div>
                                        <div class="widget-content tab-content bg-white p-20">
                                            <div class="ct-chart tab-pane active scoreLineShadow" id="scoreLineToDay"></div>
                                            <div class="ct-chart tab-pane scoreLineShadow" id="scoreLineToWeek"></div>
                                            <div class="ct-chart tab-pane scoreLineShadow" id="scoreLineToMonth"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Produits par Taux de Commandes</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                </div>
                                <div class="card-content">
                                    <div id="new-orders" class="media-list position-relative">
                                        <div class="table-responsive">
                                            <table id="new-orders-table" class="table table-hover table-xl mb-0">
                                                <thead>
                                                    <tr>
                                                        <th class="border-top-0">Produit</th>
                                                        <th class="border-top-0">Commandes</th>
                                                        <th class="border-top-0">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($mostOrderedProducts->take(6) as $product)
                                                        <tr>
                                                            <td class="text-truncate"><a style="color: rgb(57, 120, 214); font-weight: bold"
                                                                 href="{{ route('admin.products.show', $product->id) }}">{{ Str::limit($product->name, 12, '...') }}</a></td>
                                                            <td class="text-truncate" align="center">{{ $product->order_count }}</td>
                                                            <td class="text-truncate">{{ $product->total_quantity * $product->price }}</td>
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
                <!--/ Products sell and New Orders -->

                <!-- Recent Transactions -->
                <div class="row">
                    <div id="recent-transactions" class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Commandes Récentes</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right"
                                                href="{{ route('admin.orders.index') }}">Voir Plus de Détails</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table id="recent-orders" class="table table-hover table-xl mb-0">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Statut</th>
                                                <th class="border-top-0">Payment</th>
                                                <th class="border-top-0">IdCommande</th>
                                                <th class="border-top-0">Nom Client</th>
                                                <th class="border-top-0">Produits</th>
                                                <th class="border-top-0">Type Livraison</th>
                                                <th class="border-top-0">Total</th>
                                                <th class="border-top-0">D/H Commande</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr class="order-tr" onclick="window.location.href='{{ route('admin.orders.show', $order->id) }}'">
                                                    <td>
                                                        <span class="badge badge-{{ $order->status == 'validée' ? 'success' : ($order->status == 'annulée' ? 'danger' : 'warning') }}"
                                                            style="text-transform: uppercase;"
                                                            >{{ $order->status }}</span>
                                                    </td>
                                                    <td class="text-truncate"><i class="la la-dot-circle-o
                                                        {{ $order->payment_status == 'payé' ? 'success' : ($order->payment_status == 'non payé' ? 'danger' : 'warning') }}
                                                        font-medium-1 mr-1">
                                                    </i>{{ $order->payment_status }}
                                                    </td>
                                                    <td class="text-truncate">{{ $order->id }}</td>
                                                    <td class="text-truncate">
                                                        <span>{{ $order->nom }}  </span>
                                                    </td>
                                                    <td class="text-truncate p-1">
                                                        <ul class="list-unstyled users-list m-0">
                                                            @foreach ($order->items as $item)
                                                                <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                                data-original-title="{{ $item->product->sku }}"
                                                                class="avatar avatar-sm pull-up">
                                                                    <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius"
                                                                        src="{{ asset('images/products/' . $item->product_id . '/' . $item->product->image) }}"
                                                                        alt="Produit ">
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-sm btn-outline-danger round" style="text-transform: uppercase">{{ $order->shipping_method }}</button>
                                                    </td>
                                                    <td class="text-truncate">{{ $order->total_price }} DHS</td>
                                                    <td class="text-truncate">{{ $order->created_at }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Recent Transactions -->

                <!--Recent Orders & Monthly Sales -->
                <div class="row match-height">
                    <div class="col-xl-8 col-lg-12">
                        <div class="card">
                            <div class="card-content ">
                                <div id="cost-revenue" class="height-250 position-relative"></div>
                            </div>
                            <div class="card-footer">
                                <div class="row mt-1">
                                    <div class="col-3 text-center">
                                        <h6 class="text-muted">Total Products</h6>
                                        <h2 class="block font-weight-normal">18.6 k</h2>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-gradient-x-info" role="progressbar"
                                                style="width: 70%" aria-valuenow="70" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-3 text-center">
                                        <h6 class="text-muted">Total Sales</h6>
                                        <h2 class="block font-weight-normal">64.54 M</h2>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-gradient-x-warning" role="progressbar"
                                                style="width: 60%" aria-valuenow="60" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-3 text-center">
                                        <h6 class="text-muted">Total Cost</h6>
                                        <h2 class="block font-weight-normal">24.38 B</h2>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-gradient-x-danger" role="progressbar"
                                                style="width: 40%" aria-valuenow="40" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-3 text-center">
                                        <h6 class="text-muted">Total Revenue</h6>
                                        <h2 class="block font-weight-normal">36.72 M</h2>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-gradient-x-success" role="progressbar"
                                                style="width: 90%" aria-valuenow="90" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body sales-growth-chart">
                                    <div id="monthly-sales" class="height-250"></div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="chart-title mb-1 text-center">
                                    <h6>Total Commandes Par Mois.</h6>
                                </div>
                                <div class="chart-stats text-center">
                                    <a href="{{ route('admin.index') }}" class="btn btn-sm btn-danger box-shadow-2 mr-1">Statistiques <i
                                            class="ft-bar-chart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/Recent Orders & Monthly Sales -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection


@section('script')
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets/admin/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('assets/admin/vendors/js/charts/chartist.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/js/charts/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/js/charts/raphael-min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/js/charts/morris.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/js/timeline/horizontal-timeline.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/admin/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('assets/admin/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script>
        var salesData = @json($monthlySales);
    </script>

    <script src="{{ asset('assets/admin/js/scripts/pages/dashboard-ecommerce.js') }}"></script>
    <!-- END: Page JS-->
@endsection
