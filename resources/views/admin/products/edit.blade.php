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

    {{-- File Upload  --}}
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
@endsection


@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <section id="row-separator-form-layouts">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="row-separator-colored-controls">Modifier Produit</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form form-horizontal row-separator" enctype="multipart/form-data"
                                            method="POST" action="{{ route('admin.products.update', $product->id) }}">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="la la-product-hunt"></i> Détails du
                                                    produit</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="name">Nom du
                                                                produit</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="name" class="form-control"
                                                                    value="{{ $product->name }}" placeholder="Nom"
                                                                    name="name" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="brief_description">Brève description</label>
                                                            <div class="col-md-9">
                                                                <textarea id="brief_description_editor" placeholder="Brève description" name="brief_description" rows="3">{{ old('brief_description', $product->brief_description) }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"
                                                                for="editor">Description</label>
                                                            <div class="col-md-9">
                                                                <textarea id="myText" placeholder="Description" name="description" rows="3">{{ old('description', $product->description) }}></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"
                                                                for="price">Prix</label>
                                                            <div class="col-md-9">
                                                                <input type="number" step="0.01" id="price"
                                                                    class="form-control" value="{{ $product->price }}"
                                                                    placeholder="Prix" name="price" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="old_price">Ancien
                                                                prix</label>
                                                            <div class="col-md-9">
                                                                <input type="number" step="0.01" id="old_price"
                                                                    class="form-control"
                                                                    value="{{ $product->old_price }}"
                                                                    placeholder="Ancien prix" name="old_price" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"
                                                                for="sku">SKU</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="sku" class="form-control"
                                                                    value="{{ $product->sku }}" placeholder="SKU"
                                                                    name="sku" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="stock_status">État
                                                                du stock</label>
                                                            <div class="col-md-9">
                                                                <select id="stock_status" class="form-control"
                                                                    name="stock_status" required>
                                                                    <option selected value="{{ $product->stock_status }}">
                                                                        {{ $product->stock_status == 'instock' ? 'En stock' : 'Rupture de stock' }}
                                                                    </option>
                                                                    <option value="instock">En stock</option>
                                                                    <option value="outstock">Rupture de stock</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"
                                                                for="quantity">Quantité</label>
                                                            <div class="col-md-9">
                                                                <input type="number" id="quantity" class="form-control"
                                                                    placeholder="Quantité"
                                                                    value="{{ $product->quantity }}" name="quantity"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"
                                                                for="subcategory_id">Sous-catégorie</label>
                                                            <div class="col-md-9">
                                                                <select id="subcategory_id" class="form-control"
                                                                    name="subcategory_id" required>
                                                                    <option selected
                                                                        value="{{ $product->subcategory->id }}">
                                                                        {{ $product->subcategory->name }}</option>
                                                                    @foreach ($subCategories as $subCategory)
                                                                        <option value="{{ $subCategory->id }}">
                                                                            {{ $subCategory->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row"
                                                    style="margin-left: 20%; margin-top: 1%; margin-bottom: 1%;">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <select id="brand_id" class="form-control"
                                                                    name="brand_id" required style="margin-left: 75%">
                                                                    <option selected disabled>--Choisir Marque--</option>
                                                                    @if ($product->brand)
                                                                        <option selected
                                                                            value="{{ $product->brand->id }}">
                                                                            {{ $product->brand->name }}</option>
                                                                    @endif
                                                                    @foreach ($brands as $brand)
                                                                        <option value="{{ $brand->id }}">
                                                                            {{ $brand->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row"
                                                    style=" margin-top: 1%; margin-bottom: 1%; margin-left: 19%;">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <input type="checkbox" name="selection" id="selection"
                                                                    class="form-check-input"
                                                                    {{ $product->selection ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="selection">Notre
                                                                    sélection</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <input type="checkbox" name="dayDeals" id="dayDeals"
                                                                    class="form-check-input"
                                                                    {{ $product->dayDeals ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="dayDeals">Deal Du
                                                                    Jour</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <input type="checkbox" name="top_ventes" id="top_ventes"
                                                                    class="form-check-input"
                                                                    {{ $product->top_ventes ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="top_ventes">Top
                                                                    Ventes</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <input type="checkbox" name="nouveautes" id="nouveautes"
                                                                    class="form-check-input"
                                                                    {{ $product->nouveautes ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="nouveautes">Nouveautés</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <input type="checkbox" name="best_price" id="best_price"
                                                                    class="form-check-input"
                                                                    {{ $product->best_price ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="best_price">Meilleur
                                                                    Prix</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p class="text-muted mt-3">
                                                            <span style="color: red;">NB:</span> Si le Produit sera placé
                                                            dans la section <b>Deals Du Jour</b>,
                                                            La taille doit être : <strong>342 x 324</strong>
                                                        </p>

                                                        <div class="form-group row" style="margin-right: 15%">
                                                            <label class="col-md-3 label-control" style="margin-top: 1.4%"
                                                                for="image">Miniature</label>
                                                            <div class="col-md-9">
                                                                <div id="oldImagePreview">
                                                                    <img id="oldImage"
                                                                        src="{{ asset('images/products/' . $product->id . '/' . $image) }}"
                                                                        alt="Old Miniature"
                                                                        style="max-width: 100px; max-height: 100px; margin-bottom: 10px;">
                                                                </div>

                                                                <input type="file" id="image" name="image"
                                                                    onchange="previewNewImage(event)">
                                                                <div id="newImagePreview" style="margin-top: 10px;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <h4 class="form-section"><i class="la la-product-hunt"></i> Images du
                                                    produit</h4>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row" style="margin-right: 15%">
                                                            <label class="col-md-3 label-control" style="margin-top: 1.4%"
                                                                for="images">Images</label>
                                                            <div class="col-md-9">
                                                                <div id="oldImagesPreview"
                                                                    style="display: flex; gap: 10px; margin-bottom: 10px;">
                                                                    @foreach ($images as $image)
                                                                        <img src="{{ asset('images/products/' . $product->id . '/' . $image->path) }}"
                                                                            alt="Old Product Image"
                                                                            style="max-width: 100px; max-height: 100px;">
                                                                    @endforeach
                                                                </div>

                                                                <input type="file" id="images" name="images[]"
                                                                    multiple onchange="previewNewImages(event)">
                                                                <div id="newImagesPreview"
                                                                    style="display: flex; gap: 10px; margin-top: 10px;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-actions text-right">
                                                <a type="button" class="btn btn-warning mr-1"
                                                    href="{{ route('admin.products.index') }}">
                                                    <i class="la la-remove"></i> Annuler
                                                </a>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check"></i> Enregistrer
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
    <script>
        ClassicEditor
            .create(document.querySelector('#myText'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#brief_description_editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        function previewNewImage(event) {
            const file = event.target.files[0];
            const newImagePreview = document.getElementById('newImagePreview');
            const oldImagePreview = document.getElementById('oldImagePreview');

            newImagePreview.innerHTML = '';

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '100px';
                    img.style.maxHeight = '100px';
                    newImagePreview.appendChild(img);

                    oldImagePreview.style.display = 'none';
                };
                reader.readAsDataURL(file);
            } else {
                oldImagePreview.style.display = 'block';
            }
        }
    </script>

    <script>
        function previewNewImages(event) {
            const files = event.target.files;
            const newImagesPreview = document.getElementById('newImagesPreview');
            const oldImagesPreview = document.getElementById('oldImagesPreview');

            newImagesPreview.innerHTML = '';

            if (files.length > 0) {
                oldImagesPreview.style.display = 'none';

                Array.from(files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.maxWidth = '100px';
                        img.style.maxHeight = '100px';
                        newImagesPreview.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                });
            } else {
                oldImagesPreview.style.display = 'flex';
            }
        }
    </script>





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
