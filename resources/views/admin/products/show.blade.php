
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



@endsection


@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <section id="justified-tabs-with-icons">
                <div class="row">
                    <div class="col-12 mt-1">
                        <a href="{{ route('admin.products.index') }}">Liste des produuits</a> | <a href="{{ route('admin.products.create') }}">Ajouter produit</a>
                        <hr>
                    </div>
                </div>

                <div class="row match-height">

                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Détails sur le Produit <b>{{ $product->name }}</b> avec le SKU <b>{{ $product->sku }}</b></h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <ul class="nav nav-tabs nav-top-border no-hover-bg nav-justified">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="activeIcon1-tab1" data-toggle="tab" href="#activeIcon1" aria-controls="activeIcon1" aria-expanded="true"><i class="ft-link mr-1"></i>Produit</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="linkIcon1-tab1" data-toggle="tab" href="#linkIcon1" aria-controls="linkIcon1" aria-expanded="false"><i class="ft-image mr-1"></i>Images</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content px-1 pt-1">

                                        {{-- First Tab --}}
                                        <div role="tabpanel" class="tab-pane active" id="activeIcon1" aria-labelledby="activeIcon1-tab1" aria-expanded="true">

                                            <section id="row-separator-form-layouts">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-content collapse show">
                                                                <div class="card-body">
                                                                    <form class="form form-horizontal row-separator">
                                                                        <div class="form-body">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group row">
                                                                                        <label class="col-md-3 label-control" for="name">Nom du produit</label>
                                                                                        <div class="col-md-9">
                                                                                            <input type="text" id="name" class="form-control" placeholder="Nom" value="{{ $product->name }}" name="name" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group row">
                                                                                        <label class="col-md-3 label-control" for="brief_description">Brève description</label>
                                                                                        <div class="col-md-9">
                                                                                            <input type="text" id="brief_description" class="form-control" placeholder="Brève description" disabled value="{{ $product->brief_description }}" name="brief_description">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group row">
                                                                                        <label class="col-md-3 label-control" for="description">Description</label>
                                                                                        <div class="col-md-9">
                                                                                            <textarea id="description" class="form-control" placeholder="Description" name="description" rows="3" disabled>{{ $product->description }}</textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group row">
                                                                                        <label class="col-md-3 label-control" for="price">Prix</label>
                                                                                        <div class="col-md-9">
                                                                                            <input type="number" step="0.01" id="price" class="form-control" placeholder="Prix" name="price" disabled value="{{ $product->price }}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <label class="col-md-3 label-control" for="old_price">Ancien prix</label>
                                                                                        <div class="col-md-9">
                                                                                            <input type="number" step="0.01" id="old_price" class="form-control" placeholder="Ancien prix" name="old_price" disabled value="{{ $product->old_price }}">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group row">
                                                                                        <label class="col-md-3 label-control" for="sku">SKU</label>
                                                                                        <div class="col-md-9">
                                                                                            <input type="text" id="sku" class="form-control" placeholder="SKU" name="sku" disabled value="{{ $product->sku }}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <label class="col-md-3 label-control" for="stock_status">État du stock</label>
                                                                                        <div class="col-md-9">
                                                                                            <select id="stock_status" class="form-control" name="stock_status" disabled>
                                                                                                <option>{{ $product->stock_status == 'instock' ? 'En stock' : 'Rupture de Stock' }}</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group row">
                                                                                        <label class="col-md-3 label-control" for="quantity">Quantité</label>
                                                                                        <div class="col-md-9">
                                                                                            <input type="number" id="quantity" class="form-control" placeholder="Quantité" name="quantity" disabled value="{{ $product->quantity }}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <label class="col-md-3 label-control" for="subcategory_id">Sous-catégorie</label>
                                                                                        <div class="col-md-9">
                                                                                            <select id="subcategory_id" class="form-control" name="subcategory_id" disabled>
                                                                                                <option>{{ $product->subcategory->name }}</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>



                                        {{-- Second Tab --}}
                                        <div class="tab-pane" id="linkIcon1" role="tabpanel" aria-labelledby="linkIcon1-tab1" aria-expanded="false">
                                            <p>Chocolate bar gummies sesame snaps. Liquorice cake sesame snaps cotton candy cake sweet brownie.
                                                Cotton candy candy canes brownie. Biscuit pudding sesame snaps pudding pudding sesame snaps biscuit
                                                tiramisu.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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

@endsection
