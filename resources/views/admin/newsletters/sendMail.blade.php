<div class="modal text-left" style="margin-top: 0%" id="sendEmail" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel62">Envoyer Email</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.newsletter.mail') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="emailsList">Emails</label>
                        <textarea class="form-control" id="emailsList" rows="4" readonly name="emails"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="message">Votre Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="product_id">Produit</label>
                        <select name="product_id" class="form-control" id="productSelect" style="width: 50%;">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" data-image="{{ asset('images/products/' . $product->id . '/' . $product->image) }}">
                                    {{ $product->sku }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="sendEmailsButton">Envoyer</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Fermer</button>
                </div>
            </form>
        </div>
    </div>
</div>
