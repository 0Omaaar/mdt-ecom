
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
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/admin/css/core/menu/menu-types/vertical-menu-modern.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/pages/invoice.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/plugins/animate/animate.css') }}">

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/assets/css/style.css') }}">
    <!-- END: Custom CSS-->

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/pages/ecommerce-shop.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/plugins/forms/checkboxes-radios.css') }}">




@endsection


@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Détails Produit</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Liste des Produits</a>
                            </li>
                            <li class="breadcrumb-item active">Details Produit
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
        <div class="content-body">
            <div class="product-detail">
                <div class="card">
                    <div class="card-body">
                        <div class="card-content">
                            <div class="row">
                                <div class="col-sm-4 col-12">
                                    <div class="product-img d-flex align-items-center">
                                        <div class="badge badge-success round">
                                            -50%
                                        </div>
                                        <img alt="Card image cap" class="img-fluid mb-1" src="{{ asset('images/products/' . $product->id . '/' . $product->image) }}">
                                    </div>
                                </div>
                                <div class="col-sm-8 col-12">
                                    <div class="title-area clearfix">
                                        <h2 class="product-title float-left">
                                            {{ $product->name }}
                                        </h2>
                                        <span class="ratings float-right">
                                        </span>
                                    </div>
                                    <div class="price-reviews clearfix">
                                        <span class="price-box">
                                            <span class="price h4">
                                                {{ $product->price }} DHS
                                            </span>
                                            <span class="old-price h4">
                                                {{ $product->old_price }} DHS
                                            </span>
                                        </span>
                                        <span class="float-right">
                                            QTE : <span class="badge badge-lg">{{ $product->quantity }}</span>
                                        </span>
                                    </div>
                                    <!-- Product Information -->
                                    <div class="product-info">
                                        <p>
                                            {{ $product->brief_description }}
                                        </p>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <ul class="product-tabs nav nav-tabs nav-underline no-hover-bg">
                                    <li class="nav-item">
                                        <a aria-controls="desc" aria-expanded="true" class="nav-link active" data-toggle="tab" href="#desc" id="description">
                                            Description
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a aria-controls="images" aria-expanded="false" class="nav-link" data-toggle="tab" href="#images" id="review">
                                            Images
                                        </a>
                                    </li>

                                </ul>
                                <div class="product-content tab-content px-1 pt-1">
                                    <div aria-expanded="true" aria-labelledby="description" class="tab-pane active" id="desc" role="tabpanel">
                                        <p>
                                            {{ $product->description }}
                                        </p>
                                        <br>
                                    </div>
                                    <div aria-labelledby="review" class="tab-pane" id="images">
                                        <div class="row">
                                            @foreach ($product->images as $image)
                                                <div class="col-sm-4 col-4">
                                                    <div class="product-img d-flex align-items-center ml-2">
                                                        <img alt="Card image cap" class="img-fluid mb-1" src="{{ asset('images/products/' . $product->id . '/' . $image->path) }}">
                                                    </div>
                                                </div>
                                            @endforeach
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
</div>

@endsection
@section('script')


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets/admin/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <script src="{{ asset('assets/admin/vendors/js/forms/select/select2.full.min.js') }}"></script>

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('assets/admin/vendors/js/tables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/js/tables/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/js/forms/icheck/icheck.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/admin/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('assets/admin/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('assets/admin/js/scripts/pages/invoices-list.js') }}"></script>
    <!-- END: Page JS-->

    <script src="{{ asset('assets/admin/js/scripts/forms/select/form-select2.js') }}"></script>
    <script src="{{ asset('assets/admin/js/scripts/modal/components-modal.js') }}"></script>

    <script src="{{ asset('assets/admin/js/scripts/pages/ecommerce-product-details.js') }}"></script>


@endsection
