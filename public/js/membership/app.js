$(document).ready(function() {

    if ($('#membership-type-datatable').length) {
        $('#membership-type-datatable').DataTable({
            "language": {
                "url": "/public/js/datatables/json/es.json"
            },
            "columnDefs": [{
                "orderable": false,
                "targets": 5
            }],
            "orderable": false,
            "order": [
                [1, 'asc'],
                [2, 'asc'],
                [3, 'asc'],
                [4, 'asc']
            ],
            "responsive": true

        });
    }


    if ($(".delete-member").length) {

        $(".delete-member").on('click', function(event) {
            var member = $(this).data('membership');
            var memberId = $(this).data('id');
            $("#modal-delete").modal();
            $("#modal-delete > p#member").text('');
            $("#membership_delete").text(member);
            $("#modal-delete").find('form').attr('action', window.location.href + '/' + memberId);
            event.preventDefault();
            /* Act on the event */
        });

    }


     /*
    CREATE - EDIT
    */
});
