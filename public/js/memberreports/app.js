$(document).ready(function() {
	
	if ($("#date_from").length) {
		 $("#date_from").datetimepicker({
            locale: "es",
            format: "YYYY-MM-DD",
            maxDate: new Date((new Date()).setDate((new Date()).getDate())),
        });
	}

	if ($("#date_to").length) {
		 $("#date_to").datetimepicker({
            locale: "es",
            format: "YYYY-MM-DD",
            maxDate: new Date((new Date()).setDate((new Date()).getDate())),
        });
	}

});