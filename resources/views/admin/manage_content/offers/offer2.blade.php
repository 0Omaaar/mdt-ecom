@extends('admin.base')
@section('head')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/vendors/css/vendors.min.css') }}">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/admin/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/vendors/css/forms/icheck/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css') }}">
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
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/pages/ecommerce-cart.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/plugins/animate/animate.css') }}">

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/assets/css/style.css') }}">
    <!-- END: Custom CSS-->

     {{-- File Upload  --}}
     <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
     <link
     href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
     rel="stylesheet"
     />
@endsection
@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Offres</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.content.index') }}">Gestion de Contenu</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
             <div>
                <div class="card">
                    <div class="card-header">
                        Ancienne Offre 2 :
                    </div>
                    <div class="card-content">
                        <div class="card-body" style="text-align: center">
                            <img src="{{ asset('assets/user/images/offer/electronic/img_03.jpg') }}" width="40%" height="40%">
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header text-center text-white" style="background: rgb(218, 218, 218)">
                        <h4>Nouvelle Offre 2</h4>
                    </div>
                    <div class="card-content p-3">
                        <p class="text-muted text-center mb-3">La taille doit être : <strong>403 x 193</strong></p>
                        <form method="POST" enctype="multipart/form-data" action="#" class="text-center">
                            @csrf
                            <input type="file" id="offre2" name="offre2" required class="form-control-file mb-3" accept="image/*">
                        </form>
                    </div>
                </div>

                <div class="card" style="border-radius: 10px; border: 1px solid #e0e0e0; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                    <div class="card-header" style="background-color: #f5f5f5; padding: 15px; border-bottom: 1px solid #e0e0e0;">
                        <h5 style="margin: 0; color: #333;">Accès aux Détails</h5>
                    </div>
                    <div class="card-content" style="padding: 20px;">
                        <div class="card-body">
                            <p style="color: #555; line-height: 1.6;">
                                Pour accéder au titre et à la description, veuillez vous diriger avec ce chemin :
                                <code style="background-color: #f0f0f0; padding: 2px 4px; border-radius: 3px;">ressources/views/user/home.blade.php</code>
                                et se diriger vers les environ de ligne <strong>126</strong>.
                            </p>
                        </div>
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>

@endsection


@section('script')

    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);

        // Offre2
        const offre2Input  = document.querySelector('#offre2');
        const offre2Pond = FilePond.create(offre2Input);
        offre2Pond.setOptions({
            server: {
                process: '{{ route('offre2.upload') }}',
                revert: '{{ route('offre2.delete') }}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            },
            maxFiles: 1,
        });


    </script>



    <script src="{{ asset('assets/admin/js/resizer.js') }}"></script>
    <script>
      imageMapResize();
    </script>

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets/admin/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->

    <script src="{{ asset('assets/admin/vendors/js/forms/icheck/icheck.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/admin/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('assets/admin/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <script src="{{ asset('assets/admin/js/scripts/pages/ecommerce-cart.js')}}"></script>



@endsection
