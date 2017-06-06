$(document).ready(function() {

    if ($('#role-datatable').length) {
        $('#role-datatable').DataTable({
            "language": {
                "url": "{{ asset('public//js/datatables/json/es.json') }}"
            }
        });
    }


    if ($(".delete-role").length) {

        $(".delete-role").on('click', function(event) {
            var role = $(this).data('role');
            var roleId = $(this).data('id');
            $("#modal-delete").modal();
            $("#modal-delete > p#user_delete").text('');
            $("#role_delete").text(role);
            $("#modal-delete").find('form').attr('action', window.location.href + '/' + roleId);
            event.preventDefault();
            /* Act on the event */
        });

    }

});
