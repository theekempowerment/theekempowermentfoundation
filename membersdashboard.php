<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #72A0C1;
            overflow-x: hidden;
        }

        /* Background Image Section */
        .header {
            background-image: url('top-background-image.jpg'); /* Replace with your animated background image */
            background-size: cover;
            background-position: center;
            height: 300px;
            position: relative;
            animation: moveBg 20s linear infinite;
        }

        @keyframes moveBg {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .header h1 {
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            position: absolute;
            bottom: 20px;
            left: 20px;
            font-size: 3em;
        }

        /* Dashboard Title */
        .dashboard-title {
            text-align: center;
            margin: 20px 0;
            font-size: 2.5em;
            color: #333;
        }

        /* Dashboard Container */
        .container {
            max-width: 1200px;
            margin: 20px auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 30px;
            padding: 20px;
        }

        /* View Assignments Button */
        .view-assignments-button {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #4facfe;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .view-assignments-button:hover {
            background-color: #00c6ff;
        }

        /* Dashboard Blocks */
        .block {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .block:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        /* Profile and Picture Block */
        .profile-block {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            text-align: center; /* Center text and button */
        }

        .profile-block img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px; /* Space below the profile image */
        }

        /* Income Block */
        .income-block {
            background: linear-gradient(135deg, #f7971e 0%, #ffd200 100%);
            color: white;
        }

        /* Progress Block */
        .progress-block {
            background: linear-gradient(135deg, #00b09b 0%, #96c93d 100%);
            color: white;
        }

        /* Assignments Block */
        .assignments-block {
            background: linear-gradient(135deg, #ff512f 0%, #dd2476 100%);
            color: white;
        }

        /* Opinion Block */
        .opinion-block {
            background: linear-gradient(135deg, #06beb6 0%, #48b1bf 100%);
            color: white;
        }

        .opinion-block textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            border-radius: 5px;
            border: none;
            resize: none;
        }

        /* Junior Savings Block */
        .junior-savings-block {
            background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%);
            color: white;
        }

        /* General Block Styling */
        h2 {
            margin-top: 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
            }
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #333;
            color: white;
        }

        /* Edit Profile Button */
        .edit-profile-button {
            display: inline-block;
            margin-top: 10px; /* Space between upload button and edit button */
            padding: 10px 20px;
            background-color: #4facfe;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .edit-profile-button:hover {
            background-color: #00c6ff;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Welcome to Your Dashboard</h1>
</div>

<div class="dashboard-title">
    <h1>Member Dashboard</h1>
</div>

<div class="container">
    <!-- Profile & Picture Block -->
    <div class="block profile-block">
        <h2>Profile & Picture</h2>
        <img src="default-avatar.jpg" alt="Profile Picture" id="profilePic">
        <form action="memberprofile.php" method="post" enctype="multipart/form-data">
            <label for="profile_picture">Upload Picture:</label>
            <input type="file" name="profile_picture" id="profile_picture" accept="image/*">
            <button type="submit">Upload</button>
        </form>
        <!-- Edit Profile Button -->
        <a href="Profile.php" class="edit-profile-button">Edit Profile</a>
    </div>

    <!-- Income Block -->
    <div class="block income-block">
        <h2>Your Income</h2>
        <p>Total Earnings: $5,000</p>
    </div>

    <!-- Progress Curve/Chart Block -->
    <div class="block progress-block">
        <h2>Progress Curve</h2>
        <canvas id="progressChart"></canvas>
    </div>

    <!-- Assignments Block -->
    <div class="block assignments-block">
       <h2>Assignment Updates</h2>
       <ul>
           <li>Assignment 1: Completed</li>
           <li>Assignment 2: In Progress</li>
           <li>Assignment 3: Pending</li>
       </ul>
       <!-- View Assignments Button -->
       <a href="viewmembersupload.php" class="view-assignments-button">View Assignments</a>
    </div>

    <!-- Opinion Block -->
    <div class="block opinion-block">
        <h2>Submit Your Opinion</h2>
        <form action="submit_opinion.php" method="post">
            <textarea name="opinion" placeholder="Write your opinion here..." required></textarea>
            <button type="submit">Send</button>
        </form>
    </div>

    <!-- Junior Savings Block -->
    <div class="block junior-savings-block">
        <h2>Junior Savings Account</h2>
        <p>Total Savings: $1,200</p>
        <p>Interest Rate: 2.5% per annum</p>
        <p>Next Review Date: Dec 1, 2024</p>
    </div>
</div>

<footer>
    <p>Member Dashboard &copy; 2024</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Chart.js - Progress Curve Chart
    var ctx = document.getElementById('progressChart').getContext('2d');
    var progressChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May'],
            datasets: [{
                label: 'Progress',
                data: [10, 20, 30, 40, 50],
                backgroundColor: 'rgba(255, 255, 255, 0.1)',
                borderColor: 'rgba(255, 255, 255, 1)',
                borderWidth: 2
            }]
        },
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
