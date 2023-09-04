// Example feed data
const feeds = [
	{id_channel: 1, id_user: 1, value: 10},
	{id_channel: 1, id_user: 2, value: 20},
	{id_channel: 2, id_user: 1, value: 30},
	{id_channel: 2, id_user: 2, value: 40},
	{id_channel: 1, id_user: 1, value: 10},
	{id_channel: 1, id_user: 2, value: 20},
	{id_channel: 2, id_user: 1, value: 30},
	{id_channel: 2, id_user: 2, value: 40},

];

// Get data for each field
const field1Data = feeds.filter(item => item.id_channel === 1 && item.id_user === 1).map(item => item.value);
const field2Data = feeds.filter(item => item.id_channel === 1 && item.id_user === 2).map(item => item.value);
// etc for other fields

// Chart config
const chartConfig = {
	type: 'line',
	data: {
		labels: ['Label 1', 'Label 2', 'Label 3'],
		datasets: [{
			label: 'My Dataset',
			data: [],
			fill: false
		}]
	},
	options: {
		responsive: true
	}
};

// Create charts
const field1Chart = createChart('field1Chart', field1Data);
const field2Chart = createChart('field2Chart', field2Data);

// etc for other fields

function createChart(canvasId, data) {
	// Get canvas
	const ctx = document.getElementById(canvasId).getContext('2d');

	// Populate chart with data
	const chart = Object.create(chartConfig);
	chart.data.datasets[0].data = data;

	// Create chart
	new Chart(ctx, chart);

	return chart;
}
