<div class="modal text-left" style="margin-top: 0%" id="editCategory{{ $category->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel62">Modifier Categorie</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form" method="POST" action="{{ route('admin.categories.update', $category->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="card">
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <div class="form-body">

                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <label for="category-name">Nom</label>
                                            <div class="position-relative has-icon-left">
                                                <input type="text" id="category-name" class="form-control"
                                                    placeholder="Nom de la categorie" value="{{ $category->name }}" name="name">
                                                <div class="form-control-position">
                                                    <i class="la la-tag"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <label for="category-slug">Slug</label>
                                            <div class="position-relative has-icon-left">
                                                <input type="text" id="category-slug" class="form-control"
                                                    placeholder="Slug de la categorie" value={{ $category->slug }} name="slug">
                                                <div class="form-control-position">
                                                    <i class="la la-link"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12 mb-2">
                                            <label for="category-image">Image</label>
                                            <input type="file" id="category-image" name="image"
                                                class="form-control custom-file-input" onchange="previewImage(event, {{ $category->id }})">
                                            <label class="custom-file-label" for="category-image"
                                                style="width: 94%; margin-left: 3%;">Choisir une image</label>
                                        </div>
                                    </div>

                                    <div class="row" style="width: 70%; margin-left: 13%">
                                        <div class="form-group col-md-12" style="border: 1px solid rgb(35, 168, 240); width: 65%">
                                            <img id="image-preview-{{ $category->id }}" src="{{ asset('images/categories/' . $category->image) }}"
                                                alt="Aperçu de l'image" style="max-width: 50%; height: auto; margin-left: 20%" />
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
