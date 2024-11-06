<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .header {
            background-image: url('background.jpg'); /* Replace with your image URL */
            background-size: cover;
            height: 200px;
            width: 100%;
            position: relative;
        }
        .header-content {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            background-color: rgba(0, 0, 0, 0.5); /* Dark overlay for text contrast */
        }
        .container {
            display: flex;
        }
        .sidebar {
            width: 200px;
            padding: 20px;
            background-color: #f4f4f4;
            height: calc(100vh - 200px); /* Full height minus header */
        }
        .content {
            flex-grow: 1;
            padding: 20px;
            height: calc(100vh - 200px); /* Full height minus header */
            overflow-y: auto;
        }
        .menu-button {
            display: block;
            width: 100%;
            padding: 15px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
            color: white;
            text-align: left;
            cursor: pointer;
            font-size: 16px;
        }
        .menu-button:hover {
            opacity: 0.9;
        }

        /* Different colors for each button */
        .resources { background-color: #4CAF50; } /* Green */
        .advertisement { background-color: #f44336; } /* Red */
        .home { background-color: #008CBA; } /* Blue */
        .business { background-color: #FF9800; } /* Orange */
        .empowerment { background-color: #9C27B0; } /* Purple */
        .agriculture { background-color: #795548; } /* Brown */
        .entertainment { background-color: #FFEB3B; color: black; } /* Yellow */
        .education { background-color: #3F51B5; } /* Indigo */
        .users { background-color: #E91E63; } /* Pink */

    </style>
</head>
<body>
    <!-- Background image section -->
    <div class="header">
        <div class="header-content">
            Welcome To Admin Dashboard
        </div>
    </div>

    <div class="container">
        <!-- Sidebar menu -->
        <div class="sidebar">
            <button class="menu-button resources" onclick="loadContent('uploadtoresources.php')">Resources</button>
            <button class="menu-button advertisement" onclick="loadContent('advertisement.html')">Advertisement</button>
            <button class="menu-button home" onclick="loadContent('uploadtolatestupdate.php')">Home</button>
            <button class="menu-button business" onclick="loadContent('business.html')">Business</button>
            <button class="menu-button empowerment" onclick="loadContent('empowerment.html')">Empowerment</button>
            <button class="menu-button agriculture" onclick="loadContent('uploadtoagriculturelatest.php')">Agriculture</button>
            <button class="menu-button entertainment" onclick="loadContent('entertainment.html')">Entertainment</button>
            <button class="menu-button education" onclick="loadContent('education.html')">Education</button>
            <button class="menu-button users" onclick="loadContent('users.html')">Users</button>
        </div>

        <!-- Content section -->
        <div class="content" id="content-area">
            <!-- Loaded content will appear here -->
            <h2>Select a section from the menu to view details.</h2>
        </div>
    </div>

    <script>
        function loadContent(page) {
            const contentArea = document.getElementById('content-area');
            fetch(page)
                .then(response => response.text())
                .then(data => {
                    contentArea.innerHTML = data;
                })
                .catch(error => {
                    contentArea.innerHTML = '<p>Error loading content. Please try again later.</p>';
                    console.error('Error:', error);
                });
        }
    </script>
</body>
</html>
