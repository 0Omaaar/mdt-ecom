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
        /* Modern UI Card and Table */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
        }
        .card-header {
            background-color: transparent;
            border-bottom: 1px solid #f1f3f5;
            padding-bottom: 1.5rem;
        }
        .table-bordered, .table-bordered th, .table-bordered td {
            border: none;
            border-bottom: 1px solid #f4f5f7;
        }
        .table thead th {
            border-bottom: 2px solid #e9ecef !important;
            color: #6c757d;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }
        .table tbody tr {
            transition: all 0.2s ease-in-out;
        }
        .table tbody tr:hover {
            background-color: #f8f9fa !important;
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.03);
        }
        .table td {
            vertical-align: middle;
            padding: 1rem 0.75rem;
        }
        /* Soft Badges */
        .badge-soft-success {
            background-color: #d1e7dd;
            color: #0f5132;
            border-radius: 20px;
            padding: 0.5em 0.8em;
            font-weight: 600;
        }
        .badge-soft-warning {
            background-color: #fff3cd;
            color: #856404;
            border-radius: 20px;
            padding: 0.5em 0.8em;
            font-weight: 600;
        }
        .badge-soft-danger {
            background-color: #f8d7da;
            color: #842029;
            border-radius: 20px;
            padding: 0.5em 0.8em;
            font-weight: 600;
        }
        .badge-soft-dark {
            background-color: #e9ecef;
            color: #495057;
            border-radius: 20px;
            padding: 0.5em 0.8em;
            font-weight: 600;
        }
        /* Thumbnails */
        .table img {
            border-radius: 8px !important;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            object-fit: cover;
        }
        /* Action Dropdown */
        .btn-action-ghost {
            background: transparent;
            color: #6c757d;
            border: 1px solid transparent;
            box-shadow: none;
            padding: 0.4rem 0.6rem;
            border-radius: 8px;
            transition: all 0.2s;
            cursor: pointer;
        }
        .btn-action-ghost:hover {
            background: #f1f3f5;
            color: #495057;
            border-color: #e9ecef;
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
                    <h3 class="content-header-title mb-0 d-inline-block">Liste Categories</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Accueil</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Categories</a>
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
                                    <h4 class="card-title">Categories</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                    <div class="heading-elements" style="display: flex; align-items: center; gap: 10px;">
                                        <button type="button" id="bulk-delete-btn" class="btn btn-danger btn-sm" style="display: none;" onclick="bulkDeleteCategories()">
                                            <i class="la la-trash"></i> Supprimer la sélection (<span id="selected-count">0</span>)
                                        </button>
                                        <button data-toggle="modal" data-target="#flipInY" class="btn btn-primary btn-sm"><i
                                                class="ft-plus white"></i> Ajouter Une
                                            Categorie</button>

                                        @include('admin.categories.add')
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
                            <input type="checkbox" id="select-all-categories" style="transform: scale(1.2); cursor: pointer;" onchange="toggleSelectAllCategories(this)">
                        </th>
                        <th>N</th>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Slug</th>
                        <th>Nombre Sous Categories</th>
                        <th>Nombre Produits</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td style="text-align: center;">
                                <input type="checkbox" class="category-checkbox" value="{{ $category->id }}" style="transform: scale(1.2); cursor: pointer;" onchange="toggleBulkDeleteBtn()">
                            </td>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>
                                @if($category->image != null)
                                    <img src="{{ asset('images/categories/' . $category->image) }}"
                                    style="border-radius: 4%"
                                    alt="{{ $category->name }}" width="50" height="50">
                                @else
                                    <span style="color: rgb(234, 109, 109)">Aucune image</span>
                                @endif
                            </td>
                            <td>{{ $category->name }}</td>
                            <td><span class="badge badge-soft-dark">{{ $category->slug }}</span></td>
                            <td><span
                                    class="badge badge-soft-success">{{ $category->subCategories()->count() }}</span>
                            </td>
                            <td><span
                                    class="badge badge-soft-success">{{ $category->products()->count() }}</span>
                            </td>
                            <td>
                                <span class="dropdown">
                                    <button id="btnSearchDrop2" type="button"
                                        data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"
                                        class="btn-action-ghost dropdown-toggle">
                                        <i class="ft-settings"></i>
                                    </button>
                                    <span aria-labelledby="btnSearchDrop2"
                                        class="dropdown-menu mt-1 dropdown-menu-right">
                                        <button data-toggle="modal" data-target="#editCategory{{ $category->id }}" class="dropdown-item"><i
                                            class="la la-pencil"></i> Modifier</button>
                                        <a href="#" class="dropdown-item"><i
                                                class="la la-eye"></i> Voir Sous Categories</a>
                                        <a href="#" class="dropdown-item"><i
                                                    class="la la-eye"></i> Voir Produits</a>
                                        <button data-toggle="modal" data-target="#deleteCategory{{ $category->id }}" class="dropdown-item"><i
                                                class="la la-trash"></i> Supprimer</button>
                                    </span>
                                </span>
                            </td>

                            {{-- Delete Category Modal --}}
                            @include('admin.categories.delete')

                            {{-- Edit Category Modal --}}
                            @include('admin.categories.edit')
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

        function removePreviewAdd(){
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

        function toggleSelectAllCategories(master) {
            const table = $('#invoices-list').DataTable();
            const rows = table.rows({ 'search': 'applied' }).nodes();
            $('input.category-checkbox', rows).prop('checked', master.checked);
            toggleBulkDeleteBtn();
        }

        function toggleBulkDeleteBtn() {
            const table = $('#invoices-list').DataTable();
            const checked = table.$('.category-checkbox:checked');
            const btn = document.getElementById('bulk-delete-btn');
            const countSpan = document.getElementById('selected-count');
            
            if (checked.length > 0) {
                btn.style.display = 'inline-block';
                countSpan.textContent = checked.length;
            } else {
                btn.style.display = 'none';
            }
        }

        function bulkDeleteCategories() {
            const table = $('#invoices-list').DataTable();
            const checked = table.$('.category-checkbox:checked');
            const ids = [];
            checked.each(function() {
                ids.push(this.value);
            });

            if (ids.length === 0) return;

            if (!confirm(`Voulez-vous vraiment supprimer les ${ids.length} catégories sélectionnées ? Attention, cela supprimera ou affectera leurs sous-catégories et produits.`)) {
                return;
            }

            fetch("{{ route('admin.categories.bulk_destroy') }}", {
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
