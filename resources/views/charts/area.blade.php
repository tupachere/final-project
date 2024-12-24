<x-layout title="Grafik Pemasukan & Pengeluaran" :breadcrumb="['Charts', 'Area Chart']">
    <style>
        /* Container to center the chart horizontally and position it towards the top */
        .chart-container {
            display: flex;
            justify-content: center;  /* Horizontally center */
            align-items: flex-start;  /* Align to the top */
            padding-top: 10px;        /* Add some top padding for spacing */
        }

        /* CSS to control the size of the chart */
        #areaChart {
            width: 100% !important;   /* Full width */
            max-width: 900px;        /* Maximum width */
            height: 500px !important; /* Increased height */
        }
    </style>

    <!-- Chart container -->
    <div class="chart-container">
        <canvas id="areaChart"></canvas> <!-- Canvas without width/height attributes -->
    </div>

    <script>
        var ctx = document.getElementById('areaChart').getContext('2d');

        // Get the device pixel ratio
        var devicePixelRatio = window.devicePixelRatio || 1;

        // Set the canvas size with a higher resolution
        var width = 1200 * devicePixelRatio;  // Increased Width
        var height = 600 * devicePixelRatio;  // Increased Height
        ctx.canvas.width = width;
        ctx.canvas.height = height;

        var areaChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($pemasukan->keys()) !!},  // Bulan
                datasets: [
                    {
                        label: 'Pemasukan',
                        data: {!! json_encode($pemasukan->values()) !!},  // Total Pemasukan
                        backgroundColor: 'rgba(75, 192, 192, 0.4)',  // More vibrant color
                        borderColor: 'rgba(75, 192, 192, 1)',  // Stronger border color
                        borderWidth: 2,  // Thicker border
                        pointBackgroundColor: 'rgba(75, 192, 192, 1)',  // Points with a matching color
                        pointRadius: 5,  // Larger points
                        fill: true  // Make the area filled
                    },
                    {
                        label: 'Pengeluaran',
                        data: {!! json_encode($pengeluaran->values()) !!},  // Total Pengeluaran
                        backgroundColor: 'rgba(255, 99, 132, 0.4)',  // More vibrant color
                        borderColor: 'rgba(255, 99, 132, 1)',  // Stronger border color
                        borderWidth: 2,  // Thicker border
                        pointBackgroundColor: 'rgba(255, 99, 132, 1)',  // Points with a matching color
                        pointRadius: 5,  // Larger points
                        fill: true  // Make the area filled
                    },
                    {
                        label: 'Kas',
                        data: {!! json_encode($kas->values()) !!},  // Total Kas
                        backgroundColor: 'rgba(153, 102, 255, 0.4)',  // More vibrant color
                        borderColor: 'rgb(1, 1, 1)',  // Stronger border color
                        borderWidth: 2,  // Thicker border
                        pointBackgroundColor: 'rgba(153, 102, 255, 1)',  // Points with a matching color
                        pointRadius: 5,  // Larger points
                        fill: true  // Make the area filled
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                aspectRatio: 2, // Controls the aspect ratio, 2:1 width to height
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(200, 200, 200, 0.5)',  // Lighter grid lines for clarity
                            borderColor: 'rgba(200, 200, 200, 0.8)',  // Stronger y-axis border
                            borderWidth: 1
                        },
                        ticks: {
                            font: {
                                size: 12,  // Smaller font size for ticks
                                weight: 'bold'
                            },
                            color: '#333'  // Darker color for y-axis ticks
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(200, 200, 200, 0.5)',  // Lighter grid lines for clarity
                            borderColor: 'rgba(200, 200, 200, 0.8)',  // Stronger x-axis border
                            borderWidth: 1
                        },
                        ticks: {
                            font: {
                                size: 12,  // Smaller font size for ticks
                                weight: 'bold'
                            },
                            color: '#333'  // Darker color for x-axis ticks
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Grafik Pemasukan, Pengeluaran & Kas',  // Chart title
                        font: {
                            size: 16,
                            weight: 'bold'
                        },
                        color: '#333'  // Dark color for the title
                    },
                    tooltip: {
                        enabled: true,
                        mode: 'index',  // Display tooltips for both x and y axis
                        intersect: false  // Show tooltips when hovering over the area
                    }
                }
            }
        });
    </script>
</x-layout>
