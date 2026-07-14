{{--
    ============================================================================
    delete.blade.php — per-row delete confirmation modal.

    Included once per product row from index.blade.php via:
        @include('admin.products.delete')

    Submits via AJAX (fetch) to route('admin.products.destroy', $product->id).
    On success: the corresponding table row fades out and is removed WITHOUT a
    full page reload, and the row count / "select all" state is refreshed.

    Backend contract: DELETE route('admin.products.destroy', $product->id)
    must return JSON when requested via AJAX:
        { success: true, message: '...' }
        { success: false, message: '...' }  (e.g. 422/500 on failure)
    ============================================================================
--}}
<div class="modal text-left" id="deleteProduct{{ $product->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="la la-trash text-danger"></i> Supprimer Produit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form js-delete-product-form" method="POST"
                action="{{ route('admin.products.destroy', $product->id) }}" data-product-id="{{ $product->id }}">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p class="mb-0">
                        Êtes-vous sûr de vouloir supprimer le produit
                        <strong>{{ $product->name }}</strong> ?
                    </p>
                    <p class="mt-2 mb-0" style="color:#c92a2a; font-weight:600; font-size:.85rem;">
                        <i class="la la-exclamation-triangle"></i> Cette action est irréversible.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning mr-1" data-dismiss="modal">
                        <i class="la la-times"></i> Fermer
                    </button>
                    <button type="submit" class="btn btn-danger js-confirm-delete-btn">
                        <span class="js-btn-label"><i class="la la-trash"></i> Supprimer</span>
                        <span class="js-btn-spinner d-none"><i class="la la-spinner la-spin"></i> Suppression...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
