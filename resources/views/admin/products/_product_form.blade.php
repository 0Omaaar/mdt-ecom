{{--
    ============================================================================
    SHARED PRODUCT FORM FRAGMENT — used by:
      1) create.blade.php   (full page, $mode = 'create')
      2) edit.blade.php     (full page fallback, $mode = 'edit')
      3) Edit popup modal   (loaded via AJAX/fetch into the modal body, $mode = 'edit')

    IMPORTANT: This file intentionally has NO @extends/@section — it is a pure
    HTML fragment so it can be safely injected into the modal's innerHTML.

    Expected variables:
      $mode          'create' | 'edit'
      $product       Product model (required when $mode === 'edit')
      $categories    Collection
      $subCategories Collection
      $brands        Collection
      $images        Collection of secondary images (required when $mode === 'edit')

    Backend contract (see NOTES-BACKEND.md for full controller code):
      - create -> POST  route('admin.products.store')
      - edit   -> POST  route('admin.products.update', $product->id) + _method=PUT
      - Both must return JSON when the request is AJAX:
            success: { success: true, message: '...', product: {...row fields...} }
            validation error (422): { success: false, errors: { field: ['msg'] } }
    ============================================================================
--}}
@php
    $isEdit = ($mode ?? 'create') === 'edit';
    $formId = $isEdit ? 'editProductForm' : 'createProductForm';
    $actionUrl = $isEdit ? route('admin.products.update', $product->id) : route('admin.products.store');
@endphp

<form class="form product-form" id="{{ $formId }}" enctype="multipart/form-data" method="POST"
    action="{{ $actionUrl }}" data-mode="{{ $isEdit ? 'edit' : 'create' }}"
    data-product-id="{{ $isEdit ? $product->id : '' }}" novalidate>
    @csrf
    @if ($isEdit)
        @method('PUT')
    @endif

    <div class="form-body">
        <h4 class="form-section"><i class="la la-cube"></i> Détails du produit</h4>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="label-control" for="{{ $formId }}_name">Nom du produit</label>
                    <input type="text" id="{{ $formId }}_name" class="form-control" placeholder="Nom" name="name"
                        value="{{ $isEdit ? old('name', $product->name) : old('name') }}" required>
                    <div class="invalid-feedback" data-error-for="name"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="label-control" for="{{ $formId }}_brief_description">Brève description</label>
                    <textarea id="{{ $formId }}_brief_description" class="form-control js-editor-brief"
                        placeholder="Brève description" name="brief_description" rows="3">{{ $isEdit ? old('brief_description', $product->brief_description) : old('brief_description') }}</textarea>
                    <div class="invalid-feedback" data-error-for="brief_description"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="label-control" for="{{ $formId }}_description">Description</label>
                    <textarea id="{{ $formId }}_description" class="form-control js-editor-full"
                        placeholder="Description" name="description" rows="3">{{ $isEdit ? old('description', $product->description) : old('description') }}</textarea>
                    <div class="invalid-feedback" data-error-for="description"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label-control" for="{{ $formId }}_price">Prix</label>
                            <input type="number" step="0.01" id="{{ $formId }}_price" class="form-control"
                                placeholder="Prix" name="price"
                                value="{{ $isEdit ? old('price', $product->price) : old('price') }}" required>
                            <div class="invalid-feedback" data-error-for="price"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label-control" for="{{ $formId }}_old_price">Ancien prix</label>
                            <input type="number" step="0.01" id="{{ $formId }}_old_price" class="form-control"
                                placeholder="Ancien prix" name="old_price"
                                value="{{ $isEdit ? old('old_price', $product->old_price) : old('old_price') }}"
                                required>
                            <div class="invalid-feedback" data-error-for="old_price"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label-control" for="{{ $formId }}_sku">SKU</label>
                            <input type="text" id="{{ $formId }}_sku" class="form-control" placeholder="SKU"
                                name="sku" value="{{ $isEdit ? old('sku', $product->sku) : old('sku') }}" required>
                            <div class="invalid-feedback" data-error-for="sku"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label-control" for="{{ $formId }}_quantity">Quantité</label>
                            <input type="number" id="{{ $formId }}_quantity" class="form-control"
                                placeholder="Quantité" name="quantity"
                                value="{{ $isEdit ? old('quantity', $product->quantity) : old('quantity') }}"
                                required>
                            <div class="invalid-feedback" data-error-for="quantity"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="label-control" for="{{ $formId }}_stock_status">État du stock</label>
                    <select id="{{ $formId }}_stock_status" class="form-control" name="stock_status" required>
                        @php $curStatus = $isEdit ? old('stock_status', $product->stock_status) : old('stock_status', 'instock'); @endphp
                        <option value="instock" {{ $curStatus == 'instock' ? 'selected' : '' }}>En stock</option>
                        <option value="outstock" {{ $curStatus == 'outstock' ? 'selected' : '' }}>Rupture de stock
                        </option>
                    </select>
                    <div class="invalid-feedback" data-error-for="stock_status"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="label-control" for="{{ $formId }}_category_id">Catégorie</label>
                    <select id="{{ $formId }}_category_id" class="form-control js-category-select"
                        name="category_id" required>
                        <option value="" disabled {{ !$isEdit ? 'selected' : '' }}>--Choisir Catégorie--</option>
                        @foreach ($categories as $category)
                            @php $curCat = $isEdit ? old('category_id', $product->category_id) : old('category_id'); @endphp
                            <option value="{{ $category->id }}" {{ $curCat == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback" data-error-for="category_id"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="label-control" for="{{ $formId }}_subcategory_id">Sous-catégorie</label>
                    <select id="{{ $formId }}_subcategory_id" class="form-control js-subcategory-select"
                        name="subcategory_id">
                        <option value="">-- Aucune --</option>
                        @foreach ($subCategories as $subCategory)
                            @php $curSub = $isEdit ? old('subcategory_id', $product->subcategory_id) : old('subcategory_id'); @endphp
                            <option value="{{ $subCategory->id }}" data-category="{{ $subCategory->category_id }}"
                                {{ $curSub == $subCategory->id ? 'selected' : '' }}>{{ $subCategory->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback" data-error-for="subcategory_id"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="label-control" for="{{ $formId }}_brand_id">Marque</label>
                    <select id="{{ $formId }}_brand_id" class="form-control" name="brand_id" required>
                        <option value="" disabled {{ !$isEdit ? 'selected' : '' }}>--Choisir Marque--</option>
                        @foreach ($brands as $brand)
                            @php $curBrand = $isEdit ? old('brand_id', $product->brand_id ?? ($product->brand->id ?? null)) : old('brand_id'); @endphp
                            <option value="{{ $brand->id }}" {{ $curBrand == $brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback" data-error-for="brand_id"></div>
                </div>
            </div>
        </div>

        <div class="row mt-1">
            <div class="col-12">
                <div class="d-flex flex-wrap" style="gap:.7rem;">
                    @php
                        $flags = [
                            'selection' => 'Notre sélection',
                            'dayDeals' => 'Deal Du Jour',
                            'top_ventes' => 'Top Ventes',
                            'nouveautes' => 'Nouveautés',
                            'best_price' => 'Meilleur Prix',
                        ];
                    @endphp
                    @foreach ($flags as $flagKey => $flagLabel)
                        @php $checked = $isEdit ? old($flagKey, $product->{$flagKey}) : old($flagKey); @endphp
                        <label class="form-check-modern" for="{{ $formId }}_{{ $flagKey }}">
                            <input type="checkbox" name="{{ $flagKey }}" id="{{ $formId }}_{{ $flagKey }}"
                                {{ $checked ? 'checked' : '' }}>
                            {{ $flagLabel }}
                        </label>
                    @endforeach
                </div>
            </div>
        </div>

        <p class="text-muted mt-3 mb-2" style="font-size:.85rem;">
            <span style="color:#ea5455;font-weight:600;">NB :</span> Si le produit est placé dans la section
            <b>Deals Du Jour</b>, la taille de la miniature doit être <strong>342 x 324</strong>.
        </p>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="label-control d-block mb-1">Miniature</label>
                    <div class="image-drop">
                        @if ($isEdit)
                            <div id="{{ $formId }}_oldImagePreview" class="mb-2">
                                <img id="{{ $formId }}_oldImage"
                                    src="{{ asset('images/products/' . $product->id . '/' . ($image ?? $product->image)) }}"
                                    alt="Miniature actuelle" style="max-width:100px;max-height:100px;border-radius:8px;">
                            </div>
                        @endif
                        <input type="file" id="{{ $formId }}_image" name="image"
                            class="js-image-input" data-preview-target="{{ $formId }}_newImagePreview"
                            data-old-target="{{ $formId }}_oldImagePreview" {{ $isEdit ? '' : 'required' }}>
                        <div id="{{ $formId }}_newImagePreview" class="mt-2"></div>
                    </div>
                    <div class="invalid-feedback" data-error-for="image"></div>
                </div>
            </div>

            @if ($isEdit)
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="label-control d-block mb-1">Images secondaires actuelles</label>
                        <div id="{{ $formId }}_oldImagesPreview" class="d-flex flex-wrap" style="gap:10px;">
                            @foreach ($images as $img)
                                <div class="thumb-wrapper" id="{{ $formId }}_img-wrapper-{{ $img->id }}">
                                    <img src="{{ asset('images/products/' . $product->id . '/' . $img->path) }}"
                                        alt="Image produit">
                                    <button type="button" class="thumb-remove-btn js-delete-product-image"
                                        data-product-id="{{ $product->id }}" data-image-id="{{ $img->id }}"
                                        title="Supprimer">&times;</button>
                                </div>
                            @endforeach
                        </div>
                        @if ($images->isEmpty())
                            <p class="text-muted mt-2 mb-0" data-no-images-msg>Aucune image secondaire.</p>
                        @endif
                    </div>
                </div>
            @endif
        </div>

        @if (!$isEdit)
            <h4 class="form-section mt-3"><i class="la la-images"></i> Images du produit</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="image-drop">
                        <label class="label-control d-block mb-2">Images (galerie)</label>
                        <input type="file" id="{{ $formId }}_images" name="images[]" multiple
                            class="js-images-input" data-preview-target="{{ $formId }}_newImagesPreview">
                        <div id="{{ $formId }}_newImagesPreview" class="d-flex flex-wrap mt-2" style="gap:10px;">
                        </div>
                    </div>
                    <div class="invalid-feedback" data-error-for="images"></div>
                </div>
            </div>
        @else
            <div class="row mt-2">
                <div class="col-md-12">
                    <label class="label-control d-block mb-1">Ajouter de nouvelles images secondaires</label>
                    <div class="image-drop">
                        <input type="file" id="{{ $formId }}_images" name="images[]" multiple
                            class="js-images-input" data-preview-target="{{ $formId }}_newImagesPreview">
                        <div id="{{ $formId }}_newImagesPreview" class="d-flex flex-wrap mt-2" style="gap:10px;">
                        </div>
                    </div>
                    <div class="invalid-feedback" data-error-for="images"></div>
                </div>
            </div>
        @endif
    </div>

    <div class="form-actions text-right mt-3" data-form-actions>
        @if ($isEdit)
            <button type="button" class="btn btn-warning mr-1" data-dismiss-target>
                <i class="la la-remove"></i> Annuler
            </button>
        @else
            <a type="button" class="btn btn-warning mr-1" href="{{ route('admin.products.index') }}">
                <i class="la la-remove"></i> Annuler
            </a>
        @endif
        <button type="submit" class="btn btn-primary js-submit-btn">
            <span class="js-btn-label"><i class="la la-check"></i> Enregistrer</span>
            <span class="js-btn-spinner d-none"><i class="la la-spinner la-spin"></i> Enregistrement...</span>
        </button>
    </div>
</form>
