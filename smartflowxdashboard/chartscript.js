// Set up margins and dimensions
var margin = { top: 20, right: 20, bottom: 30, left: 40 };
var width = 600 - margin.left - margin.right;
var height = 400 - margin.top - margin.bottom;

// Select the SVG element
var svg = d3.select("svg")
    .append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

// Set up scales
var xScale = d3.scaleTime()
    .range([0, width]);

var yScale = d3.scaleLinear()
    .range([height, 0]);

// Set up axes
var xAxis = d3.axisBottom(xScale);
var yAxis = d3.axisLeft(yScale);

// Append axes to SVG
svg.append("g")
    .attr("class", "axis axis--x")
    .attr("transform", "translate(0," + height + ")");

svg.append("g")
    .attr("class", "axis axis--y");

svg.append("path")
.datum(data)
.attr("class", "line")
.attr("d", line);

// Add grid lines
svg.append("g")
    .attr("class", "grid")
    .call(d3.axisLeft(yScale)
        .tickSize(-width)
        .tickFormat("")
    );

svg.append("g")
    .attr("class", "grid")
    .attr("transform", "translate(0," + height + ")")
    .call(d3.axisBottom(xScale)
        .tickSize(-height)
        .tickFormat("")
    );

// Add title
svg.append("text")
    .attr("x", width / 2)
    .attr("y", -20)
    .attr("text-anchor", "middle")
    .attr("font-size", "18px")
    .text("Heart Rate Over Time");


// Set up line generator
var line = d3.line()
    .x(function(d) { return xScale(new Date(d.time)); })
    .y(function(d) { return yScale(parseInt(d.heartRate)); });

// Initial data
var data = [];

// Function to update graph with new data
function updateGraph() {
    d3.json('http://localhost/smartflowxdashboard/fetchData.php')
        .then(function(newData) {
            data = newData;
            
            // Update x-axis domain
            xScale.domain(d3.extent(data, function(d) { return new Date(d.time); }));
            
            // Update y-axis domain
            yScale.domain([0, d3.max(data, function(d) { return parseInt(d.heartRate); })]);
            
            // Update axes
            svg.select(".axis--x")
                .call(xAxis);
            
            svg.select(".axis--y")
                .call(yAxis);
            
            // Update line
            svg.selectAll("path")
                .remove();
            
            svg.append("path")
                .datum(data)
                .attr("class", "line")
                .attr("d", line);
        });
}

// Update graph every second
setInterval(updateGraph, 1000);

// Initial update
updateGraph();
