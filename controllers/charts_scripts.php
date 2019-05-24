<?php
if(!function_exists('getChartScripts')){
	function getChartScripts(){
		include "basic_functions.php";
		?>
		<script>
			function getMonthName(month_number){
				var month_name = "";
				if(month_number == 1){
					month_name = "Jan";
				}else if(month_number == 2){
					month_name = "Feb";
				}else if(month_number == 3){
					month_name = "Mar";
				}else if(month_number == 4){
					month_name = "Apr";
				}else if(month_number == 5){
					month_name = "May";
				}else if(month_number == 6){
					month_name = "Jun";
				}else if(month_number == 7){
					month_name = "Jul";
				}else if(month_number == 8){
					month_name = "Aug";
				}else if(month_number == 9){
					month_name = "Sep";
				}else if(month_number == 10){
					month_name = "Oct";
				}else if(month_number == 11){
					month_name = "Nov";
				}else{
					month_name = "Dec";
				}

				return month_name;
			}
			function showRequestperMonth()
        {
            {
                $.post("controllers/RequestperDay_KPI.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var marks = [];

                   for (var i in data) {
                        marks.push(data[i]);
                    }

                    for(i = 1; i < 13; i++){
                        name.push(getMonthName(i));
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Number of Requests',
                                backgroundColor: '#85b4d0',
                                borderColor: '#85b4d0',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                lineTension: 0,
                                data: marks,
                                fill: false,
                                pointBackgroundColor: '#85b4d0'
                            }
                        ]
                    };

                    var graphTarget = $("#requestPerMonth");

                    var barGraph = new Chart(graphTarget, {
                        type: 'line',
                        data: chartdata,
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            legend: {
                                position: 'bottom',
                            },
                            hover: {
                                mode: 'label'
                            },
                            scales: {
                                xAxes: [{
                                        display: true,
                                        scaleLabel: {
                                            display: true,
                                            labelString: 'Month'
                                        }
                                    }],
                                yAxes: [{
                                        display: true,
                                        scaleLabel: {
                                            display: true,
                                            labelString: 'Number of Requests'
                                        },
                                        ticks: {
                                            beginAtZero: true,
                                            steps: 5,
                                            stepValue: 5,
                                            max: 50
                                        }
                                    }]
                            },
                            title: {
                                display: true,
                                text: 'Number of Requests Per Month'
                            }
                        }
                    });     
                });
            }
        }
        function showRequestByCategory()
        {
            {
                $.post("controllers/RequestByItem_KPI.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var marks = [];

                   for (var i in data) {
                        marks.push(data[i]);
                    }

                    name.push("Facilities");
                    name.push("Automobile");

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Number of Requests',
                                backgroundColor: '#85b4d0',
                                borderColor: '#85b4d0',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                lineTension: 0,
                                data: marks,
                                fill: false,
                                pointBackgroundColor: '#85b4d0'
                            }
                        ]
                    };

                    var graphTarget = $("#requestByCategory");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata,
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            legend: {
                                position: 'bottom',
                            },
                            hover: {
                                mode: 'label'
                            },
                            scales: {
                                xAxes: [{
                                        display: true,
                                        scaleLabel: {
                                            display: true,
                                            labelString: 'Category'
                                        }
                                    }],
                                yAxes: [{
                                        display: true,
                                        scaleLabel: {
                                            display: true,
                                            labelString: 'Number of Requests'
                                        },
                                        ticks: {
                                            beginAtZero: true,
                                            steps: 5,
                                            stepValue: 5,
                                            max: 50
                                        }
                                    }]
                            },
                            title: {
                                display: true,
                                text: 'Number of Requests By Category'
                            }
                        }
                    });     
                });
            }
        }
        function showservicesPerMonth()
        {
            {
                $.post("controllers/ServicesperMonth_KPI.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var marks = [];

                   for (var i in data) {
                        marks.push(data[i]);
                    }

                    for(i = 1; i < 13; i++){
                        name.push(getMonthName(i));
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Number of Services/Tickets',
                                backgroundColor: '#85b4d0',
                                borderColor: '#85b4d0',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                lineTension: 0,
                                data: marks,
                                fill: false,
                                pointBackgroundColor: '#85b4d0'
                            }
                        ]
                    };

                    var graphTarget = $("#servicesPerMonth");

                    var barGraph = new Chart(graphTarget, {
                        type: 'line',
                        data: chartdata,
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            legend: {
                                position: 'bottom',
                            },
                            hover: {
                                mode: 'label'
                            },
                            scales: {
                                xAxes: [{
                                        display: true,
                                        scaleLabel: {
                                            display: true,
                                            labelString: 'Month'
                                        }
                                    }],
                                yAxes: [{
                                        display: true,
                                        scaleLabel: {
                                            display: true,
                                            labelString: 'Number of Services/Tickets'
                                        },
                                        ticks: {
                                            beginAtZero: true,
                                            steps: 5,
                                            stepValue: 5,
                                            max: 50
                                        }
                                    }]
                            },
                            title: {
                                display: true,
                                text: 'Number of Services/Tickets Per Month'
                            }
                        }
                    });     
                });
            }
        }
		</script>
		<?php
	}
}
?>