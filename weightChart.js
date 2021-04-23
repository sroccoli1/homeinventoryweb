//*****************************************************************************

//-------------------- For the home page barcharts  ---------------------

//*********************************************************************


// Load the Visualization API and the corechart package.
google.charts.load('current', {'packages':['corechart']});

var occur; // The value must be first fetched from the server and used later drawing the chart

// Using a Promise to simulate a request to the server and waiting 3 sec to receive it
// The Promise guarantees it's done before drawing the chart
// See later in the comments why using just setTimeOut() does not work. 

let myPromise = new Promise(
	(resolve)=>{
		setTimeout(()=>{			// Simulate a request to the server and waiting 3 sec to receive it
				resolve(occur = 12);
			}, 3000); // when successful
});

// "Consuming Code" (Must wait for a fulfilled Promise)
myPromise.then(
	()=> google.charts.setOnLoadCallback(drawChart)   // Set a callback to run when the Google Visualization API is loaded.
);

// Callback that creates and populates 2 data tables,
// instantiates the bar charts, passes in the data and
// draws them.
function drawChart() {
	
	// Create the data table for the weight disbribution bar chart
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Weight range');
		data.addColumn('number', 'Occurence');

	// Set the weight occurence column style as a label on bars
	var view = new google.visualization.DataView(data);
	view.setColumns(
		[0, 1, {	
			sourceColumn: 1,
			role: "annotation"	}
		]
	);   

	// Using setTimeOut. 
	// The following does not work.
	// The chart is drawned before the time's up.

	// var myVar, occur;
	//   function serverDelay() {
	//   myVar = setTimeout(
	// 	()=>{ occur = 12;}, 3000);
	// }
	console.log("occur", occur);
	data.addRows([
		['0-7 kg', occur],
		['7-11 kg', 3],
		['11-13 kg', 4],
		['13-15 kg', 2],
		['15-20 kg', 0]
	]);
		
	// Set barchart options
	var options = {
		'title':'Weight distribution',
		'width': 400,
		'height': 300,
		'bar': {groupWidth: '75%'}, 
		axes: {
			x:{
				0: {side:'top'} // Top x-axis
			}
		},
		legend:{position:"none"}
	};

	// Instantiate and draw our barchart, passing in some options.
	// var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));
	// barchart.draw(view, options);

	// Create the data table for the total weight bar chart
	var data2 = new google.visualization.DataTable();

	data2.addColumn('string', 'Weight Unit');
	data2.addColumn('number', 'Current Weight');
	data2.addColumn('number', 'Target Weight');
	data2.addRows([['Max weight : 100 kg', 10, 90 ]]); // #b87333 could be another color
	
	// Set the bar chart options
	var onebarchart_options = {
		'title': 'Total load weight (in kg)',
		'width': 400,
		'height': 100,
		'isStacked': true,
		'bar': {groupWidth: '75%'}, 
		legend: {position:"none"}
	};

	// Set the total weight column style as a label on bars
	var onebarchart_view = new google.visualization.DataView(data2);
	onebarchart_view.setColumns(
		[0, 1, {	
			sourceColumn: 1,
			role: "annotation"	}, 
			2, {	
				sourceColumn: 2,
				role: "annotation"	}
		]
	);   
	
	// Instantiate and draw our stacked barchart, passing in some options.
	var onebarchart = new google.visualization.BarChart(document.getElementById('onebarchart_div'));
	onebarchart.draw(onebarchart_view, onebarchart_options);
}// end of callback