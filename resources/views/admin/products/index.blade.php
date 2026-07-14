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

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    @include('admin.products._styles')
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
                    <h3 class="content-header-title mb-0 page-heading">
                        <span class="icon-wrap"><i class="la la-cubes"></i></span> Liste Produits
                    </h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Accueil</a></li>
                                <li class="breadcrumb-item"><a href="#">Produits</a></li>
                                <li class="breadcrumb-item active">Gestion</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><i class="la la-cube"></i> Produits
                                    <span class="badge badge-soft-primary ml-1">{{ $products->count() }}</span>
                                </h4>
                                <div class="heading-elements d-flex align-items-center" style="gap:10px;">
                                    <div id="bulk-actions-bar" class="bulk-actions-bar">
                                        <i class="la la-check-square"></i>
                                        <span><span id="selected-count">0</span> sélectionné(s)</span>
                                        <button type="button" id="bulk-delete-btn" class="btn btn-danger btn-sm ml-2"
                                            onclick="bulkDeleteProducts()">
                                            <i class="la la-trash"></i> Supprimer la sélection
                                        </button>
                                    </div>
                                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm">
                                        <i class="la la-plus"></i> Ajouter Un Produit
                                    </a>
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
                                                        <input type="checkbox" id="select-all-products" style="transform: scale(1.2); cursor: pointer;">
                                                    </th>
                                                    <th>N</th>
                                                    <th>Miniature</th>
                                                    <th>Nom</th>
                                                    <th>SKU</th>
                                                    <th>Prix</th>
                                                    <th>Statut</th>
                                                    <th>Categorie</th>
                                                    <th>Sous Categorie</th>
                                                    <th style="width:70px;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="products-tbody">
                                                @forelse ($products as $product)
                                                    <tr id="product-row-{{ $product->id }}" data-product-id="{{ $product->id }}">
                                                        <td style="text-align: center;">
                                                            <input type="checkbox" class="product-checkbox select-checkbox"
                                                                value="{{ $product->id }}">
                                                        </td>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>
                                                            @if ($product->image != null)
                                                                @if ($product->dolibarr_id != null)
                                                                    <img class="product-thumb"
                                                                        src="{{ asset('productsDolibarr/' . $product->dolibarr_id . '/' . $product->image) }}"
                                                                        alt="{{ $product->name }}">
                                                                @else
                                                                    <img class="product-thumb"
                                                                        src="{{ asset('images/products/' . $product->id . '/' . $product->image) }}"
                                                                        alt="{{ $product->name }}">
                                                                @endif
                                                            @else
                                                                <span class="product-thumb-empty"><i class="la la-image"></i></span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="product-name-cell">
                                                                <span class="p-name">{{ Str::limit($product->name, 20, '...') }}</span>
                                                                <span class="p-id">#{{ $product->id }}</span>
                                                            </div>
                                                        </td>
                                                        <td><span class="badge badge-soft-dark">{{ $product->sku }}</span></td>
                                                        <td><strong>{{ $product->price }}</strong> DHS</td>
                                                        <td>
                                                            @if ($product->stock_status == 'instock')
                                                                <span class="badge badge-soft-success">En stock</span>
                                                            @else
                                                                <span class="badge badge-soft-danger">Rupture de stock</span>
                                                            @endif
                                                        </td>
                                                        <td><span class="badge badge-soft-dark">{{ $product->category->name ?? '—' }}</span></td>
                                                        <td>
                                                            @if($product->subcategory)
                                                                <span class="badge badge-soft-dark">{{ Str::limit($product->subcategory->name, 12, '...') }}</span>
                                                            @else
                                                                <span class="text-muted">Aucune</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <span class="dropdown">
                                                                <button type="button" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false"
                                                                    class="btn-action-ghost dropdown-toggle">
                                                                    <i class="ft-settings"></i>
                                                                </button>
                                                                <span class="dropdown-menu dropdown-menu-right">
                                                                    <a href="{{ route('admin.products.show', $product->id) }}"
                                                                        class="dropdown-item">
                                                                        <i class="la la-eye"></i> Voir Détails
                                                                    </a>
                                                                    <a class="dropdown-item" href="{{ route('admin.products.edit', $product->id) }}">
                                                                        <i class="la la-pencil"></i> Modifier
                                                                    </a>
                                                                    <button type="button" data-toggle="modal"
                                                                        data-target="#deleteProduct{{ $product->id }}"
                                                                        class="dropdown-item text-danger">
                                                                        <i class="la la-trash"></i> Supprimer
                                                                    </button>
                                                                </span>
                                                            </span>
                                                        </td>
                                                    </tr>

                                                    {{-- Delete Product Modal --}}
                                                    @include('admin.products.delete')
                                                @empty
                                                    <tr>
                                                        <td colspan="10">
                                                            <div class="empty-state">
                                                                <i class="la la-box-open d-block"></i>
                                                                Aucun produit pour le moment.
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforelse
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

    {{-- ==========================================================
         Single shared Edit modal shell.
         Content (the actual form) is injected via AJAX every time
         "Modifier" is clicked, using the product's own edit URL.
         ========================================================== --}}


    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
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

    <script>
        /* =========================================================================
           1) DATA TABLES & SELECTION HELPERS
           ========================================================================= */
        function getDataTableSafe() {
            try {
                if ($.fn.DataTable && $.fn.DataTable.isDataTable('#invoices-list')) {
                    return $('#invoices-list').DataTable();
                }
            } catch (e) {}
            return null;
        }

        function getCheckedIds() {
            const table = getDataTableSafe();
            const checked = table ? table.$('.product-checkbox:checked')
                                   : document.querySelectorAll('.product-checkbox:checked');
            return Array.from(checked).map(el => el.value);
        }

        let isSyncing = false;
        function toggleBulkDeleteBtn() {
            if (isSyncing) return;
            const ids = getCheckedIds();
            const bar = document.getElementById('bulk-actions-bar');
            const countSpan = document.getElementById('selected-count');

            if (ids.length > 0) {
                bar.style.display = 'flex';
                countSpan.textContent = ids.length;
            } else {
                bar.style.display = 'none';
            }

            // Sync the select-all checkbox visually
            isSyncing = true;
            const selectAll = document.getElementById('select-all-products');
            const totalVisible = document.querySelectorAll('.product-checkbox').length;
            if (selectAll) {
                const isAllChecked = totalVisible > 0 && ids.length === totalVisible;
                if (isAllChecked) {
                    $(selectAll).iCheck('check');
                } else {
                    $(selectAll).iCheck('uncheck');
                }
            }
            isSyncing = false;
        }

        function removeProductRow(id) {
            const row = document.getElementById('product-row-' + id);
            if (row) {
                row.classList.add('row-removing');
                setTimeout(() => row.remove(), 260);
            }
            const modal = document.getElementById('deleteProduct' + id);
            if (modal) modal.remove();
            toggleBulkDeleteBtn();
        }

        /* =========================================================================
           2) iCHECK EVENT BINDINGS (survives DataTable pagination/redraws)
           ========================================================================= */
        $(document).ready(function() {
            // Select-all checkbox
            $(document).on('ifChecked', '#select-all-products', function() {
                if (isSyncing) return;
                isSyncing = true;
                const table = getDataTableSafe();
                if (table) {
                    const rows = table.rows({ 'search': 'applied' }).nodes();
                    $('input.product-checkbox', rows).iCheck('check');
                } else {
                    $('input.product-checkbox').iCheck('check');
                }
                isSyncing = false;
                toggleBulkDeleteBtn();
            });

            $(document).on('ifUnchecked', '#select-all-products', function() {
                if (isSyncing) return;
                isSyncing = true;
                const table = getDataTableSafe();
                if (table) {
                    const rows = table.rows({ 'search': 'applied' }).nodes();
                    $('input.product-checkbox', rows).iCheck('uncheck');
                } else {
                    $('input.product-checkbox').iCheck('uncheck');
                }
                isSyncing = false;
                toggleBulkDeleteBtn();
            });

            // Individual checkboxes
            $(document).on('ifChanged', '.product-checkbox', function() {
                toggleBulkDeleteBtn();
            });
        });

        /* =========================================================================
           3) BULK DELETE WITH SWEETALERT2
           ========================================================================= */
        function bulkDeleteProducts() {
            const ids = getCheckedIds();
            if (ids.length === 0) return;

            Swal.fire({
                title: 'Êtes-vous sûr ?',
                text: `Voulez-vous vraiment supprimer les ${ids.length} produit(s) sélectionné(s) ?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ff4961',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Oui, supprimer !',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    const btn = document.getElementById('bulk-delete-btn');
                    const originalHtml = btn.innerHTML;
                    btn.disabled = true;
                    btn.innerHTML = '<i class="la la-spinner la-spin"></i> Suppression...';

                    apiRequest("{{ route('admin.products.bulk_destroy') }}", {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ ids: ids })
                    })
                    .then(data => {
                        ids.forEach(id => removeProductRow(id));
                        showToast((data && data.message) || `${ids.length} produit(s) supprimé(s).`, 'success');
                    })
                    .catch(err => {
                        showToast(err.message || 'Une erreur est survenue lors de la suppression.', 'error');
                    })
                    .finally(() => {
                        btn.disabled = false;
                        btn.innerHTML = originalHtml;
                    });
                }
            });
        }

        /* =========================================================================
           4) SINGLE-ROW DELETE (AJAX, event delegation)
           ========================================================================= */
        document.getElementById('products-tbody').addEventListener('submit', function (e) {
            const form = e.target.closest('.js-delete-product-form');
            if (!form) return;
            e.preventDefault();

            const productId = form.dataset.productId;
            const btn = form.querySelector('.js-confirm-delete-btn');
            const label = btn.querySelector('.js-btn-label');
            const spinner = btn.querySelector('.js-btn-spinner');

            btn.disabled = true;
            label.classList.add('d-none');
            spinner.classList.remove('d-none');

            apiRequest(form.action, {
                method: 'POST',
                body: new FormData(form) // includes _method=DELETE + _token
            })
            .then(data => {
                $('#deleteProduct' + productId).modal('hide');
                removeProductRow(productId);
                showToast((data && data.message) || 'Produit supprimé avec succès.', 'success');
            })
            .catch(err => {
                showToast(err.message || 'Erreur lors de la suppression.', 'error');
            })
            .finally(() => {
                btn.disabled = false;
                label.classList.remove('d-none');
                spinner.classList.add('d-none');
            });
        });
    </script>
@endsection
