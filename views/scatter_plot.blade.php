<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scatter Plot</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> <!-- Axios for AJAX -->
</head>
<body>
    <h1>Scatter Plot</h1>
    
    <!-- Canvas for the scatter plot -->
    <canvas id="scatterPlot" width="400" height="400"></canvas>

    <script>
        // Use Axios to fetch the data from the server
        axios.get('/fetch-scatter-data')
            .then(response => {
                const dataFromServer = response.data;

                console.log(dataFromServer);  // Log data for debugging

                // Ensure the data is available before rendering the chart
                if (dataFromServer.length > 0) {
                    // Initialize Chart.js
                    const ctx = document.getElementById('scatterPlot').getContext('2d');
                    const chart = new Chart(ctx, {
                        type: 'scatter',
                        data: {
                            datasets: [{
                                label: 'Bone Data',
                                data: dataFromServer.map(item => ({
                                    x: item.female_femur,  // X-axis: female femur values
                                    y: item.male_femur     // Y-axis: male femur values
                                })),
                                backgroundColor: 'rgba(75, 192, 192, 1)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Female Femur'
                                    }
                                },
                                y: {
                                    title: {
                                        display: true,
                                        text: 'Male Femur'
                                    }
                                }
                            }
                        }
                    });
                } else {
                    console.error("No data received from server.");
                }
            })
            .catch(error => {
                console.error("Error fetching data: ", error);
                alert("Failed to load data.");
            });
    </script>
</body>
</html>
