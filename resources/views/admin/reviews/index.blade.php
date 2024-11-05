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
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Liste des Avis</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Accueil</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.reviews.index') }}">Avis</a>
                                </li>
                                <li class="breadcrumb-item active">Gestion
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right">
                        <button class="btn btn-info dropdown-toggle mb-1" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Action</button>
                        <div class="dropdown-menu arrow"><a class="dropdown-item" href="#"><i
                                    class="fa fa-calendar-check mr-1"></i> Calender</a><a class="dropdown-item"
                                href="#"><i class="fa fa-cart-plus mr-1"></i> Cart</a><a class="dropdown-item"
                                href="#"><i class="fa fa-life-ring mr-1"></i> Support</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i
                                    class="fa fa-cog mr-1"></i> Settings</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-head">
                                <div class="card-header">
                                    <h4 class="card-title">Avis</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <span class="dropdown">
                                            <button id="btnSearchDrop1" type="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="true"
                                                class="btn btn-warning btn-sm dropdown-toggle dropdown-menu-right"><i
                                                    class="ft-download-cloud white"></i></button>
                                            <span aria-labelledby="btnSearchDrop1"
                                                class="dropdown-menu mt-1 dropdown-menu-right">
                                                <a href="#" class="dropdown-item"><i class="la la-calendar"></i>
                                                    Due
                                                    Date</a>
                                                <a href="#" class="dropdown-item"><i class="la la-random"></i>
                                                    Priority </a>
                                                <a href="#" class="dropdown-item"><i class="la la-bar-chart"></i>
                                                    Balance Due</a>
                                                <a href="#" class="dropdown-item"><i class="la la-user"></i> Assign
                                                    to</a>
                                            </span>
                                        </span>
                                        <button class="btn btn-success btn-sm"><i class="ft-settings white"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="invoices-list"
                                            class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                            <thead>
                                                <tr>
                                                    <th>N</th>
                                                    <th>Produit</th>
                                                    <th>Nom</th>
                                                    <th>Email</th>
                                                    <th>Sujet</th>
                                                    <th>Statut</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($reviews as $review)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td style="cursor: pointer" onclick="window.location.href='{{ route('admin.products.show', $review->product->id) }}'">
                                                            @if($review->product->image != null)
                                                            <img src="{{ asset('images/products/' . $review->product->id . '/' . $review->product->image) }}"
                                                            style="border-radius: 4%"
                                                            alt="{{ $review->product->name }}" width="50" height="50">
                                                            @else
                                                                <span style="color: rgb(234, 109, 109)">Aucune image</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $review->name }}</td>
                                                        <td>{{ $review->email }}</td>
                                                        <td>{{ $review->subject }}</td>
                                                        <td><span class="badge badge-lg badge-{{ $review->status == 'Non Traité' ? 'danger' : 'success' }}">{{ $review->status }}</span></td>
                                                        <td>
                                                            <span class="dropdown">
                                                                <button id="btnSearchDrop2" type="button"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="true"
                                                                    class="btn btn-primary dropdown-toggle dropdown-menu-right"><i
                                                                        class="ft-settings"></i></button>
                                                                <span aria-labelledby="btnSearchDrop2"
                                                                    class="dropdown-menu mt-1 dropdown-menu-right">
                                                                    <button data-toggle="modal" data-target="#viewMessage{{ $review->id }}" class="dropdown-item"><i
                                                                        class="la la-eye"></i> Voir Message</button>
                                                                    <a href="{{ route('admin.products.show', $review->product->id) }}" class="dropdown-item"><i
                                                                                class="la la-tag"></i> Voir Produit</a>
                                                                    <button data-toggle="modal" data-target="#deleteReview{{ $review->id }}" class="dropdown-item"><i
                                                                            class="la la-trash"></i> Supprimer</button>
                                                                </span>
                                                            </span>
                                                        </td>

                                                        {{-- Delete Review Modal --}}
                                                        @include('admin.reviews.delete')

                                                        {{-- Show Review Modal --}}
                                                        @include('admin.reviews.show-message')
                                                    </tr>
                                                @endforeach

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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
