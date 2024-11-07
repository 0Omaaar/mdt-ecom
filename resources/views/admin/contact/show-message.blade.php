<div class="modal text-left" style="margin-top: 0%" id="viewMessage{{ $contact->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel62">Voir Message de <b>{{ $contact->name }}</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <div class="form-body">
                                    <p>
                                        {{ $contact->message }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-dark" data-toggle="modal" data-target="#answerContact{{ $contact->id }}">
                        <i class="la la-pencil"></i> Répondre
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <i class="la la-times"></i> Fermer
                    </button>
                </div>
         </div>
    </div>
</div>


<div class="modal text-left" style="margin-top: 0%" id="answerContact{{ $contact->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel62">Répondre <b>{{ $contact->name }}</b></b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form" method="POST" action="{{ route('admin.contact.answer', $contact->id) }}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="card">
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <div class="form-body">
                                    <textarea name="response" class="form-control" placeholder="Votre Réponse Ici..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">
                        <i class="la la-save"></i> Répondre
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <i class="la la-times"></i> Fermer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
