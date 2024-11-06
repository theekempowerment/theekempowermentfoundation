

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Portal</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 50px;
            position: relative;
        }

        .header-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
        }

        .header h1 {
            position: relative;
            z-index: 1;
            margin: 0;
        }

        /* Portal Content Styles */
        .content {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        .card {
            background-color: white;
            width: 300px;
            margin: 20px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .card h2 {
            color: #4CAF50;
            margin-bottom: 10px;
        }

        .card p {
            color: #333;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        /* Footer Styles */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #333;
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="header-background.jpg" alt="Top Background Image" class="header-img">
        <h1>Welcome to the Student Portal</h1>
    </div>

    <div class="content">
        <div class="card">
            <h2>Dashboard</h2>
            <p>View your academic progress and latest notifications.</p>
            <!-- Redirect to dashboard.html -->
            <button class="btn" onclick="window.location.href='studentdashboard.php'">Go to Dashboard</button>
        </div>

        <div class="card">
    <h2>Course Registration</h2>
    <p>Register, drop, or swap your courses.</p>
    <!-- Redirect to courseregistration.php -->
    <button class="btn" onclick="window.location.href='courseregistration.php'">Go to Registration</button>
</div>


<div class="card">
    <h2>Results</h2>
    <p>View your grades and request transcripts.</p>
    <!-- Redirect to results.php -->
    <button class="btn" onclick="window.location.href='results.php'">View Results</button>
</div>


        <div class="card">
            <h2>Assignments</h2>
            <p>Submit assignments and access course materials.</p>
            <!-- Redirect to assignments.html -->
            <button class="btn" onclick="window.location.href='assignment.php'">Get Assignments</button>
        </div>

        <div class="card">
    <h2>School Fees Status</h2>
    <p>Check your tuition fees, payment history, and financial aid status.</p>
    <!-- Redirect to fee.php -->
    <button class="btn" onclick="window.location.href='fee.php'">Status</button>
</div>


        <div class="card">
            <h2>Exam Schedule</h2>
            <p>View your exam schedules.</p>
            <!-- Redirect to exam.html -->
            <button class="btn" onclick="window.location.href='schedule.php'">Go to Exam Schedule</button>
        </div>

        <div class="card">
            <h2>Library Resources</h2>
            <p>Access digital library materials and reserve books.</p>
            <!-- Redirect to library.html -->
            <button class="btn" onclick="window.location.href='library.php'">Go to Library</button>
        </div>

        <div class="card">
            <h2>Support and Help Desk</h2>
            <p>Request IT or academic support.</p>
            <!-- Redirect to support.html -->
            <button class="btn" onclick="window.location.href='customercare.php'">Go to Support</button>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Student Portal | All Rights Reserved</p>
    </footer>

</body>
</html>
