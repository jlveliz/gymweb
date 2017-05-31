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
            var member = $(this).data('member');
            $("#modal-delete").modal();
            $("#modal-delete > p#member").text('');
            $("#member_delete").text(member);
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
            format: "YYYY-MM-DD",
            maxDate: new Date((new Date()).setDate((new Date()).getDate())),
        });

        $("#admission_date").datetimepicker({
            locale: "es",
            format: "YYYY-MM-DD",
            maxDate: new Date((new Date()).setDate((new Date()).getDate())),
        });
    }



    /******** PROFILE ********/
    if ($("#profile-section").length) {
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    // debugger;
                    $('.profile-img').css('background-image', 'url(' + e.target.result + ')');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#profile-section").on('click', function(event) {
            event.preventDefault();
            $("#file-profile-upload").click();
        });

        $("#file-profile-upload").on('change', function(event) {
            debugger;
            readURL(this);
            $("#form-update-photo").submit();

        });
    }
    /******** PROFILE ********/
});
