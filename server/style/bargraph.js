$(document).ready(function(){
	$.ajax({
		url: "barData.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var student = [];
			var Percentage = [];

			for(var i in data) {
				student.push("students " + data[i].stdAddNum);
				Percentage.push(data[i].Percentage);
			}

			var chartdata = {
				labels: student,
				datasets : [
					{
						label: 'student Percentage',
						backgroundColor: 'rgba(255, 200, 200, 0.75)',
						borderColor: 'rgba(255, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: Percentage
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});