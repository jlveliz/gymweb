$(document).ready(function() {

    if ($('#permission-datatable').length) {
        $('#permission-datatable').DataTable({
            "language": {
                "url": "/public/js/datatables/json/es.json"
            },
            "columnDefs": [{
                "orderable": false,
                "targets": 4
            }],
            "orderable": false,
            "order": [
                [0, 'asc'],
                [1, 'asc'],
                [2, 'asc'],
                [3, 'asc']
            ],
            "responsive": true
        });
    }


    if ($(".delete-permission").length) {

        $(".delete-permission").on('click', function(event) {
            var permission = $(this).data('permission');
            var permissionId = $(this).data('id');
            $("#modal-delete").modal();
            $("#modal-delete > p#user_delete").text('');
            $("#permission_delete").text(permission);
            $("#modal-delete").find('form').attr('action', window.location.href + '/' + permissionId);
            event.preventDefault();
            /* Act on the event */
        });

    }

});
