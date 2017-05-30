jQuery(document).ready(function($) {

    /*
        INDEX  
    */

    if ($('#member-datatable').length) {
        $('#member-datatable').DataTable({
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
                [3, 'asc']
            ],
            "responsive": true
        });
    }

    if ($(".delete-member").length) {

        $(".delete-member").on('click', function(event) {
            console.log($(this).data('member'));
            $("#modal-delete").modal();
            event.preventDefault();
            /* Act on the event */
        });

        $("#modal-delete").on('show.bs.modal', function(event) {
            console.log(event);
        });



    }

    /*
    CREATE - EDIT
    */
    if ($("#birth_date").length) {
        $("#birth_date").datetimepicker({
            locale: "es",
            format: "YYYY/M/D",
            maxDate: new Date((new Date()).setDate((new Date()).getDate())),
        });

        $("#admission_date").datetimepicker({
            locale: "es",
            format: "YYYY/M/D",
            maxDate: new Date((new Date()).setDate((new Date()).getDate())),
        });
    }
});
