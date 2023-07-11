

function toggleMenu(){
    let subMenu = document.getElementById("subMenu");
    subMenu.classList.toggle("open-menu");
}

// function generateChart(){

    
// }

// fetch('../models/payment_model.php?getPaymentStats')
// .then(response => response.json())
// .then(paymentData => {

    // const labels = paymentData.map(item => item.date);
    // const counts = paymentData.map(item => item.counts);

    // let itemsString = '';
    // // print("H");
    // paymentData.forEach((value, key) => {
    //   itemsString += `${key}: ${value}\n`;
    // });
    
    // // Display the items using an alert dialog
    // alert(itemsString);

    // // alert(labels);


    // const ctx = document.getElementById('lineChart').getContext('2d');
    // new Chart('lineChart', {
    //     type: AudioListener,
    //     data: {
    //         labels: labels,
    //         datasets: [{
    //             label: 'Number of Payments',
    //             data: counts,
    //             fill: false,
    //             borderColor: 'rgb(75, 192, 192)',
    //             tension: 0.1
    //         }]
    //     },
    //     options: {
    //         scales: {
    //             y: {
    //                 beginAtZero: true,
    //                 precision: 0
    //             }
    //         }
    //     }

    // });

// });
// 

// const labels = paymentData.map(item => item.date);
// const counts = paymentData.map(item => item.counts);
// var xhr = new XMLHttpRequest();
// xhr.open('GET', '../controllers/paymentController.php', true);
// xhr.onload = function(){
//     if (xhr.status === 200){
//         var myArray = JSON.parse(xhr.responseText);
//         // console.log(myArray.date);
//     }
// }
// var data = window.paymentData;
// console.log(window.paymentData['count']);
// var parsed = JSON.parse(data);
// console.log(parsed.date);
// var parsedData = JSON.parse(window.paymentData);
// console.log(parsedData);

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

// function toggleDatePicker() {
//     var datePicker = document.getElementById("PaymentPicker");
//     if (datePicker.style.display === "none") {
//       datePicker.style.display = "block";
//     } 
//     else {
//       datePicker.style.display = "none";
//     }
// }



// generateChart();