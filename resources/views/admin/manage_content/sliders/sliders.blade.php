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
                <h3 class="content-header-title mb-0 d-inline-block">Sliders</h3>
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
            <div class="shopping-cart">
                <ul class="nav nav-tabs nav-justified">
                    <li class="nav-item">
                        <a class="nav-link active" id="shopping-cart" data-toggle="tab" aria-controls="shop-cart-tab" href="#shop-cart-tab" aria-expanded="false">Slider 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="checkout" data-toggle="tab" aria-controls="checkout-tab" href="#checkout-tab" aria-expanded="true">Slider 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="complete-order" data-toggle="tab" aria-controls="comp-order-tab" href="#comp-order-tab" aria-expanded="false">Slider 3</a>
                    </li>
                </ul>
                <div class="tab-content pt-1">
                    <div class="tab-pane active" id="shop-cart-tab" aria-labelledby="shopping-cart">
                        <div class="card">
                            <div class="card-header">
                                Ancien Slider :
                            </div>
                            <div class="card-content">
                                <div class="card-body" style="text-align: center">
                                    <img src="{{ asset('assets/user/images/slider/electronic/img_01.png') }}" width="40%" height="40%">
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header text-center text-white" style="background: rgb(218, 218, 218)">
                                <h4>Nouveau Slider 1</h4>
                            </div>
                            <div class="card-content p-3">
                                <p class="text-muted text-center mb-3">La taille doit être : <strong>516 x 463</strong></p>
                                <form method="POST" enctype="multipart/form-data" action="#" class="text-center">
                                    @csrf
                                    <input type="file" id="slider1" name="slider1" required class="form-control-file mb-3" accept="image/*">
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
                                        et se diriger vers les environ de ligne <strong>75</strong>.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="checkout-tab" aria-expanded="true" role="tablist"  aria-labelledby="checkout">
                        <div class="card">
                            <div class="card-header">
                                Ancien Slider :
                            </div>
                            <div class="card-content">
                                <div class="card-body" style="text-align: center">
                                    <img src="{{ asset('assets/user/images/slider/electronic/img_02.png') }}" width="40%" height="40%">
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header text-center text-white" style="background: rgb(218, 218, 218)">
                                <h4>Nouveau Slider 2</h4>
                            </div>
                            <div class="card-content p-3">
                                <p class="text-muted text-center mb-3">La taille doit être : <strong>516 x 463</strong></p>
                                <form method="POST" enctype="multipart/form-data" action="#" class="text-center">
                                    @csrf
                                    <input type="file" id="slider2" name="slider2" required class="form-control-file mb-3" accept="image/*">
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
                                        et se diriger vers les environ de ligne <strong>90</strong>.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="comp-order-tab" aria-labelledby="complete-order">
                        <div class="card">
                            <div class="card-header">
                                Ancien Slider :
                            </div>
                            <div class="card-content">
                                <div class="card-body" style="text-align: center">
                                    <img src="{{ asset('assets/user/images/slider/electronic/img_03.png') }}" width="40%" height="40%">
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header text-center text-white" style="background: rgb(218, 218, 218)">
                                <h4>Nouveau Slider 3</h4>
                            </div>
                            <div class="card-content p-3">
                                <p class="text-muted text-center mb-3">La taille doit être : <strong>516 x 463</strong></p>
                                <form method="POST" enctype="multipart/form-data" action="#" class="text-center">
                                    @csrf
                                    <input type="file" id="slider3" name="slider3" required class="form-control-file mb-3" accept="image/*">
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
                                        et se diriger vers les environ de ligne <strong>105</strong>.
                                    </p>
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

    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);

        // Slider 1
        const slider1Input  = document.querySelector('#slider1');
        const slider1Pond = FilePond.create(slider1Input);
        slider1Pond.setOptions({
            server: {
                process: '{{ route('slider1.upload') }}',
                revert: '{{ route('slider1.delete') }}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            },
            maxFiles: 1,
        });

        // Slider 2
        const slider2Input  = document.querySelector('#slider2');
        const slider2Pond = FilePond.create(slider2Input);
        slider2Pond.setOptions({
            server: {
                process: '{{ route('slider2.upload') }}',
                revert: '{{ route('slider2.delete') }}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            },
            maxFiles: 1,
        });

        // Slider 3
        const slider3Input  = document.querySelector('#slider3');
        const slider3Pond = FilePond.create(slider3Input);
        slider3Pond.setOptions({
            server: {
                process: '{{ route('slider3.upload') }}',
                revert: '{{ route('slider3.delete') }}',
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
