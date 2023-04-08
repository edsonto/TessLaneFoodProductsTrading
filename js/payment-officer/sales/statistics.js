$(document).ready(function() {
	function fetch_sales(labels, count, title) {
		var method = 'fetch_statistics';
		$.ajax({
			type: 'POST',
			data: {
				method: method,
			},
			url: '../../includes/payment-officer/sales/sales-list.php',
			dataType: 'JSON',
			success: function(data) {
				// alert(data)
				$('.sales-list').html(data.html)
				$('.sales-prediction-month').html(data.html2)
				$('.sales-prediction-year').html(data.html3)
				graph(data.labels, data.count, data.title)
			}
		});
	}
	fetch_sales();
	function graph(labels, count, title) {
		new Chart("myChart", {
		  type: "line",
		  data: {
		    labels: labels,
		    datasets: [{
		      data: count
		    }]
		  },
		  options: {
		    legend: {display: false},
		    title: {
		      display: true,
		      text: title
		    },
		    scales: {
		      yAxes: [{ticks: {min: 0}}],
		    }
		  },
		});
	}
	graph();
	
})