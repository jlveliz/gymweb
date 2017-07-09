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


    if ($(".delete-category").length) {

        $(".delete-category").on('click', function(event) {
            var category = $(this).data('category');
            var categoryId = $(this).data('id');
            $("#modal-delete").modal();
            $("#modal-delete > p#category_delete").text('');
            $("#category_delete").text(category);
            $("#modal-delete").find('form').attr('action', window.location.href + '/' + categoryId);
            event.preventDefault();
            /* Act on the event */
        });

    }






});
