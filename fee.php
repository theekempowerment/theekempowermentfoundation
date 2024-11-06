<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['admission_number'])) {
    die("You need to log in to view your fee details.");
}

// Get the admission number from the session
$admission_number = $_SESSION['admission_number'];

// Database connection details
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "theek"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch fee details for the logged-in user
$sql = "SELECT year, total_amount_paid, balance_remaining FROM fees WHERE admission_number = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $admission_number);
$stmt->execute();
$result = $stmt->get_result();

$fees = [];
while ($row = $result->fetch_assoc()) {
    $fees[] = $row; // Store each fee record in the array
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fee Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #dff0d8; /* Light green background color */
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        header {
            background: #4CAF50;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #333 3px solid;
            text-align: center;
        }

        .info {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        h2 {
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #ffffff;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .chart-container {
            position: relative;
            margin: 20px 0;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        canvas {
            width: 100%;
            height: 400px;
        }
    </style>
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <header>
        <h1>Fee Details</h1>
    </header>

    <div class="container">
        <!-- Fee Info Section -->
        <div class="info">
            <h2>Fee Overview</h2>
            <table>
                <thead>
                    <tr>
                        <th>Year</th>
                        <th>Total Amount Paid</th>
                        <th>Balance Remaining</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if there are fees for the user
                    if (!empty($fees)) {
                        foreach ($fees as $fee) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($fee['year']) . '</td>';
                            echo '<td>$' . htmlspecialchars(number_format($fee['total_amount_paid'], 2)) . '</td>';
                            echo '<td>$' . htmlspecialchars(number_format($fee['balance_remaining'], 2)) . '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="3">No fee records found for your admission number.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Fee Graph Section -->
        <div class="chart-container">
            <h2>Fee Payment Graph</h2>
            <canvas id="feeChart"></canvas>
        </div>
    </div>

    <script>
        // Example data for the chart
        const feeData = {
            labels: <?php echo json_encode(array_column($fees, 'year')); ?>,
            datasets: [{
                label: 'Total Amount Paid',
                data: <?php echo json_encode(array_column($fees, 'total_amount_paid')); ?>,
                backgroundColor: 'rgba(76, 175, 80, 0.2)',
                borderColor: 'rgba(76, 175, 80, 1)',
                borderWidth: 1
            }, {
                label: 'Balance Remaining',
                data: <?php echo json_encode(array_column($fees, 'balance_remaining')); ?>,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };

        // Chart.js configuration
        const ctx = document.getElementById('feeChart').getContext('2d');
        const feeChart = new Chart(ctx, {
            type: 'bar',
            data: feeData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>
</html>
