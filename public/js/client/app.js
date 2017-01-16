jQuery(document).ready(function($) {

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
});
