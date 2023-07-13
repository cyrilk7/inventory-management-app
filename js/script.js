$(document).ready(function(){
    $('.product-container .right .nav .search-box input[type="text"]').on("keyup input", function(){

        var  inpulVal = $(this).val();
        var resultDropdown = $(this).siblings(".results");

        if (inpulVal.length){
            resultDropdown.show();
            $.get("../controllers/search.php", {
                term: inpulVal
            }).done(function(data){
                resultDropdown.html(data);
            });
        }
        else{
            resultDropdown.empty();
            resultDropdown.hide();
        }
        
    });

    $(document).on("click", ".results h4", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});

function toggleMenu(){
    let subMenu = document.getElementById("subMenu");
    subMenu.classList.toggle("open-menu");
}

function generateChart(){

    const days = window.paymentData['day'];
    const counts = window.paymentData['count'];
    const months = window.monthlyData['month'];
    const monthlyCounts = window.monthlyData['count'];


    // const ctx = document.getElementById('lineChart').getContext('2d');
    new Chart('DailyChart', {
        type: 'line',
        data: {
            labels: days,
            datasets: [{
                label: 'Weekly Revenue',
                data: counts,
                fill: true,
                borderColor: '#2977B7',
                backgroundColor: 'rgba(54, 162, 235, 0.1)',
                // tension: 0.1
                lineTension: 0
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }]
            }
        }
    });

    new Chart('MonthlyChart', {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'Monthly Revenue',
                data: monthlyCounts,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(201, 203, 207, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(201, 203, 207, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(201, 203, 207, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                ],
                fill: false,
                borderColor: '#2977B7',
                borderWidth: 1,
                lineTension: 0
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }]
            }
        }
    });

}

