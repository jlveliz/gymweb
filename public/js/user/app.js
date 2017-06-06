$(document).ready(function() {

    if ($('#user-datatable').length) {
        $('#user-datatable').DataTable({
            "language": {
                "url": "/public/js/datatables/json/es.json"
            },
            "columnDefs": [{
                "orderable": false,
                "targets": 3
            }],
            "orderable": false,
            "order": [
                [1, 'asc'],
                [2, 'asc'],
                [3, 'asc']
            ],
            "responsive": true
        });
    }

    if ($(".delete-user").length) {

        $(".delete-user").on('click', function(event) {
            var user = $(this).data('user');
            var userId = $(this).data('id');
            $("#modal-delete").modal();
            $("#modal-delete > p#user_delete").text('');
            $("#user_delete").text(user);
            $("#modal-delete").find('form').attr('action', window.location.href + '/' + userId);
            event.preventDefault();
            /* Act on the event */
        });

    }


});
