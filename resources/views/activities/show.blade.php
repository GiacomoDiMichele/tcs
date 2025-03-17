
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="modal-edit" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

            <div  class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-edit">Modifica: </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('activities.update', ['activity' => ':id']) }}">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="" id="id-edit">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-static">
                                    <label>Codice attività</label>
                                    <input type="string" class="form-control" name="code_activity" max="200"  autocomplete="nope" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-static">
                                    <label>Nome</label>
                                    <input type="string" class="form-control" name="name" max="200"  autocomplete="nope" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-static">
                                    <label>Descrizione breve</label>
                                    <input type="string" class="form-control" name="description"  required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-static">
                                    <label>Data inizio</label>
                                    <input type="date" class="form-control" name="start_date"  required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-static">
                                    <label>Data fine</label>
                                    <input type="date" class="form-control" name="end_date"  required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_active" id="is_active" value="1" >
                                    <label class="form-check-label" for="type1">Attiva</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_active" id="is_not_active" value="0" >
                                    <label class="form-check-label" for="type2">Non attiva</label>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                    <button type="submit" class="btn bg-gradient-primary">Salva</button>
                </div>
                    </form>
            </div>


        </div>
    </div>


