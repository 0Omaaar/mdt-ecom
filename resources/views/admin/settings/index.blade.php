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


@endsection

@php
    use Illuminate\Support\Str;
@endphp

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Settings</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Acceuil</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.settings.index') }}">Paramètres</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Row separator layout section start -->
            <section id="row-separator-form-layouts">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form form-horizontal row-separator" method="POST" action="{{ route('admin.settings.updateInfos') }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="la la-user"></i>Informations Personnelles</h4>
                                                <div class="form-group row mx-auto">
                                                    <label class="col-md-3 label-control" for="projectinput1">Nom Complet</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="projectinput1" class="form-control" value="{{ $admin->name }}" name="name">
                                                    </div>
                                                </div>
                                                <div class="form-group row mx-auto">
                                                    <label class="col-md-3 label-control" for="projectinput2">Email</label>
                                                    <div class="col-md-9">
                                                        <input type="email" id="projectinput2" class="form-control" value="{{ $admin->email }}" name="email">
                                                    </div>
                                                </div>

                                                <div class="form-group row mx-auto">
                                                    <label class="col-md-3 label-control" for="projectinput3">Ancien mot de Passe</label>
                                                    <div class="col-md-9">
                                                        <input type="password" id="projectinput3" class="form-control" placeholder="Votre Ancien mot de passe" name="old_password">
                                                    </div>
                                                </div>

                                                <div class="form-group row mx-auto last">
                                                    <label class="col-md-3 label-control" for="projectinput4">Nouveau mot de Passe</label>
                                                    <div class="col-md-9">
                                                        <input type="password" id="projectinput4" class="form-control" placeholder="Votre Nouveau mot de passe" name="new_password">
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-primary" style="margin-left: 45%;">
                                                    <i class="la la-check"></i> Save
                                                </button>
                                        </div>

                                    </form>


                                    <form class="form form-horizontal row-separator mt-2" method="POST" action="{{ route('admin.settings.updateEmailNotifs') }}">
                                        @csrf
                                        @method('POST')
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="la la-user"></i>Adresse email pour recevoir les notifications</h4>
                                                <div class="form-group row mx-auto">
                                                    <label class="col-md-3 label-control" for="projectinput1">Email</label>
                                                    <div class="col-md-9">
                                                        <input type="email" id="projectinput1" class="form-control" value="{{ $emailNotifications->content }}" name="content">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary" style="margin-left: 45%;">
                                                    <i class="la la-check"></i> Save
                                                </button>
                                        </div>

                                    </form>
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

    <script src="{{ asset('assets/admin/js/scripts/pages/dashboard-ecommerce.js') }}"></script>
    <!-- END: Page JS-->
@endsection
