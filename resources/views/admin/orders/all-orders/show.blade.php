@extends('admin.base')
@section('head')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/vendors/css/forms/selects/select2.min.css') }}">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/admin/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/vendors/css/forms/icheck/custom.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/components.css') }}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/core/menu/menu-types/vertical-menu-modern.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/plugins/extensions/noui-slider.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/core/colors/palette-noui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/pages/ecommerce-shop.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/plugins/forms/checkboxes-radios.css') }}">

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/assets/css/style.css') }}">
    <!-- END: Custom CSS-->

    <style>
        th, td{
            text-align: center;
        }
    </style>

    @php
        use Illuminate\Support\Str;
    @endphp

@endsection
@section('content')

<!-- BEGIN: Content-->

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Commande</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.orders.show', ['id' => $order->id]) }}">Commande</a>
                            </li>
                            <li class="breadcrumb-item active">Détails
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="btn-group float-md-right">
                    <button class="btn btn-info dropdown-toggle mb-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                    <div class="dropdown-menu arrow"><a class="dropdown-item" href="#"><i class="fa fa-calendar-check mr-1"></i> Calender</a><a class="dropdown-item" href="#"><i class="fa fa-cart-plus mr-1"></i> Cart</a><a class="dropdown-item" href="#"><i class="fa fa-life-ring mr-1"></i> Support</a>
                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fa fa-cog mr-1"></i> Settings</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-detached content-right">
            <div class="content-body">
                <div class="product-shop">
                    <div class="card">
                        <div class="card-body">
                            <span class="shop-title">Produits</span>
                            <span class="float-right">
                                <span class="result-text mr-1">{{ $order->items()->count() }} Produits</span>
                            </span>
                        </div>
                    </div>
                    <div class="row match-height">

                        @foreach ($order->items as $item)
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                <div class="card pull-up">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <a href="{{ route('admin.products.show', $item->product_id) }}">
                                                <div class="product-img d-flex align-items-center">
                                                    <img class="img-fluid mb-1" src="{{ asset('images/products/' . $item->product->id . '/' . $item->product->image) }}" alt="Card image cap">
                                                </div>
                                                <h4 class="product-title">{{ Str::limit($item->product->name, 50, '...') }}</h4>
                                                <div class="price-reviews">
                                                    <span class="price-box">
                                                        <span class="price">{{ $item->product->price }} DHS</span>
                                                    </span>
                                                    <span class="ratings float-right">
                                                        Qté Cmd : {{ $item->quantity }}
                                                    </span>
                                                </div>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar-detached sidebar-left">
            <div class="sidebar">
                <div class="sidebar-content d-none d-lg-block sidebar-shop">
                    <div class="card">
                        <div class="card-body">
                            <div class="categories-list">
                                <div class="category-title pb-1">
                                    <h4 class="card-title mb-0">Détails Commande</h4>
                                    <hr>
                                </div>
                                <div class="product-cat" id="categories">
                                    <ul class="treeview">
                                        <li><span>Type Utilisateur</span>
                                            <ul>
                                                <li style="font-weight: bold"><span>{{ $order->user_id ? 'Client' : 'Session' }}</span></li>
                                            </ul>
                                        </li>
                                     </ul>
                                     <ul>
                                        <li>Prix Total : <strong>{{ $order->total_price }} DHS</strong></li>
                                        <li>Statut Commande : <span class="badge" style="text-transform: uppercase;"><strong>{{ $order->status }}</strong></span></li>
                                        <li>Statut Payment : <span class="badge" style="text-transform: uppercase;"><strong>{{ $order->payment_status }}</strong></span></li>
                                        <li>Methode Livraison: <span class="badge" style="text-transform: uppercase;"><strong>{{ $order->shipping_method }}</strong></span></li>
                                        <li>Methode Payment: <span class="badge" style="text-transform: uppercase;"><strong>{{ $order->payment_method }}</strong></span></li>
                                        <li>Note: <span><strong>{{ $order->note }}</strong></span></li>
                                     </ul>
                                </div>
                            </div>
                            <!-- /Categories List -->

                            <!-- Featured Image -->
                            <div class="featured">
                                <div class="category-title mt-3 pb-1">
                                    <h4 class="card-title mb-0">Détails Facturation</h4>
                                    <hr>
                                </div>
                                <div class="featured-image bg-success bg-lighten-2">
                                     <ul>
                                        <li>Prenom : <span><strong>{{ $order->prenom }}</strong></span></li>
                                        <li>Nom : <span><strong>{{ $order->nom }}</strong></span></li>
                                        <li>Adresse : <span><strong>{{ $order->adresse }}</strong></span></li>
                                        <li>Ville : <span><strong>{{ $order->ville }}</strong></span></li>
                                        <li>CIN : <span><strong>{{ $order->cin }}</strong></span></li>
                                        <li>Telephone : <span><strong>{{ $order->phone }}</strong></span></li>
                                        <li>Email : <span><strong>{{ $order->email }}</strong></span></li>
                                     </ul>
                                </div>
                            </div>
                            <!-- /Featured Image -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>



@endsection

@section('script')
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets/admin/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->


    <!-- BEGIN: Page Vendor JS-->

    <script src="{{ asset('assets/admin/vendors/js/ui/prism.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/js/extensions/jquery.raty.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/js/extensions/jquery.cookie.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/js/extensions/jquery.treeview.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/js/extensions/wNumb.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/js/extensions/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/js/forms/icheck/icheck.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/admin/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('assets/admin/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->


    <script src="{{ asset('assets/admin/js/scripts/pages/content-panel-sidebar.js') }}"></script>
    <script src="{{ asset('assets/admin/js/scripts/pages/ecommerce-product-shop.js') }}"></script>
@endsection