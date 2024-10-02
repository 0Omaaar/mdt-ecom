<div class="modal text-left" style="margin-top: 0%" id="showCategory{{ $subCategory->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel62">Informations sur la Categorie</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="form-body">

                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <label for="category-name">Nom de la Categorie</label>
                                            <div class="position-relative has-icon-left">
                                                <input type="text" id="category-name" class="form-control"
                                                    placeholder="Nom de la categorie" name="name" value="{{ $subCategory->category->name }}" disabled>
                                                <div class="form-control-position">
                                                    <i class="la la-tag"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <label for="category-name">Slug de la Categorie</label>
                                            <div class="position-relative has-icon-left">
                                                <input type="text" id="category-name" class="form-control"
                                                    placeholder="Nom de la categorie" name="name" value="{{ $subCategory->category->slug }}" disabled>
                                                <div class="form-control-position">
                                                    <i class="la la-tag"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <label for="category-name">Nombre De Sous Categories</label>
                                            <div class="position-relative has-icon-left">
                                                <input type="text" id="category-name" class="form-control"
                                                    placeholder="Nom de la categorie" name="name" value="{{ $subCategory->category->subCategories->count() }}" disabled>
                                                <div class="form-control-position">
                                                    <i class="la la-tag"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <label for="category-name">Nombre De Produits</label>
                                            <div class="position-relative has-icon-left">
                                                <input type="text" id="category-name" class="form-control"
                                                    placeholder="Nom de la categorie" name="name" value="{{ $subCategory->category->products->count() }}" disabled>
                                                <div class="form-control-position">
                                                    <i class="la la-tag"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="width: 70%; margin-left: 13%; margin-top: 4%">
                                        <div class="form-group col-md-12" style="border: 1px solid rgb(35, 168, 240); width: 65%">
                                            <img src="{{ asset('images/categories/' . $subCategory->category->image) }}"
                                             alt="Aperçu de l'image"
                                                style="max-width: 60%; height: auto; margin-left: 20%; padding: 10%" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning mr-1" data-dismiss="modal">
                        <i class="la la-times"></i> Fermer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
