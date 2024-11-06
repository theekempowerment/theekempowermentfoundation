<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theek Empowerment Foundation</title>
    <style>
        /* Basic reset and styling */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0; /* Light background color */
            color: #333; /* Default text color */
        }

        /* Keyframes for animations */
        @keyframes backgroundMotion {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        @keyframes imageMotion {
            0% { transform: translateX(0px) scale(1); }
            50% { transform: translateX(10px) scale(1.05); }
            100% { transform: translateX(0px) scale(1); }
        }

        /* Hero section styling with animation */
        .hero {
            position: relative;
            height: 400px;
            color: red;
            text-align: center;
            padding: 80px 20px;
            background: url('images/pic 6.jpg') no-repeat center center/cover;
            overflow: hidden;
            margin-bottom: 30px;
            animation: backgroundMotion 10s ease-in-out infinite;
        }

        .hero h1, .hero p {
            position: relative;
            z-index: 2;
            margin: 0;
        }

        .hero h1 {
            font-size: 2.8em;
            margin-bottom: 15px;
            letter-spacing: 1px;
        }

        .hero p {
            font-size: 1.3em;
            margin-bottom: 10px;
        }

        /* Container for blocks */
        .container {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Individual blocks */
        .block {
            display: flex;
            background-color: white;
            border-radius: 10px;
            margin: 20px 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            flex-direction: row;
        }

        /* Responsive adjustments for smaller screens */
        @media (max-width: 768px) {
            .block {
                flex-direction: column;
            }
        }

        /* Block image with animation */
        .block img {
            width: 30%;
            object-fit: cover;
            animation: imageMotion 6s ease-in-out infinite;
        }

        @media (max-width: 768px) {
            .block img {
                width: 100%;
            }
        }

        /* Block content */
        .block-content {
            padding: 20px;
            flex: 1;
        }

        .block-content h2 {
            margin-top: 0;
            font-size: 1.8em;
            color: #444;
        }

        .block-content p {
            margin: 10px 0;
            line-height: 1.6;
            font-size: 1.1em;
        }

        .block-content a.read-more {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }

        /* Additional buttons */
        .block a.additional-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            position: absolute;
            right: 20px;
            top: 20px;
        }

        /* Latest Updates Block */
        .latest-updates {
            background-color: #f0f4c3;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
        }

        .latest-updates h2 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        .update-item {
            display: flex;
            margin-bottom: 15px;
        }

        .update-item img,
        .update-item video {
            width: 50%; /* Take half the width */
            border-radius: 5px;
            margin-right: 10px; /* Add some space between the media and text */
        }

        .update-item .text-content {
            width: 50%; /* Take half the width */
        }

        .update-item p {
            font-size: 1.1em;
            line-height: 1.6;
            color: #333;
        }
    </style>
</head>
<body>

    <!-- Hero Section -->
    <div class="hero">
        <h1>Welcome to Theek Empowerment Foundation</h1>
    </div>

    <!-- Content Blocks -->
    <div class="container">
        <!-- Education Block -->
        <div class="block education">
            <img src="The image/edu home sect.jpg" alt="Youth Image">
            <div class="block-content">
                <h2>Education</h2>
                <p>Education is the cornerstone of progress. At Theek Empoerment Foundation, we believe in supporting educational initiatives that empower individuals and communities.</p>
                <a href="education.php" class="read-more">Read More</a>
            </div>
            <a href="#" class="additional-button">Apply</a>
        </div>

        <!-- NGO Initiatives Block -->
        <div class="block ngo">
            <img src="images/pic 1.jpg" alt="Youth Image">
            <div class="block-content">
                <h2>NGO Initiatives</h2>
                <p>We partner with NGOs to promote social causes and community development. Discover how Theek International supports various non-profit organizations and their impactful projects.</p>
                <a href="ngo.php" class="read-more">Read More</a>
            </div>
            <a href="#" class="additional-button">Get Involved</a>
        </div>

        <!-- Business Collaborations Block -->
        <div class="block business">
            <img src="The image/Buss.jpg" alt="Youth Image">
            <div class="block-content">
                <h2>Business Collaborations</h2>
                <p>Explore opportunities for business growth through collaborations and partnerships. Theek Empowerment Foundation provides a platform for businesses to connect, share insights, and expand their networks.</p>
                <a href="business.php" class="read-more">Read More</a>
            </div>
            <a href="#" class="additional-button">Join</a>
        </div>

        <!-- Empowerment Block -->
        <div class="block empowerment">
            <img src="images/pic 9.jpg" alt="Youth Image">
            <div class="block-content">
                <h2>Empowerment</h2>
                <p>Empowering individuals and communities is at the heart of our mission. Learn more about our programs and initiatives aimed at enhancing skills and fostering self-reliance.</p>
                <a href="empowerment.php" class="read-more">Read More</a>
            </div>
            <a href="#" class="additional-button">Join</a>
        </div>

        <!-- Agriculture Block -->
        <div class="block agriculture">
            <img src="The image/agric.jpg" alt="Youth Image">
            <div class="block-content">
                <h2>Agriculture</h2>
                <p>Supporting agricultural development is crucial for sustainable growth. Theek Empowernent Foundation is committed to helping farmers and agricultural entrepreneurs through various initiatives and support programs.</p>
                <a href="theekempowermentfoundation.com/agriculture.php" class="read-more">Read More</a>
            </div>
            <a href="#" class="additional-button">Join</a>
        </div>

        <!-- Latest Updates Section -->
        <div class="latest-updates">
            <h2>Latest Updates</h2>

            <?php
            // Database connection (update with your credentials)
            $servername = "localhost"; // Your server name
            $username = "root";     // Your database username
            $password = "";     // Your database password
            $dbname = "theek";       // Your database name

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Query to fetch latest updates
            $sql = "SELECT title, description, media_path FROM latest_updates ORDER BY id DESC LIMIT 5"; // Adjust the LIMIT as needed
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data for each row
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="update-item">';
                    $extension = pathinfo($row["media_path"], PATHINFO_EXTENSION);

                    if ($extension == "mp4" || $extension == "mov") {
                        echo '<video src="' . $row["media_path"] . '" controls></video>';
                    } else {
                        echo '<img src="' . $row["media_path"] . '" alt="' . htmlspecialchars($row["title"]) . '">';
                    }

                    echo '<div class="text-content">';
                    echo '<h3>' . htmlspecialchars($row["title"]) . '</h3>';
                    echo '<p>' . htmlspecialchars($row["description"]) . '</p>';
                    echo '</div></div>';
                }
            } else {
                echo "No updates available.";
            }
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>

<?php include 'footer.php'; ?>
