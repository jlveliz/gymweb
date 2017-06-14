$(document).ready(function() {
    var ctx = $("#myChart");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: $("#dates").val(),
            datasets: [{
                label: '# Asistencias del mes',
                data: $("#counters").val(),
                backgroundColor: [
                    'rgba(231, 43, 43, 0.5)',
                    'rgba(231, 43, 43, 0.5)',
                    'rgba(231, 43, 43, 0.5)',
                    'rgba(231, 43, 43, 0.5)',
                    'rgba(231, 43, 43, 0.5)',
                    'rgba(231, 43, 43, 0.5)'
                ],
                borderColor: [
                    'rgba(231, 43, 43, 0.2)',
                    'rgba(231, 43, 43, 0.2)',
                    'rgba(231, 43, 43, 0.2)',
                    'rgba(231, 43, 43, 0.2)',
                    'rgba(231, 43, 43, 0.2)',
                    'rgba(231, 43, 43, 0.2)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
});
