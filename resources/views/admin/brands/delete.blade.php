<div class="modal text-left" style="margin-top: 0%" id="deleteBrand{{ $brand->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel62">Supprimer Marque</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form" method="POST" action="{{ route('admin.brands.destroy', $brand->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="card">
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <div class="form-body">

                                    <p>Êtes-vous sûr de vouloir supprimer la marque
                                        <strong>{{ $brand->name }}</strong> ?
                                         <span style=" color: rgb(226, 79, 79); font-weight: bold;">Cette action est irréversible.</span></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning mr-1" data-dismiss="modal">
                        <i class="la la-times"></i> Fermer
                    </button>
                    <button type="submit" class="btn btn-danger">
                        <i class="la la-trash"></i> Supprimer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
