<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Femur µCT Outcomes Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Layout Styles */
        body {
            display: flex;
            font-family: Arial, sans-serif;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 200px;
            background-color: #f4f4f4;
            padding: 20px;
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            border-right: 2px solid #ccc;
        }

        .filter-section {
            margin-bottom: 20px;
        }

        .filter-label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
        }

        /* Chart Container */
        .chart-container {
            margin-left: 220px;
            width: 80%;
            padding: 20px;
        }

        canvas {
            max-width: 100%;
            height: 400px;
        }
    </style>
</head>
<body>

    <!-- Sidebar Filter Menu -->
    <div class="sidebar">
        <h3>Filter Options</h3>

        <!-- Bone Type Filter -->
        <div class="filter-section">
            <label class="filter-label" for="boneType">Bone Type</label>
            <select id="boneType">
                <option value="femur">Femur</option>
                <option value="tibia">Tibia</option>
                <option value="radius">Radius</option>
            </select>
        </div>

        <!-- Gender Filter -->
        <div class="filter-section">
            <label class="filter-label" for="gender">Gender</label>
            <select id="gender">
                <option value="both">Both</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>

        <!-- CT Measurements Filter -->
        <div class="filter-section">
            <label class="filter-label" for="ctMeasurement">CT Measurement</label>
            <select id="ctMeasurement">
                <option value="BVTV">BV/TV</option>
                <option value="BMD">BMD</option>
                <option value="TbN">TbN</option>
            </select>
        </div>

        <!-- Chart Type Filter -->
        <div class="filter-section">
            <label class="filter-label" for="chartType">Chart Type</label>
            <select id="chartType">
                <option value="scatter">Scatter Plot</option>
                <option value="bar">Bar Chart</option>
                <option value="line">Line Chart</option>
            </select>
        </div>
    </div>

    <!-- Chart Container -->
    <div class="chart-container">
        <h2>Femur µCT Outcomes for Male & Female Global Homozygous KO Mice</h2>
        <canvas id="chart"></canvas>
    </div>

    <script>
        // Parse the data passed from the controller
        const geneSymbols = @json($data['geneSymbols']);
        const femaleFemur = @json($data['femaleFemur']);
        const maleFemur = @json($data['maleFemur']);

        // Prepare chart data based on the selected filters
        let chartData = {
            femaleData: femaleFemur.map((y, index) => ({
                x: index,
                y: y
            })),
            maleData: maleFemur.map((y, index) => ({
                x: index,
                y: y
            }))
        };

        // Store the current chart instance
        let currentChart = null;

        // Function to create or update the chart based on the selected chart type
        function createChart(chartType) {
            // Destroy the existing chart if it exists
            if (currentChart) {
                currentChart.destroy();
            }

            // Get selected gender filter
            const gender = document.getElementById('gender').value;

            // Filter data based on gender
            let datasets = [];
            if (gender === 'both' || gender === 'female') {
                datasets.push({
                    label: 'Female Femur',
                    data: chartData.femaleData,
                    backgroundColor: 'rgba(255, 99, 132, 0.6)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                });
            }
            if (gender === 'both' || gender === 'male') {
                datasets.push({
                    label: 'Male Femur',
                    data: chartData.maleData,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                });
            }

            // Define the chart configuration based on the selected chart type
            const ctx = document.getElementById('chart').getContext('2d');
            let chartConfig = {
                type: chartType,  // Dynamic chart type
                data: {
                    labels: geneSymbols,  // Use gene symbols as x-axis labels
                    datasets: datasets
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            type: 'category',  // Use 'category' type for categorical x-axis (gene names)
                            title: { display: true, text: 'Gene Symbols' }
                        },
                        y: {
                            beginAtZero: true,
                            title: { display: true, text: 'BV/TV (%)' }
                        }
                    }
                }
            };

            // Create the new chart
            currentChart = new Chart(ctx, chartConfig);
        }

        // Function to update the chart based on the selected filters
        function updateChart() {
            // Get the selected chart type
            const chartType = document.getElementById('chartType').value;
            createChart(chartType);
        }

        // Event listeners for the filters
        document.getElementById('boneType').addEventListener('change', updateChart);
        document.getElementById('gender').addEventListener('change', updateChart);
        document.getElementById('ctMeasurement').addEventListener('change', updateChart);
        document.getElementById('chartType').addEventListener('change', updateChart);

        // Initialize the chart with the default chart type (scatter)
        window.onload = function() {
            createChart('scatter');
        };

    </script>

</body>
</html>
