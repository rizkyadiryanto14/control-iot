const ctx = document.getElementById('myChart');

new Chart(ctx, {
	type: 'bar',
	data: {
		labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
		datasets: [{
			label: 'Bar Chart',
			data: [12, 19, 3, 5, 2, 3],
			borderWidth: 1,
			backgroundColor: [
				'rgba(255, 99, 132, 0.2)',
				'rgba(255, 159, 64, 0.2)',
				'rgba(255, 205, 86, 0.2)',
				'rgba(75, 192, 192, 0.2)',
				'rgba(54, 162, 235, 0.2)',
				'rgba(153, 102, 255, 0.2)',
				'rgba(201, 203, 207, 0.2)'
			],
		}]
	},
	options: {
		indexAxis: 'y',
		scales: {
			y: {
				beginAtZero: true
			}
		}
	}
});
