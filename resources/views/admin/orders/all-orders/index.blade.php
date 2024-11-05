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

    <style>
        th, td{
            text-align: center;
        }
    </style>
@endsection
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Toutes les Commandes</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Accueil</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}">Commandes</a>
                                </li>
                                <li class="breadcrumb-item active">Gestion
                                </li>
                            </ol>
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
                                    <h4 class="card-title">Commandes</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                    <div class="heading-elements">

                                    
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
                                                    <th>ID Commande</th>
                                                    <th>Statut</th>
                                                    <th>Payment</th>
                                                    <th>Client</th>
                                                    <th>Type Livraison</th>
                                                    <th>Nombre Produits</th>
                                                    <th>Date Commande</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $order)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $order->id }}</td>
                                                        <td style="text-transform: uppercase; font-weight: bolder;"
                                                            class="badge badge-{{ $order->status == 'validée' ? 'success' : ($order->status == 'en attente' ? '' : 'danger') }} mt-1"
                                                            >{{ $order->status }}</td>
                                                        <td style="text-transform: uppercase; font-weight: bolder;
                                                            color: {{ $order->payment_status == 'payé' ? '#28a745' :
                                                                    ($order->payment_status == 'non payé' ? '#dc3545' :
                                                                    ($order->payment_status == 'en attente' ? '#ffc107' : '#6c757d')) }}">
                                                            {{ $order->payment_status }}
                                                        </td>
                                                        <td>{{ $order->nom }}</td>
                                                        <td style="text-transform: uppercase;">{{ $order->shipping_method }}</td>
                                                        <td>{{ $order->items()->count() }}</td>
                                                        <td>{{ $order->created_at->diffForHumans() }}</td>
                                                         <td>
                                                            <span class="dropdown">
                                                                <button id="btnSearchDrop2" type="button"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="true"
                                                                         class="btn btn-primary dropdown-toggle dropdown-menu-right"><i
                                                                        class="ft-settings"></i></button>
                                                                <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                                    @if ($order->status != 'validée')
                                                                        <a class="dropdown-item" href="{{ route('admin.orders.validate', $order->id) }}">
                                                                            <i class="la la-check-circle text-success"></i> Valider La Commande
                                                                        </a>
                                                                    @endif
                                                                    @if ($order->status != 'annulée')
                                                                        <a href="{{ route('admin.orders.cancel', $order->id) }}" class="dropdown-item">
                                                                            <i class="la la-times-circle text-danger"></i> Annuler La Commande
                                                                        </a>
                                                                    @endif
                                                                    @if ($order->payment_status != 'payé')
                                                                        <a href="{{ route('admin.payments.validate', $order->id) }}" class="dropdown-item">
                                                                            <i class="la la-money text-success"></i> Valider Payment
                                                                        </a>
                                                                    @endif
                                                                    @if ($order->payment_status != 'non payé')
                                                                        <a href="{{ route('admin.payments.cancel', $order->id) }}" class="dropdown-item">
                                                                            <i class="la la-ban text-warning"></i> Annuler Payment
                                                                        </a>
                                                                    @endif
                                                                    @if ($order->payment_status != 'remboursé')
                                                                        <a href="{{ route('admin.payments.rembourser', $order->id) }}" class="dropdown-item">
                                                                            <i class="la la-undo text-info"></i> Rembourser Payment
                                                                        </a>
                                                                    @endif
                                                                    <a href="{{ route('admin.orders.show', ['id' => $order->id]) }}" class="dropdown-item">
                                                                        <i class="la la-eye text-primary"></i> Voir la Commande
                                                                    </a>
                                                                    <button data-toggle="modal" data-target="#delete{{ $order->id }}" class="dropdown-item">
                                                                        <i class="la la-trash text-danger"></i> Supprimer
                                                                    </button>
                                                                </span>

                                                            </span>
                                                        </td>

                                                        {{-- Delete Order Modal --}}
                                                        @include('admin.orders.all-orders.delete')
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
