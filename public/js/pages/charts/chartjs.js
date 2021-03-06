$(function () {
    new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
    new Chart(document.getElementById("line_chart1").getContext("2d"), getChartJs('line1'));
    new Chart(document.getElementById("line_chart2").getContext("2d"), getChartJs('line2'));
    new Chart(document.getElementById("line_chart3").getContext("2d"), getChartJs('line3'));
    new Chart(document.getElementById("line_chart4").getContext("2d"), getChartJs('line4'));
    // new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar'));
    // new Chart(document.getElementById("radar_chart").getContext("2d"), getChartJs('radar'));
    // new Chart(document.getElementById("pie_chart").getContext("2d"), getChartJs('pie'));
});

function getChartJs(type) {

    var config = null;

    if (type === 'line') {
        config = {
            type: 'line',
            data: {
                labels: ["Day 1", "Day 2", "Day 3", "Day 4", "Day 5", "Day 6", "Day 7"],
                datasets: [{
                    label: "Individual",
                    data: [87, 59, 80, 81, 56, 55, 40],
                    borderColor: 'rgba(13, 71, 161, 0.75)',
                    backgroundColor: 'rgba(68, 138, 255, 0.3)',
                    pointBorderColor: 'rgba(13, 71, 161, 0)',
                    pointBackgroundColor: 'rgba(13, 71, 161, 0.9)',
                    pointBorderWidth: 2
                }, {
                        label: "Company",
                        data: [28, 48, 40, 19, 86, 27, 90],
                        borderColor: 'rgba(239, 83, 80, 0.75)',
                        backgroundColor: 'rgba(255, 138, 128, 0.3)',
                        pointBorderColor: 'rgba(239, 83, 80, 0)',
                        pointBackgroundColor: 'rgba(239, 83, 80, 0.9)',
                        pointBorderWidth: 2
                    }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    else if (type === 'line1') {
        config = {
            type: 'line',
            data: {
                labels: ["Week 1", "Week 2", "Week 3", "Week 4"],
                datasets: [{
                    label: "Individual",
                    data: [65, 59, 80, 81, 56, 55, 40],
                    borderColor: 'rgba(13, 71, 161, 0.75)',
                    backgroundColor: 'rgba(68, 138, 255, 0.3)',
                    pointBorderColor: 'rgba(13, 71, 161, 0)',
                    pointBackgroundColor: 'rgba(13, 71, 161, 0.9)',
                    pointBorderWidth: 2
                }, {
                        label: "Company",
                        data: [28, 48, 40, 19, 86, 27, 90],
                        borderColor: 'rgba(239, 83, 80, 0.75)',
                        backgroundColor: 'rgba(255, 138, 128, 0.3)',
                        pointBorderColor: 'rgba(239, 83, 80, 0)',
                        pointBackgroundColor: 'rgba(239, 83, 80, 0.9)',
                        pointBorderWidth: 2
                    }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    else if (type === 'line2') {
        config = {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                datasets: [{
                    label: "Individual",
                    data: [65, 59, 80, 81, 56, 55, 40],
                    borderColor: 'rgba(13, 71, 161, 0.75)',
                    backgroundColor: 'rgba(68, 138, 255, 0.3)',
                    pointBorderColor: 'rgba(13, 71, 161, 0)',
                    pointBackgroundColor: 'rgba(13, 71, 161, 0.9)',
                    pointBorderWidth: 2
                }, {
                        label: "Company",
                        data: [28, 48, 40, 19, 86, 27, 90],
                        borderColor: 'rgba(239, 83, 80, 0.75)',
                        backgroundColor: 'rgba(255, 138, 128, 0.3)',
                        pointBorderColor: 'rgba(239, 83, 80, 0)',
                        pointBackgroundColor: 'rgba(239, 83, 80, 0.9)',
                        pointBorderWidth: 2
                    }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    else if (type === 'line3') {
        config = {
            type: 'line',
            data: {
                labels: ["1st Quarter", "2nd Quarter", "3rd Quarter", "4th Quarter"],
                datasets: [{
                    label: "Individual",
                    data: [65, 59, 80, 81, 56, 55, 40],
                    borderColor: 'rgba(13, 71, 161, 0.75)',
                    backgroundColor: 'rgba(68, 138, 255, 0.3)',
                    pointBorderColor: 'rgba(13, 71, 161, 0)',
                    pointBackgroundColor: 'rgba(13, 71, 161, 0.9)',
                    pointBorderWidth: 2
                }, {
                        label: "Company",
                        data: [28, 48, 40, 19, 86, 27, 90],
                        borderColor: 'rgba(239, 83, 80, 0.75)',
                        backgroundColor: 'rgba(255, 138, 128, 0.3)',
                        pointBorderColor: 'rgba(239, 83, 80, 0)',
                        pointBackgroundColor: 'rgba(239, 83, 80, 0.9)',
                        pointBorderWidth: 2
                    }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    else if (type === 'line4') {
        config = {
            type: 'line',
            data: {
                labels: ["2015", "2016", "2017"],
                datasets: [{
                    label: "Individual",
                    data: [65, 59, 80, 81, 56, 55, 40],
                    borderColor: 'rgba(13, 71, 161, 0.75)',
                    backgroundColor: 'rgba(68, 138, 255, 0.3)',
                    pointBorderColor: 'rgba(13, 71, 161, 0)',
                    pointBackgroundColor: 'rgba(13, 71, 161, 0.9)',
                    pointBorderWidth: 2
                }, {
                        label: "Company",
                        data: [28, 48, 40, 19, 86, 27, 90],
                        borderColor: 'rgba(239, 83, 80, 0.75)',
                        backgroundColor: 'rgba(255, 138, 128, 0.3)',
                        pointBorderColor: 'rgba(239, 83, 80, 0)',
                        pointBackgroundColor: 'rgba(239, 83, 80, 0.9)',
                        pointBorderWidth: 2
                    }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    // else if (type === 'bar') {
    //     config = {
    //         type: 'bar',
    //         data: {
    //             labels: ["January", "February", "March", "April", "May", "June", "July"],
    //             datasets: [{
    //                 label: "My First dataset",
    //                 data: [65, 59, 80, 81, 56, 55, 40],
    //                 backgroundColor: 'rgba(0, 188, 212, 0.8)'
    //             }, {
    //                     label: "My Second dataset",
    //                     data: [28, 48, 40, 19, 86, 27, 90],
    //                     backgroundColor: 'rgba(233, 30, 99, 0.8)'
    //                 }]
    //         },
    //         options: {
    //             responsive: true,
    //             legend: false
    //         }
    //     }
    // }
    // else if (type === 'radar') {
    //     config = {
    //         type: 'radar',
    //         data: {
    //             labels: ["January", "February", "March", "April", "May", "June", "July"],
    //             datasets: [{
    //                 label: "My First dataset",
    //                 data: [65, 25, 90, 81, 56, 55, 40],
    //                 borderColor: 'rgba(0, 188, 212, 0.8)',
    //                 backgroundColor: 'rgba(0, 188, 212, 0.5)',
    //                 pointBorderColor: 'rgba(0, 188, 212, 0)',
    //                 pointBackgroundColor: 'rgba(0, 188, 212, 0.8)',
    //                 pointBorderWidth: 1
    //             }, {
    //                     label: "My Second dataset",
    //                     data: [72, 48, 40, 19, 96, 27, 100],
    //                     borderColor: 'rgba(233, 30, 99, 0.8)',
    //                     backgroundColor: 'rgba(233, 30, 99, 0.5)',
    //                     pointBorderColor: 'rgba(233, 30, 99, 0)',
    //                     pointBackgroundColor: 'rgba(233, 30, 99, 0.8)',
    //                     pointBorderWidth: 1
    //                 }]
    //         },
    //         options: {
    //             responsive: true,
    //             legend: false
    //         }
    //     }
    // }
    // else if (type === 'pie') {
    //     config = {
    //         type: 'pie',
    //         data: {
    //             datasets: [{
    //                 data: [225, 50, 100, 40],
    //                 backgroundColor: [
    //                     "rgb(233, 30, 99)",
    //                     "rgb(255, 193, 7)",
    //                     "rgb(0, 188, 212)",
    //                     "rgb(139, 195, 74)"
    //                 ],
    //             }],
    //             labels: [
    //                 "Pink",
    //                 "Amber",
    //                 "Cyan",
    //                 "Light Green"
    //             ]
    //         },
    //         options: {
    //             responsive: true,
    //             legend: false
    //         }
    //     }
    // }
    return config;
}