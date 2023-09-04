const charts = [];

function createChart(canvasId, label, backgroundColor, borderColor) {
	const ctx = document.getElementById(canvasId).getContext('2d');
	const gradient = ctx.createLinearGradient(0, 0, 0, 400);
	gradient.addColorStop(0, 'rgba(75, 192, 192, 0.2)');
	gradient.addColorStop(1, 'rgba(255, 0, 0, 0.2)');

	const chart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: [],
			datasets: [{
				label: label,
				data: [],
				backgroundColor: backgroundColor,
				borderColor: borderColor,
				pointRadius: false,
				pointColor: '#3b8bba',
				pointStrokeColor: borderColor,
				pointHighlightFill: '#fff',
				pointHighlightStroke: borderColor,
			}],
		},
		options: salesChartOptions,
	});

	var salesChartOptions = {
		maintainAspectRatio: false,
		responsive: true,
		legend: {
			display: false
		},
		scales: {
			xAxes: [{
				gridLines: {
					display: false
				}
			}],
			yAxes: [{
				gridLines: {
					display: false
				}
			}]
		}
	}

	charts.push(chart);
}

createChart('field1Chart', 'Field 1', 'rgba(60,141,188,0.9)', 'rgba(60,141,188,0.8)');
createChart('field2Chart', 'Field 2', 'rgba(255,0,0,0.9)', 'rgba(255,0,0,0.8)');
createChart('field3Chart', 'Field 3', 'rgba(0,255,0,0.9)', 'rgba(0,255,0,0.8)');
createChart('field4Chart', 'Field 4', 'rgba(255,255,0,0.9)', 'rgba(255,255,0,0.8)');
createChart('field5Chart', 'Field 5', 'rgba(0,0,255,0.9)', 'rgba(0,0,255,0.8)');
createChart('field6Chart', 'Field 6', 'rgba(255,0,255,0.9)', 'rgba(255,0,255,0.8)');
createChart('field7Chart', 'Field 7', 'rgba(0,255,255,0.9)', 'rgba(0,255,255,0.8)');
createChart('field8Chart', 'Field 8', 'rgba(128,128,128,0.9)', 'rgba(128,128,128,0.8)');

function updateAllCharts() {
	const channelLinks = document.querySelector('.channel');
	const dataId = channelLinks.getAttribute('data-id');
	// console.log('data-id : ', dataId);

	const apiUrl = `http://localhost/control-iot/getJsonData/${dataId}`;

	fetch(apiUrl)
		.then(response => response.json())
		.then(data => {
			const createdDate = new Date(data.created_at);
			const timeLabel = `${createdDate.getHours()}:${createdDate.getMinutes()}`;

			const fieldData = [
				parseFloat(data.field1),
				parseFloat(data.field2),
				parseFloat(data.field3),
				parseFloat(data.field4),
				parseFloat(data.field5),
				parseFloat(data.field6),
				parseFloat(data.field7),
				parseFloat(data.field8)
			];

			charts.forEach((chart, index) => {
				chart.data.labels.push(timeLabel);
				chart.data.datasets[0].data.push(fieldData[index]);
				chart.update();
			});
		})
		.catch(error => {
			console.error('Error fetching data:', error);
		});
}

setInterval(updateAllCharts, 1500);
