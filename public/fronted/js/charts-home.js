"use strict";
document.addEventListener("DOMContentLoaded", function () {
    // Main Template Color


    var brandPrimary = "#33b35a";
    window.onload = function() {
        onload();

          };
    // ------------------------------------------------------- //
    // Line Chart
    // ------------------------------------------------------ //
    var LINECHART = document.getElementById("lineCahrt");
    var myLineChart = new Chart(LINECHART, {
        type: "line",
        options: {
            legend: {
                display: false,
            },
        },
        data: {
            labels: [],
            datasets: [
                {
                    label: "Purchase",
                    fill: true,
                    lineTension: 0.3,
                    backgroundColor: "rgba(77, 193, 75, 0.4)",
                    borderColor: brandPrimary,
                    borderCapStyle: "butt",
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: "miter",
                    borderWidth: 1,
                    pointBorderColor: brandPrimary,
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: brandPrimary,
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 0,
                    spanGaps: false,
                    data: [1],
                },
                {
                    label: "Sale",
                    fill: true,
                    lineTension: 0.3,
                    backgroundColor: "rgba(255,0,192,0.9)",
                    borderColor: "rgba(255,0,0,1)",
                    borderCapStyle: "butt",
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: "miter",
                    borderWidth: 1,
                    pointBorderColor: "rgba(75,192,192,1)",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(75,192,192,1)",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data:[1],
                    spanGaps: false,
                },
            ],
        },
    });

    // ------------------------------------------------------- //
    // Pie Chart
    // ------------------------------------------------------ //
    var PIECHART = document.getElementById("pieChart");
    var myPieChart = new Chart(PIECHART, {
        type: "doughnut",
        data: {
            labels: ["Deposit", "Withdraw"],
            datasets: [
                {
                    data: [2,3,],
                    borderWidth: [1, 1],
                    backgroundColor: [brandPrimary, "rgba(75,192,192,1)", "#FFCE56"],
                    hoverBackgroundColor: [brandPrimary, "rgba(75,192,192,1)", "#FFCE56"],
                },
            ],
        },
    });

    // ------------------------------------------------------- //
    // Pie Chart
    // ------------------------------------------------------ //
    var MONTHLYPROGRESS = document.getElementById("monthlyProgress");
    var myPieChart = new Chart(MONTHLYPROGRESS, {
        type: "doughnut",
        options: {
            cutoutPercentage: 93,
            responsive: true,
            maintainAspectRatio: true,
            legend: {
                display: false,
            },
        },
        data: {
            labels: ["First", "Second"],
            datasets: [
                {
                    data: [300, 50],
                    borderWidth: [1, 1],
                    backgroundColor: [brandPrimary, "#ffffff"],
                    hoverBackgroundColor: [brandPrimary, "#ffffff"],
                },
            ],
        },
    });


     function onload()  {

        $.get('/daily/data', function (data) {
            for (let i = 0; i < data.length; i++) {
                myLineChart.data.labels.push((i));
                if(data[i].details == "Selling  Product"){

                    myLineChart.data.datasets[1].data.push(data[i].balance);
                    console.log("ok");

                }else if(data[i].details == "Purchasing Product"){
                    myLineChart.data.datasets[0].data.push((-1*data[i].balance));

                }

                myLineChart.update();

            }


        });




     }





});
