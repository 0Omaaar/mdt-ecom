<div class="modal text-left" style="margin-top: 0%" id="editProduct{{ $product->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel62">Modifier Produit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form" method="POST" action="{{ route('admin.products.update', $product->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="card">
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <div class="form-body">

                                    <div class="row">
                                        <div class="form-group col-md-4 mb-2">
                                            <label>Nom</label>
                                            <div class="position-relative has-icon-left">
                                                <input type="text"  class="form-control"
                                                    placeholder="Nom du Produit" value="{{ $product->name }}" name="name" required>
                                                <div class="form-control-position">
                                                    <i class="la la-tag"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4 mb-2">
                                            <label>Sku</label>
                                            <div class="position-relative has-icon-left">
                                                <input type="text" class="form-control"
                                                    placeholder="SKU du Produit" value={{ $product->sku }} name="sku" required>
                                                <div class="form-control-position">
                                                    <i class="la la-link"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4 mb-2">
                                            <label>Ancien Prix</label>
                                            <div class="position-relative has-icon-left">
                                                <input type="number" class="form-control"
                                                    placeholder="Ancien Prix du Produit" value={{ $product->old_price }} name="old_price" required>
                                                <div class="form-control-position">
                                                    <i class="la la-link"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-4 mb-2">
                                            <label>Prix</label>
                                            <div class="position-relative has-icon-left">
                                                <input type="number" class="form-control"
                                                    placeholder="Prix" name="price" value="{{ $product->price }}" required>
                                                <div class="form-control-position">
                                                    <i class="la la-tag"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4 mb-2">
                                            <label for="category-name">Categorie</label>
                                            <div class="position-relative has-icon-left">
                                                <select class="form-control" disabled>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ $category->id == $product->category->id ? 'selected' : ''}}
                                                            >{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="form-control-position">
                                                    <i class="la la-tag"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4 mb-2">
                                            <label>Quantité</label>
                                            <div class="position-relative has-icon-left">
                                                <input type="number" class="form-control"
                                                    placeholder="Quantité" name="quantity" value="{{ $product->quantity }}" required>
                                                <div class="form-control-position">
                                                    <i class="la la-tag"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="form-group col-md-6 mb-2">
                                            <label>Brève Description</label>
                                            <div class="position-relative has-icon-left">
                                                <textarea class="form-control" placeholder="Breve Description" name="brief_description" rows="3">{!! html_entity_decode($product->brief_description) !!}</textarea>
                                                <div class="form-control-position">
                                                    <i class="la la-tag"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <label>Description</label>
                                            <div class="position-relative has-icon-left">
                                                <textarea class="form-control" placeholder="Description" name="description" rows="3">{!! html_entity_decode($product->description) !!}</textarea>
                                                <div class="form-control-position">
                                                    <i class="la la-tag"></i>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <label>État du stock</label>
                                            <div class="position-relative has-icon-left">
                                                <select class="form-control" name="stock_status" required>
                                                    <option selected value="{{ $product->stock_status }}">{{ $product->stock_status == 'instock' ? 'En stock' : 'Rupture de stock'}}</option>
                                                    <option value="instock">En stock</option>
                                                    <option value="outstock">Rupture de stock</option>
                                                </select>
                                                <div class="form-control-position">
                                                    <i class="la la-tag"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <label for="sybcategory-name">Sous Categorie</label>
                                            <div class="position-relative has-icon-left">
                                                <select class="form-control" name="subcategory_id" required>
                                                    <option selected value="{{ $product->subcategory->id }}">{{ $product->subcategory->name }}</option>
                                                    @foreach ($subCategories as $subCategory)
                                                        <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="form-control-position">
                                                    <i class="la la-tag"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top: 1%; margin-bottom: 1%;">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <label>Marque</label>
                                                    <select id="brand_id" class="form-control" name="brand_id" style="margin-right: 25%;" required>
                                                        @if ($product->brand)
                                                            <option selected value="{{ $product->brand->id }}">{{ $product->brand->name }}</option>
                                                        @endif
                                                        @foreach ($brands as $brand)
                                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top: 1%; margin-bottom: 1%;">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input type="checkbox" name="selection" id="selection" class="form-check-input" {{ $product->selection ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="selection">Notre sélection</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input type="checkbox" name="top_ventes" id="top_ventes" class="form-check-input" {{ $product->top_ventes ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="top_ventes">Top Ventes</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input type="checkbox" name="nouveautes" id="nouveautes" class="form-check-input" {{ $product->nouveautes ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="nouveautes">Nouveautés</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning mr-1" data-dismiss="modal" onclick="removePreview({{ $category->id }})">
                        <i class="la la-times"></i> Fermer
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-save"></i> Modifier
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
