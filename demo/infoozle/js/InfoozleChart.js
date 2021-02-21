/* 
Tittle: GENERATE CHART
By: Francisco Garcia
Date: 04-08-2020
*/

//CONVERT XLS TO JSON AND VALID METADATA
var url = "xls/test.xlsx";
var xhttp = new XMLHttpRequest();
xhttp.open("GET", url, true);
xhttp.responseType = "arraybuffer";
xhttp.onload = function (e) {
    var data = readData();
    var cloneData = '';
    for (let index = 0; index < data.length; index++) {
        let res = document.getElementById('state');
        if (data[index].state === cloneData) {} else {
            res.innerHTML += `<option value="${data[index]
                .state}">${data[index]
                .state}</option>`;
            cloneData = data[index].state;

        }
    }
    //SEARCH STATE EVENT ONCHANGE
    document.getElementById('state').addEventListener('change', function () {
            var countyResult = document.getElementById('state')
                .value;
            let res = document.getElementById('county');
            res.innerHTML = '';
            for (let index = 0; index < data.length; index++) {
                if (data[index].state === countyResult) {
                    document
                        .getElementById('county')
                        .innerHTML += `<option value="${data[index]
                        .county}">${data[index]
                        .county}</option>`
                }
            }
        })
    //EVENT ONLCLICK IN BUTTON SEARCH AND GENERATE CHART
    document.getElementById('serachCovidUSA').addEventListener('click', function () {
            var stateSelect = document
                .getElementById('state')
                .value;
            var countySelect = document
                .getElementById('county')
                .value;
            if(stateSelect === '' || countySelect ===''){
                document.getElementById('error').innerHTML =` 
                <div class="alert alert-danger" role="alert">
                    Select the fields
                </div>`
            }else{
                getChart(stateSelect, countySelect, readData());
                document.getElementById('error').innerHTML =` 
                <div class="alert alert-primary" role="alert">
                    Success
                </div>`   
            }
        })
    //FUNCTION GENERATE CHART
    function getChart(stateValue, countyValue, data) {
        for (let index = 0; index < data.length; index++) {
            if (data[index].state === stateValue && data[index].county === countyValue) {
                var chartresult = document.getElementById('myChartCases');
                var chartresult = document
                    .getElementById('myChartCases')
                    .getContext('2d');
                var myChartCases = new Chart(chartresult, {
                    type: 'bar',
                    data: {
                        labels: [data[index].county],
                        datasets: [
                            {
                                label: 'Cases',
                                data: [data[index].cases],
                                backgroundColor: ['rgba(255, 99, 132, 0.2)'],
                                borderColor: ['rgba(255, 99, 132, 1)'],
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        scales: {
                            yAxes: [
                                {
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }
                            ]
                        }
                    }
                });
                var chartresult = document.getElementById('myChartConfirmedCases');
                var chartresult = document
                    .getElementById('myChartConfirmedCases')
                    .getContext('2d');
                var myChartCases = new Chart(chartresult, {
                    type: 'bar',
                    data: {
                        labels: [data[index].county],
                        datasets: [
                            {
                                label: 'Confirmed Cases',
                                data: [data[index].confirmed_cases],
                                backgroundColor: ['rgba(255, 99, 132, 0.2)'],
                                borderColor: ['rgba(255, 99, 132, 1)'],
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        scales: {
                            yAxes: [
                                {
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }
                            ]
                        }
                    }
                });
                var chartresult = document.getElementById('myChartDeaths');
                var chartresult = document
                    .getElementById('myChartDeaths')
                    .getContext('2d');
                var myChartConfirmedCases = new Chart(chartresult, {
                    type: 'bar',
                    data: {
                        labels: [data[index].county],
                        datasets: [
                            {
                                label: 'Deaths',
                                data: [data[index].deaths],
                                backgroundColor: ['rgba(255, 99, 132, 0.2)'],
                                borderColor: ['rgba(255, 99, 132, 1)'],
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        scales: {
                            yAxes: [
                                {
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }
                            ]
                        }
                    }
                });
                var chartresult = document.getElementById('myChartConfirmedDeaths');
                var chartresult = document
                    .getElementById('myChartConfirmedDeaths')
                    .getContext('2d');
                var myChartCases = new Chart(chartresult, {
                    type: 'bar',
                    data: {
                        labels: [data[index].county],
                        datasets: [
                            {
                                label: 'Confirmed Deaths',
                                data: [data[index].confirmed_deaths],
                                backgroundColor: ['rgba(255, 99, 132, 0.2)'],
                                borderColor: ['rgba(255, 99, 132, 1)'],
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        scales: {
                            yAxes: [
                                {
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }
                            ]
                        }
                    }
                });
                var chartresult = document.getElementById('myChartProbableCases');
                var chartresult = document
                    .getElementById('myChartProbableCases')
                    .getContext('2d');
                var myChartCases = new Chart(chartresult, {
                    type: 'bar',
                    data: {
                        labels: [data[index].county],
                        datasets: [
                            {
                                label: 'Probable Cases',
                                data: [data[index].probable_cases],
                                backgroundColor: ['rgba(255, 99, 132, 0.2)'],
                                borderColor: ['rgba(255, 99, 132, 1)'],
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        scales: {
                            yAxes: [
                                {
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }
                            ]
                        }
                    }
                });
                var chartresult = document.getElementById('myChartProbableDeaths');
                var chartresult = document
                    .getElementById('myChartProbableDeaths')
                    .getContext('2d');
                var myChartCases = new Chart(chartresult, {
                    type: 'bar',
                    data: {
                        labels: [data[index].county],
                        datasets: [
                            {
                                label: 'Probable Deaths',
                                data: [data[index].probable_deaths],
                                backgroundColor: ['rgba(255, 99, 132, 0.2)'],
                                borderColor: ['rgba(255, 99, 132, 1)'],
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        scales: {
                            yAxes: [
                                {
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }
                            ]
                        }
                    }
                });
            }

        }
    }
    function readData() {
        var arraybuffer = xhttp.response;
        var data = new Uint8Array(arraybuffer);
        var arr = new Array();
        for (var i = 0; i != data.length; ++i) 
            arr[i] = String.fromCharCode(data[i]);
        var bstr = arr.join("");
        var workbook = XLSX.read(bstr, {type: "binary"});
        var first_sheet_name = workbook.SheetNames[0];
        var worksheet = workbook.Sheets[first_sheet_name];
        var data = XLSX
            .utils
            .sheet_to_json(worksheet, {raw: true});
        return data;
    }
}

xhttp.send();