$(document).ready(function() {

    if ($("#date_from").length) {
        $("#date_from").datetimepicker({
            locale: "es",
            format: "YYYY-MM-DD",
            defaultDate: new Date(),
            maxDate: new Date((new Date()).setDate((new Date()).getDate())),
        });
    }

    if ($("#date_to").length) {
        $("#date_to").datetimepicker({
            locale: "es",
            format: "YYYY-MM-DD",
            defaultDate: new Date(),
            maxDate: new Date((new Date()).setDate((new Date()).getDate())),
        });
    }

    if ($("#member").length) {
        $("#member").selectize({
            reate: true,
            sortField: 'text',
            onChange: function(value) {
                $("#member_id").val(value)
            }
        });
    }

    if ($("#search_asistance").length) {
        $("#search_asistance").on('click', function(event) {
            var _this = $(this);
            event.preventDefault();
            _this.text('');
            _this.attr('disabled', true);
            _this.html('<i class="fa fa-spinner fa-spin"></i>');
            $("#member").attr('disabled', true);
            $("#date_from").attr('disabled', true);
            $("#date_to").attr('disabled', true);

            $.ajax({
                    url: '/admgym/admreports/get-assistance/',
                    type: 'GET',
                    data: $("#report-form-assistances").serialize()
                })
                .done(function(data) {

                    $("#assistance_results").html('');
                    var html = "";
                    if (data.length) {
                        for (var i = 0; i < data.length; i++) {
                            html += "<tr>";
                            html += "<td>" + data[i].name_member + "</td>"
                            html += "<td>" + data[i].email + "</td>"
                            html += "<td>" + data[i].counter + "</td>"
                            html += "</tr>";
                        }
                        $(".export-member").removeClass('disabled');

                    } else {
                        html += "<tr>";
                        html += "<td colspan='3' class='text-center'>No existen datos a mostrar, Seleccione los filtros para buscar.</td>";
                        html += "</tr>";

                        $(".export-member").addClass('disabled');

                    }

                    $("#assistance_results").append(html)
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    _this.text('');
                    _this.removeAttr('disabled', true);
                    _this.html('<i class="fa fa-search"></i> Buscar');
                });
        });
    }


    if ($(".export-member").length) {
        $(".export-member").on('click', function(event) {
            event.preventDefault();
            var format = $(this).data('format');
            var form = $("#report-form-assistances").serialize();
            window.open('/admgym/admreports/print-assistance/' + form + '&format='+format,'_blank')
        });        

    }



});
