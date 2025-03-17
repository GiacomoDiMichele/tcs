<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel">Filtraggio avanzato</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">    
                <div class="form-check form-switch">
                    <label class="" for="">Mostra / Nascondi attività chiuse</label>
                    <input class="mt-1 form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="back-delete" onclick="closeFilter()" data-dismiss="modal">Annulla</button>
                <button  type="button" class="btn btn-warning" id="all" data-dismiss="modal" onclick="filterDelete()">Reset / Mostra tutti</button>
                <button  type="button" class="btn btn-info" id="confirm" data-dismiss="modal" onclick="filter()">Salva</button>
            </div>
        </div>
    </div>
</div>
<script>
    function filter() {
        let isChecked = $("#flexSwitchCheckDefault").prop("checked");
        console.log(isChecked);
        let table = $("#table_list").DataTable();
        let url = "{{ route('activities.datatableFiltered', ['show_closed' => '__CHECKED__']) }}";
        url = url.replace("__CHECKED__", isChecked); 
        table.ajax.url(url).load();
        $("#filterModal").modal("hide");
    }

    function filterDelete() {
        let table = $("#table_list").DataTable();
        table.ajax.url("{{ route('activities.datatable') }}").load();
        $("#filterModal").modal("hide");
    }

    function closeFilter(){
        $("#filterModal").modal("hide");
    }
</script>
