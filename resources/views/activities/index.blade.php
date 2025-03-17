@extends('layouts.app')



@section('content')
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-lg-flex">
                    <div>
                        <h5 class="mb-0">Lista attività</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="material-datatables">
                    <table id="table_list" class="js-grid table table-no-bordered table-hover table-show" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                        <tr>

                            <th>Codice attività</th>
                            <th>Nome</th>
                            <th>Descrizione breve</th>
                            <th>Data inizio</th>
                            <th>Data fine</th>
                            <th>Attiva</th>
                            <th>Azioni</th>

                        </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </div>
        <!-- Modal -->

        @include('activities.create')
        @include('activities.show')
        @include('activities.delete')
        @include('activities.filter')

@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            //create modal
            $(document).on("click", ".js-open-modal", function() {
                $("#addActivityModal").modal("show");
            });

            //open filter modal
            $(document).on("click", "#openFilterModal", function() {
                $("#filterModal").modal("show");
            });

            //back from delete modal
            $(document).on("click", "#back-delete", function() {
                $('#modal-delete').modal('hide');
            });

            //show edit modal
            $(document).on("click", ".js-edit-modal", function() {
                var id = $(this).data("id");
                var url = "{{ route('activities.show', ['__id__']) }}";
                url = url.replace('__id__', id);
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(data) {
                        console.log(data);
                        $("#modal-edit .modal-title").text("Modifica attività: " + data.name);
                        $("input[name='code_activity']").val(data.code_activity);
                        $("input[name='name']").val(data.name);
                        $("input[name='description']").val(data.description);
                        $("input[name='start_date']").val(data.start_date);
                        $("input[name='end_date']").val(data.end_date);
                        $("#is_active").prop('checked', data.is_active == 1 ? true : false);
                        $("#is_not_active").prop('checked', data.is_active == 0 ? true : false);
                        $("#id-edit").val(data.id);
                        var formAction = "{{ route('activities.update', ['activity' => ':id']) }}";
                        formAction = formAction.replace(':id', data.id);
                        $("form").attr("action", formAction);
                        $("#modal-edit").modal("show");
                    }
                });
            });

            //open delete modal
            $(document).on("click", ".js-open-delete-modal", function() {
                $("#modal-delete").modal("show");
                $("#confirm-delete").data("id", $(this).data("id"));
            });

            //function to delete activity
            $("#confirm-delete").click(function() {
                var id = $(this).data("id");
                var url = "{{ route('activities.delete', ['__id__']) }}";
                url = url.replace('__id__', id);
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {_token: '{{csrf_token()}}', id: id},
                    success: function(data) {
                        $("#modal-delete").modal("hide");
                        table.ajax.reload();}
                });
            });

            //datatable general list
            var table = $("#table_list").DataTable({
                ajax: {
                    url:'{{ route('activities.datatable') }}',
                },
                columns: [
                    {data:"code_activity", name:"code_activity"},
                    {data:"name", name:"name"},
                    {data:"description", name:"description"},
                    {
                        data: null,
                        name: "start_date",
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            if (row.start_date != null) {
                                var date = new Date(row.start_date);
                                return `${date.toLocaleDateString('it-IT')}`;
                            } else {
                                return 'Data non inserita';
                            }
                        }
                    },
                    {
                        data: null,
                        name: "end_date",
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            if (row.end_date != null) {
                                var date = new Date(row.end_date);
                                return `${date.toLocaleDateString('it-IT')}`;
                            } else {
                                return 'Data non inserita';
                            }
                        }
                    },
                    {
                        data: null,
                        name: "is_active",
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return row.is_active == 1 ? 'Si' : 'No';
                        }
                    },
                    {
                        data: null,
                        name: "actions",
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return `<button class="btn btn-sm btn-primary js-edit-modal" data-id="${row.id}" data-allData="${row}">Modifica</button>
                                    <button class="btn btn-sm btn-danger js-open-delete-modal" data-id="${row.id}">Elimina</button>`;
                        }
                    }
                ],

                sDom: '<"dataTables__top"lfBr>t<"dataTables__bottom"ip><"clear">',
                initComplete: function(a, b) {
                    $(this).closest(".dataTables_wrapper").find(".dataTables__top")
                        .prepend('<div class="dataTables_buttons actions">' +
                            '<a href="javascript:void(0)" class="actions__item" title="@lang("datatable.print")" data-table-action="print" ><i class="material-icons">print</i></a>'+
                            '<a href="javascript:void(0)" class="actions__item" title="@lang("datatable.export")" data-table-action="excel" ><i class="material-icons">cloud_download</i></a>'+
                            '<a href="javascript:void(0)" class="actions__item" id="openFilterModal" title="@lang("datatable.filter")" data-table-action="modal" data-target="#filterModal"><i class="material-icons">filter_list</i></a>'+

                            '</div>');

                            $(this).closest(".dataTables_wrapper").find(".dataTables__top")
                                .prepend('<div class="dataTables_buttons actions">' +
                                    // '<a href="javascript:void(0)" class="actions__item text-danger js-delete" title="@lang('datatable.del')" data-list="table_list" data-url=""><i class="material-icons">delete</i></a>' +
                                    '<a href="javascript:void(0)" class="actions__item text-primary js-open-modal" title="Aggiungi Attività"><i class="material-icons">add_box</i></a>' +
                                '</div>');
                    jsgrid();
                },
                "drawCallback":function(){
                    jsgrid();
                    $('#selAll').prop('checked',false);
                },
                columnDefs: [
                    {

                    }
                ],
            });
        });
    </script>

@endpush
