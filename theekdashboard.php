<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #C19A6B;
        }

        /* Background Image Section */
        .header {
            background-image: url('THEEK EMP/THEEK EMP.png'); /* Replace with your background image */
            background-size: cover;
            background-position: center;
            height: 800px;
            position: relative;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5em;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        /* Dashboard Container */
        .container {
            max-width: 1200px;
            margin: 20px auto;
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* Two blocks per row */
            grid-gap: 20px;
            padding: 20px;
        }

        /* Dashboard Blocks */
        .block {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            position: relative; /* For positioning the image */
            overflow: hidden; /* To hide overflow */
            display: flex;
            flex-direction: column; /* Stack items vertically */
            justify-content: space-between; /* Space out the items */
            transition: transform 0.3s ease-in-out; /* Smooth transition for hover */
        }

        /* Unique Animations */
        @keyframes floatUpDown {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes slideLeftRight {
            0%, 100% {
                transform: translateX(0);
            }
            50% {
                transform: translateX(10px);
            }
        }

        @keyframes rotateBlock {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(10deg);
            }
        }

        @keyframes zoomInOut {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }

        /* Block-Specific Animations */
        .education-block {
            animation: floatUpDown 3s ease-in-out infinite;
        }

        .members-block {
            animation: slideLeftRight 4s ease-in-out infinite;
        }

        .admin-block {
            animation: rotateBlock 6s linear infinite;
        }

        .view-members-block {
            animation: zoomInOut 3s ease-in-out infinite;
        }

        .tuition-block {
            animation: floatUpDown 2s ease-in-out infinite;
        }

        /* Round Image */
        .block img {
            width: 80px; /* Size of the image */
            height: 80px;
            border-radius: 50%;
            position: absolute;
            top: 20px;
            left: 20px;
            border: 2px solid #ddd; /* Optional border */
        }

        /* Block Title and Content */
        .block h2 {
            margin: 0;
            padding-top: 100px; /* Space for round image */
        }

        .block p {
            flex-grow: 1; /* Allow the paragraph to take up available space */
            margin-top: 20px; /* Space between title and content */
        }

        /* Button Styling */
        .block button {
            background-color: #4facfe;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .block button:hover {
            background-color: #00c6ff;
        }

        /* Color Variations for Blocks */
        .education-block {
            background-color: green;
        }

        .members-block {
            background-color: yellow;
        }

        .admin-block {
            background-color: orange; /* Added Admin Block Color */
        }

        .view-members-block {
            background-color: blue;
        }

        .tuition-block {
            background-color: lightcoral; /* Added Tuition Block Color */
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr; /* Stack blocks on smaller screens */
            }
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Welcome to the Dashboard</h1>
</div>

<div class="container">
    <!-- Education Dashboard Block -->
    <div class="block education-block">
        <img src="THEEK EMP/SCHOOL.jpg" alt="Education Icon"> <!-- Replace with your image -->
        <h2>Education Dashboard</h2>
        <p>Overview of educational metrics and performance.</p>
        <button onclick="window.location.href='education.php'">View Details</button>
    </div>

    <!-- Members Dashboard Block -->
    <div class="block members-block">
        <img src="THEEK EMP/ADMIN 1.png" alt="Members Icon"> <!-- Replace with your image -->
        <h2>Members Dashboard</h2>
        <p>Manage and view member information.</p>
        <button onclick="window.location.href='membersdashboard.php'">View Details</button>
    </div>

    <!-- Admin Dashboard Block -->
    <div class="block admin-block">
        <img src="THEEK EMP/ADMIN 2.png" alt="Admin Icon"> <!-- Replace with your image -->
        <h2>Admin Dashboard</h2>
        <p>Manage and view admin controls.</p>
        <button onclick="window.location.href='admintest.php'">Go Into</button>
    </div>

    <!-- View Members Block -->
    <div class="block view-members-block">
        <img src="THEEK EMP/THEEK EMP 3.png" alt="View Icon"> <!-- Replace with your image -->
        <h2>View Members</h2>
        <p>Browse all members and their details.</p>
        <button onclick="window.location.href='viewmembers.php'">View Details</button>
    </div>

    <!-- Tuition Dashboard Block -->
    <div class="block tuition-block">
        <img src="THEEK EMP/download (2).png" alt="Tuition Icon"> <!-- Replace with your image -->
        <h2>Tuition Dashboard</h2>
        <p>View and manage tuition details.</p>
        <button onclick="window.location.href='tuition.php'">View Details</button>
    </div>
</div>

</body>
</html>
