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
        .modal-edit {
            width: 165%;
        }
    </style>
@endsection
@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Liste Produits</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Accueil</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Produits</a>
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
                                    <h4 class="card-title">Produits</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                    <div class="heading-elements" style="display: flex; align-items: center; gap: 10px;">
                                        <button type="button" id="bulk-delete-btn" class="btn btn-danger btn-sm" style="display: none;" onclick="bulkDeleteProducts()">
                                            <i class="la la-trash"></i> Supprimer la sélection (<span id="selected-count">0</span>)
                                        </button>
                                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm"><i
                                                class="ft-plus white"></i> Ajouter Un Produit</a>
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
                                                    <th style="text-align: center; width: 40px;">
                                                        <input type="checkbox" id="select-all-products" style="transform: scale(1.2); cursor: pointer;" onchange="toggleSelectAllProducts(this)">
                                                    </th>
                                                    <th>N</th>
                                                    <th>Miniature</th>
                                                    <th>Nom</th>
                                                    <th>SKU</th>
                                                    <th>Prix</th>
                                                    <th>Statut</th>
                                                    <th>Categorie</th>
                                                    <th>Sous Categorie</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $product)
                                                    <tr>
                                                        <td style="text-align: center;">
                                                            <input type="checkbox" class="product-checkbox" value="{{ $product->id }}" style="transform: scale(1.2); cursor: pointer;" onchange="toggleBulkDeleteBtn()">
                                                        </td>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>
                                                            @if ($product->image != null)
                                                                @if ($product->dolibarr_id != null)
                                                                    <img src="{{ asset('productsDolibarr/' . $product->dolibarr_id . '/' . $product->image) }}"
                                                                        style="border-radius: 4%"
                                                                        alt="{{ $product->name }}" width="50"
                                                                        height="50">
                                                                @else
                                                                    <img src="{{ asset('images/products/' . $product->id . '/' . $product->image) }}"
                                                                        style="border-radius: 4%"
                                                                        alt="{{ $product->name }}" width="50"
                                                                        height="50">
                                                                @endif
                                                            @else
                                                                <span style="color: rgb(234, 109, 109)">Aucune image</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ Str::limit($product->name, 15, '...') }}</td>
                                                        <td><span
                                                                class="badge badge-dark badge-lg">{{ $product->sku }}</span>
                                                        </td>
                                                        <td>{{ $product->price }}</td>
                                                        <td><span
                                                                class="badge badge-lg {{ $product->stock_status == 'instock' ? 'badge-success' : 'badge-danger' }}">{{ $product->stock_status }}</span>
                                                        </td>
                                                        <td>{{ $product->category->name }}</td>
                                                        <td>{{ $product->subcategory ? Str::limit($product->subcategory->name, 10, '...') : 'Aucune' }}</td>
                                                        <td>
                                                            <span class="dropdown">
                                                                <button id="btnSearchDrop2" type="button"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="true"
                                                                    class="btn btn-primary dropdown-toggle dropdown-menu-right"><i
                                                                        class="ft-settings"></i></button>
                                                                <span aria-labelledby="btnSearchDrop2"
                                                                    class="dropdown-menu mt-1 dropdown-menu-right">
                                                                    <a href="{{ route('admin.products.show', $product->id) }}"
                                                                        class="dropdown-item"><i class="la la-eye"></i> Voir
                                                                        Détails</a>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('admin.products.edit', $product->id) }}"><i
                                                                            class="la la-pencil"></i> Modifier</a>
                                                                    <button data-toggle="modal"
                                                                        data-target="#deleteProduct{{ $product->id }}"
                                                                        class="dropdown-item"><i class="la la-trash"></i>
                                                                        Supprimer</button>
                                                                </span>
                                                            </span>
                                                        </td>

                                                        {{-- Delete Product Modal --}}
                                                        @include('admin.products.delete')


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

    <script>
        function previewImageAdd(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('image-preview');
                output.src = reader.result;
                output.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        function removePreviewAdd() {
            var output = document.getElementById('image-preview');
            output.src = '';
            output.style.display = 'none';
        }

        function previewImage(event, categoryId) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('image-preview-' + categoryId);
                output.src = '';
                output.src = reader.result;
                output.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        function removePreview(categoryId) {
            var output = document.getElementById('image-preview-' + categoryId);
            output.src = '';
            // output.style.display = 'none';
        }

        function toggleSelectAllProducts(master) {
            const checkboxes = document.querySelectorAll('.product-checkbox');
            checkboxes.forEach(cb => cb.checked = master.checked);
            toggleBulkDeleteBtn();
        }

        function toggleBulkDeleteBtn() {
            const checkboxes = document.querySelectorAll('.product-checkbox:checked');
            const btn = document.getElementById('bulk-delete-btn');
            const countSpan = document.getElementById('selected-count');
            
            if (checkboxes.length > 0) {
                btn.style.display = 'inline-block';
                countSpan.textContent = checkboxes.length;
            } else {
                btn.style.display = 'none';
            }
        }

        function bulkDeleteProducts() {
            const checked = document.querySelectorAll('.product-checkbox:checked');
            const ids = Array.from(checked).map(cb => cb.value);

            if (ids.length === 0) return;

            if (!confirm(`Voulez-vous vraiment supprimer les ${ids.length} produits sélectionnés ?`)) {
                return;
            }

            fetch("{{ route('admin.products.bulk_destroy') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ ids: ids })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                } else {
                    alert('Erreur : ' + data.message);
                }
            })
            .catch(err => {
                alert('Une erreur est survenue lors de la suppression.');
            });
        }
    </script>
@endsection
