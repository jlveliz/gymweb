jQuery(document).ready(function($) {

    /*
        INDEX  
    */

    if ($('#membership-type-datatable').length) {
        $('#membership-type-datatable').DataTable({
            "language": {
                "url": '/public/js/datatables/json/es.json'
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
                [3, 'asc'],
            ],
            "responsive": true
        });
    }


    if ($(".delete-division").length) {

        $(".delete-division").on('click', function(event) {
            var division = $(this).data('division');
            var divisionId = $(this).data('id');
            $("#modal-delete").modal();
            $("#modal-delete > p#division_delete").text('');
            $("#division_delete").text(division);
            $("#modal-delete").find('form').attr('action', window.location.href + '/' + divisionId);
            event.preventDefault();
            /* Act on the event */
        });

    }






});
