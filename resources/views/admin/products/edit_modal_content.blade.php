{{--
    ============================================================================
    edit_modal_content.blade.php

    Returned by GET route('admin.products.edit', $product->id) WHEN the request
    is AJAX (see NOTES-BACKEND.md — controller must branch on $request->ajax()
    or a `X-Requested-With: XMLHttpRequest` header and return this partial
    instead of the full edit.blade.php page).

    This is injected into #editProductModal .modal-body by the index page JS.
    It re-uses the exact same _product_form fragment as the full edit page so
    there is only ONE form markup to maintain.
    ============================================================================
--}}
<div class="modal-header">
    <h4 class="modal-title"><i class="la la-pencil"></i> Modifier : {{ $product->name }}</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    @include('admin.products._product_form', [
        'mode' => 'edit',
        'product' => $product,
        'image' => $image ?? $product->image,
        'images' => $images,
        'categories' => $categories,
        'subCategories' => $subCategories,
        'brands' => $brands,
    ])
</div>

{{-- Re-executed every time this partial is injected via innerHTML (see
     runInjectedScripts() helper) — safe to include here. --}}
@include('admin.products._product_form_scripts')
