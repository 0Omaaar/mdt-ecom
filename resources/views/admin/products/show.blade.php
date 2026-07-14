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

    @include('admin.products._styles')

    <style>
        .product-detail-card .product-img{ position:relative; border-radius:12px; overflow:hidden; background:var(--p-bg-soft); padding:10px; }
        .product-detail-card .product-img img{ border-radius:10px; }
        .product-detail-card .badge.round{ position:absolute; top:14px; right:14px; z-index:2; border-radius:20px; padding:.4em .9em; font-weight:700; font-size:.72rem; text-transform:uppercase; }
        .price-box .price{ color: var(--p-primary-dark); font-weight:800; }
        .price-box .old-price{ color:#adb5bd; text-decoration: line-through; margin-left:.5rem; font-weight:500; }
        .product-tabs.nav-tabs .nav-link{ border-radius: 10px 10px 0 0; font-weight:600; color:#6c757d; }
        .product-tabs.nav-tabs .nav-link.active{ color: var(--p-primary-dark); border-bottom: 3px solid var(--p-primary); background: transparent; }
        .gallery-thumb{ border-radius: 10px; box-shadow: 0 4px 14px rgba(0,0,0,.08); }
    </style>
@endsection


@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 page-heading">
                        <span class="icon-wrap"><i class="la la-eye"></i></span> Détails Produit
                    </h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Liste des Produits</a></li>
                                <li class="breadcrumb-item active">Details Produit</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12 mb-2 text-right">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-warning btn-sm">
                        <i class="la la-arrow-left"></i> Retour
                    </a>
                    <button type="button" class="btn btn-primary btn-sm js-open-edit-modal-standalone"
                        data-edit-url="{{ route('admin.products.edit', $product->id) }}">
                        <i class="la la-pencil"></i> Modifier
                    </button>
                </div>
            </div>

            <div class="content-body">
                <div class="product-detail">
                    <div class="card product-detail-card">
                        <div class="card-body">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-sm-4 col-12">
                                        <div class="product-img d-flex align-items-center justify-content-center">
                                            <div class="badge {{ $product->stock_status == 'instock' ? 'badge-soft-success' : 'badge-soft-danger' }} round">
                                                {{ $product->stock_status == 'instock' ? 'En stock' : 'Rupture de stock' }}
                                            </div>
                                            @if ($product->dolibarr_id != null)
                                                <img alt="{{ $product->name }}" class="img-fluid mb-1"
                                                    src="{{ asset('productsDolibarr/' . $product->dolibarr_id . '/' . $product->image) }}">
                                            @else
                                                <img alt="{{ $product->name }}" class="img-fluid mb-1"
                                                    src="{{ asset('images/products/' . $product->id . '/' . $product->image) }}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-8 col-12">
                                        <div class="title-area clearfix d-flex align-items-center justify-content-between flex-wrap">
                                            <h2 class="product-title mb-0">{{ $product->name }}</h2>
                                            <span class="badge badge-soft-dark">SKU: {{ $product->sku }}</span>
                                        </div>

                                        <div class="price-reviews clearfix mt-2 d-flex align-items-center justify-content-between flex-wrap">
                                            <span class="price-box">
                                                <span class="price h4">{{ $product->price }} DHS</span>
                                                @if ($product->old_price)
                                                    <span class="old-price h5">{{ $product->old_price }} DHS</span>
                                                @endif
                                            </span>
                                            <span>
                                                QTE : <span class="badge badge-soft-primary">{{ $product->quantity }}</span>
                                            </span>
                                        </div>

                                        <div class="d-flex flex-wrap mt-2" style="gap:.5rem;">
                                            <span class="badge badge-soft-dark">
                                                <i class="la la-th-large"></i> {{ $product->category->name ?? '—' }}
                                            </span>
                                            @if ($product->subcategory)
                                                <span class="badge badge-soft-dark">
                                                    <i class="la la-sitemap"></i> {{ $product->subcategory->name }}
                                                </span>
                                            @endif
                                            @if ($product->brand)
                                                <span class="badge badge-soft-primary">
                                                    <i class="la la-tag"></i> {{ $product->brand->name }}
                                                </span>
                                            @endif
                                            @if ($product->selection)
                                                <span class="badge badge-soft-warning">Notre sélection</span>
                                            @endif
                                            @if ($product->dayDeals)
                                                <span class="badge badge-soft-warning">Deal Du Jour</span>
                                            @endif
                                            @if ($product->top_ventes)
                                                <span class="badge badge-soft-warning">Top Ventes</span>
                                            @endif
                                            @if ($product->nouveautes)
                                                <span class="badge badge-soft-warning">Nouveautés</span>
                                            @endif
                                            @if ($product->best_price)
                                                <span class="badge badge-soft-warning">Meilleur Prix</span>
                                            @endif
                                        </div>

                                        <div class="product-info mt-3">
                                            <p class="mb-0">{!! html_entity_decode($product->brief_description) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-0">
                            <div class="card-content">
                                <div class="card-body">
                                    <ul class="product-tabs nav nav-tabs nav-underline no-hover-bg">
                                        <li class="nav-item">
                                            <a aria-controls="desc" aria-expanded="true" class="nav-link active"
                                                data-toggle="tab" href="#desc" id="description">
                                                <i class="la la-align-left"></i> Description
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a aria-controls="images" aria-expanded="false" class="nav-link"
                                                data-toggle="tab" href="#images" id="review">
                                                <i class="la la-images"></i> Images
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="product-content tab-content px-1 pt-1">
                                        <div aria-expanded="true" aria-labelledby="description" class="tab-pane active"
                                            id="desc" role="tabpanel">
                                            <p class="mb-0">{!! html_entity_decode($product->description) !!}</p>
                                        </div>
                                        <div aria-labelledby="review" class="tab-pane" id="images">
                                            <div class="row">
                                                @if ($product->dolibarr_id != null && $filesPath)
                                                    @foreach ($filesPath as $imagePath)
                                                        <div class="col-sm-4 col-4 mb-2">
                                                            <div class="product-img d-flex align-items-center">
                                                                <img alt="Image produit" class="img-fluid mb-1 gallery-thumb"
                                                                    src="{{ asset($imagePath) }}">
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @elseif ($product->images->count() > 0)
                                                    @foreach ($product->images as $img)
                                                        <div class="col-sm-4 col-4 mb-2">
                                                            <div class="product-img d-flex align-items-center">
                                                                <img alt="Image produit" class="img-fluid mb-1 gallery-thumb"
                                                                    src="{{ asset('images/products/' . $product->id . '/' . $img->path) }}">
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="col-12">
                                                        <div class="empty-state">
                                                            <i class="la la-image d-block"></i>
                                                            Aucune image secondaire pour le moment.
                                                        </div>
                                                    </div>
                                                @endif
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

    {{-- Reuse the same shared Edit modal shell so "Modifier" works directly from
         the details page too, without leaving the page. --}}
    <div class="modal text-left fade" id="editProductModal" tabindex="-1" role="dialog" aria-hidden="true"
        data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" id="editProductModalContent">
                <div class="modal-loading">
                    <div class="spinner"></div>
                    <span>Chargement du formulaire...</span>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('admin.products._scripts_common')

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets/admin/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/js/tables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/js/tables/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/js/forms/icheck/icheck.min.js') }}"></script>
    <!-- END: Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/admin/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('assets/admin/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <script src="{{ asset('assets/admin/js/scripts/pages/invoices-list.js') }}"></script>
    <script src="{{ asset('assets/admin/js/scripts/forms/select/form-select2.js') }}"></script>
    <script src="{{ asset('assets/admin/js/scripts/modal/components-modal.js') }}"></script>
    <script src="{{ asset('assets/admin/js/scripts/pages/ecommerce-product-details.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <script>
        const editModalEl = document.getElementById('editProductModal');
        const editModalContentEl = document.getElementById('editProductModalContent');
        const LOADING_HTML = `
            <div class="modal-loading">
                <div class="spinner"></div>
                <span>Chargement du formulaire...</span>
            </div>`;

        document.querySelector('.js-open-edit-modal-standalone').addEventListener('click', function () {
            const editUrl = this.dataset.editUrl;
            editModalContentEl.innerHTML = LOADING_HTML;
            $(editModalEl).modal('show');

            fetch(editUrl, { headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'text/html' } })
                .then(res => {
                    if (!res.ok) throw new Error('Impossible de charger le formulaire (HTTP ' + res.status + ').');
                    return res.text();
                })
                .then(html => {
                    editModalContentEl.innerHTML = html;
                    runInjectedScripts(editModalContentEl);
                })
                .catch(err => {
                    editModalContentEl.innerHTML = `
                        <div class="modal-header">
                            <h4 class="modal-title text-danger"><i class="la la-exclamation-triangle"></i> Erreur</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body"><p class="mb-0">${err.message}</p></div>`;
                });
        });

        document.addEventListener('product-form:success', function (e) {
            if (e.detail.mode !== 'edit') return;
            $(editModalEl).modal('hide');
            showToast('Produit modifié. Rechargement...', 'success');
            setTimeout(() => window.location.reload(), 500);
        });

        document.addEventListener('product-form:cancel', function () {
            $(editModalEl).modal('hide');
        });

        $(editModalEl).on('hidden.bs.modal', function () {
            editModalContentEl.innerHTML = LOADING_HTML;
        });
    </script>
@endsection
