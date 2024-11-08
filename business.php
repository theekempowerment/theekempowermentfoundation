<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Information - Theek International</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .top-section {
            background-image: url('images/pic 1.jpg');
            background-size: cover;
            background-position: center;
            height: 800px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .top-section h1 {
            font-size: 2.5em;
            margin: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            border-bottom: 2px solid #0056b3;
            padding-bottom: 10px;
        }

        p {
            color: #555;
            line-height: 1.6;
        }

        .block {
            margin-bottom: 30px;
            padding: 20px;
            background-color: #e9ecef;
            border-radius: 8px;
        }

        .updates {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .update {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
        }

        .update img,
        .update video {
            width: 100%;
            height: auto;
            display: block;
        }

        .update-content {
            padding: 15px;
        }

        .update-content h2 {
            margin-top: 0;
            font-size: 1.5em;
            color: #2c3e50;
        }

        .update-content p {
            margin: 0;
            color: #555;
        }

        @media (min-width: 768px) {
            .update {
                width: calc(50% - 20px);
            }
        }

        @media (min-width: 1200px) {
            .update {
                width: calc(33.333% - 20px);
            }
        }
    </style>
</head>
<body>

    <!-- Top Section -->
    <div class="top-section">
        <h1>Business Information</h1>
    </div>

    <div class="container">
        <!-- Block 1: What is Business? -->
        <div class="block">
            <h2>What is Business?</h2>
            <p>Business refers to the organized efforts of individuals or entities to produce and sell goods and services for a profit. It involves various activities such as marketing, operations, finance, and management to deliver products or services that satisfy customer needs and drive economic growth.</p>
        </div>

        <!-- Block 2: Importance of Business -->
        <div class="block">
            <h2>Importance of Business</h2>
            <p>Business is essential for several reasons:</p>
            <ul>
                <li><strong>Job Creation:</strong> Businesses provide employment opportunities and help reduce unemployment.</li>
                <li><strong>Economic Growth:</strong> Business activities contribute to GDP growth and economic development.</li>
                <li><strong>Innovation:</strong> Through research and development, businesses drive innovation and technological advancements.</li>
                <li><strong>Improved Living Standards:</strong> Businesses offer goods and services that enhance the quality of life for people.</li>
            </ul>
        </div>

        <!-- Block 3: Types of Businesses -->
        <div class="block">
            <h2>Types of Businesses</h2>
            <p>Businesses can be classified into various types based on their structure, ownership, and purpose:</p>
            <ul>
                <li><strong>Sole Proprietorship:</strong> Owned and managed by a single person.</li>
                <li><strong>Partnership:</strong> A business owned by two or more people who share profits and responsibilities.</li>
                <li><strong>Corporation:</strong> A large organization that is legally separate from its owners, offering limited liability to its shareholders.</li>
                <li><strong>Non-Profit:</strong> A business whose primary goal is to serve the public interest, rather than generating profit for its owners.</li>
            </ul>
        </div>

        <!-- Block 4: Business Strategy -->
        <div class="block">
            <h2>Business Strategy</h2>
            <p>A business strategy outlines how a company intends to achieve its objectives and gain a competitive edge. Key components of a successful business strategy include:</p>
            <ul>
                <li><strong>Market Analysis:</strong> Understanding the target market and competition.</li>
                <li><strong>Value Proposition:</strong> Offering products or services that meet the needs of customers.</li>
                <li><strong>Cost Management:</strong> Efficiently managing operational costs to maximize profitability.</li>
                <li><strong>Growth Plan:</strong> Identifying opportunities for expansion and diversification.</li>
            </ul>
        </div>

        <!-- Block 5: Marketing in Business -->
        <div class="block">
            <h2>Marketing in Business</h2>
            <p>Marketing is a crucial aspect of business, involving the promotion and selling of products or services. Effective marketing strategies include:</p>
            <ul>
                <li><strong>Digital Marketing:</strong> Utilizing online platforms such as social media, search engines, and email to reach customers.</li>
                <li><strong>Content Marketing:</strong> Creating valuable content to engage and educate customers.</li>
                <li><strong>Branding:</strong> Developing a unique identity that differentiates the business from competitors.</li>
                <li><strong>Customer Relationship Management (CRM):</strong> Building strong relationships with customers to encourage loyalty and repeat business.</li>
            </ul>
        </div>

        <!-- Updates Section -->
        <div class="section">
            <h2>Latest Business Updates</h2>
            <div class="updates">
                <?php
                // Database connection
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "theek";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetching news from the database
                $sql = "SELECT title, description, media_url, media_type FROM business_updates ORDER BY created_at DESC LIMIT 6";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data for each row
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="update">';
                        
                        // Check media type to display either image or video
                        if ($row["media_type"] == "image") {
                            echo '<img src="' . $row["media_url"] . '" alt="' . $row["title"] . '">'; // Display image
                        } elseif ($row["media_type"] == "video") {
                            echo '<video controls>';
                            echo '<source src="' . $row["media_url"] . '" type="video/mp4">'; // Display video
                            echo 'Your browser does not support the video tag.';
                            echo '</video>';
                        }

                        echo '<div class="update-content">';
                        echo '<h2>' . $row["title"] . '</h2>'; // Title
                        echo '<p>' . $row["description"] . '</p>'; // Description
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No updates available.</p>';
                }

                // Close the database connection
                $conn->close();
                ?>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <?php include 'footer.php'; ?>

</body>
</html>
