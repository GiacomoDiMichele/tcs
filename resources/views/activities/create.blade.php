<div class="modal fade" id="addActivityModal" tabindex="-1" aria-labelledby="addActivityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addActivityModalLabel">Aggiungi un'attività'</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('activities.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group input-group-static">
                                <label>Codice attività</label>
                                <input type="string" class="form-control" name="code_activity" max="200" value="{{ old('code_activity') }}" autocomplete="nope" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-static">
                                <label>Nome</label>
                                <input type="string" class="form-control" name="name" max="200" value="{{ old('name') }}" autocomplete="nope" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-static">
                                <label>Descrizione breve</label>
                                <input type="string" class="form-control" name="description" value="{{ old('description') }}" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-static">
                                <label>Data inizio</label>
                                <input type="date" class="form-control" name="start_date" value="{{ old('start_date') }}" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-static">
                                <label>Data fine</label>
                                <input type="date" class="form-control" name="end_date" value="{{ old('end_date') }}" >
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="is_active" id="type1" value="1" checked>
                                <label class="form-check-label" for="type1">Attiva</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="is_active" id="type2" value="0">
                                <label class="form-check-label" for="type2">Non attiva</label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button class="btn bg-gradient-primary m-0 ms-2">Crea</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

