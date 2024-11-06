<?php
// agriculture.php

// Database connection (update with your credentials)
$servername = "localhost"; // Your server name
$username = "root";        // Your database username
$password = "";            // Your database password
$dbname = "theek";        // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch updates from the database
$updates = [];
$result = $conn->query("SELECT title, description, media_path, upload_date FROM agriculture_updates ORDER BY upload_date DESC");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $updates[] = [
            'title' => $row['title'],
            'content' => $row['description'],
            'image_path' => $row['media_path'],
            'upload_date' => $row['upload_date']
        ];
    }
}

// Close the database connection
$conn->close();
?>

<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agriculture Information - Theek Empowerment Foundation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #E0FFFF;
        }

        /* Top section with background image */
        .top-section {
            background-image: url('The image/agric 1.jpg'); /* Replace with your image path */
            background-size: cover;
            background-position: center;
            height: 800px; /* Adjust height as needed */
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            padding: 0px;
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

        /* Updates section */
        .updates {
            display: flex;
            flex-direction: column; /* Stack updates vertically */
            gap: 20px;
        }

        .update {
            display: flex;
            flex-direction: row; /* Arrange image and text horizontally */
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .update img, .update video {
            width: 50%; /* Image and video take half width */
            height: auto;
            display: block;
        }

        .update-content {
            padding: 15px;
            width: 50%; /* Text content takes half width */
        }

        .update-content h3 {
            margin-top: 0;
            font-size: 1.5em;
            color: #2c3e50;
        }

        .update-content p {
            margin: 0;
            color: #555;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .update {
                flex-direction: column; /* Stack vertically on small screens */
            }

            .update img, .update video, .update-content {
                width: 100%; /* Full width */
            }
        }
    </style>
</head>
<body>

    <!-- Top Section -->
    <div class="top-section">
        <h1> Theek Agriculture</h1>
    </div>

    <div class="container">
        <!-- Block 1: What is Agriculture? -->
        <div class="block">
            <h2>What is Agriculture?</h2>
            <p>Agriculture is the science, art, and practice of cultivating plants and rearing animals to produce food, fiber, medicinal plants, and other products that sustain and enhance human life. It is one of the foundational activities of human civilization, allowing for the development of societies by providing the essential resources necessary for survival—such as food and raw materials.</p>
            <p>Agriculture encompasses a wide variety of activities, including crop cultivation, livestock farming, poultry farming, and more. It plays a crucial role in food security and supports the economies of many countries, particularly in rural regions.</p>
        </div>

        <!-- Block 2: Importance of Agriculture -->
        <div class="block">
            <h2>Importance of Agriculture</h2>
            <p>Agriculture is essential for multiple reasons:</p>
            <ul>
                <li><strong>Food Production:</strong> Agriculture provides the majority of the world’s food supply, producing crops like grains, fruits, and vegetables, as well as animal-based products like meat, milk, and eggs.</li>
                <li><strong>Economic Backbone:</strong> It employs large portions of the population and contributes significantly to GDP, especially in developing countries.</li>
                <li><strong>Raw Materials:</strong> Agriculture supplies raw materials for industries such as textiles, biofuels, pharmaceuticals, and more.</li>
                <li><strong>Environmental Stewardship:</strong> Sustainable agricultural practices help maintain biodiversity, soil health, and water resources.</li>
            </ul>
        </div>

        <!-- Block 3: Poultry Farming -->
        <div class="block">
            <h2>Poultry Farming</h2>
            <p>Poultry farming is a specialized branch of agriculture focused on the rearing of domesticated birds such as chickens, ducks, turkeys, and geese, primarily for meat and eggs. Poultry farming provides a steady source of income for farmers and contributes significantly to global protein supply.</p>
            <p>Poultry farming can be categorized into two main areas:</p>
            <ul>
                <li><strong>Broilers:</strong> Chickens raised for meat. They grow quickly and are ready for market in just a few weeks.</li>
                <li><strong>Layers:</strong> Chickens bred primarily for egg production. They can produce eggs regularly for up to two years.</li>
            </ul>
        </div>

        <!-- Block 4: Housing Systems -->
        <div class="block">
            <h2>Housing Systems</h2>
            <p>In poultry farming, housing systems play a vital role in ensuring the health and productivity of the birds. The common types of housing systems include:</p>
            <ul>
                <li><strong>Free-range:</strong> Birds are allowed to roam freely outdoors for part of the day.</li>
                <li><strong>Battery Cages:</strong> Birds are kept in small cages, often indoors, which is a highly intensive system but raises ethical concerns.</li>
                <li><strong>Deep-litter System:</strong> Birds are housed indoors but have more space to move around compared to cages.</li>
            </ul>
        </div>

        <!-- Block 5: Livestock Farming -->
        <div class="block">
            <h2>Livestock Farming</h2>
            <p>Livestock farming, also known as animal husbandry, involves the breeding, rearing, and management of animals such as cattle, sheep, goats, pigs, and camels for meat, milk, wool, and other by-products. Livestock farming plays a critical role in food security and contributes to the livelihoods of many rural populations.</p>
            <p>The primary types of livestock farming include:</p>
            <ul>
                <li><strong>Cattle Farming:</strong> Involves raising cattle for meat (beef) or milk (dairy).</li>
                <li><strong>Sheep and Goat Farming:</strong> Sheep are raised for wool and meat, while goats are reared for milk, meat, and sometimes fiber.</li>
                <li><strong>Pig Farming:</strong> Pigs are raised for pork, one of the most widely consumed meats in the world.</li>
            </ul>
        </div>

        <!-- Block 6: Importance of Livestock Farming -->
        <div class="block">
            <h2>Importance of Livestock Farming</h2>
            <p>Livestock farming is crucial for various reasons:</p>
            <ul>
                <li><strong>Food Supply:</strong> It provides meat, milk, and other essential products that contribute to global food security.</li>
                <li><strong>Economic Contributions:</strong> Livestock farming generates significant income for farmers, especially in rural areas.</li>
                <li><strong>By-products:</strong> Beyond food, livestock provide materials like leather, wool, and fertilizers.</li>
            </ul>
        </div>

        <!-- Updates Section -->
        <div class="block">
            <h2>Agriculture Updates</h2>
            <div class="updates">
                <?php if (!empty($updates)): ?>
                    <?php foreach ($updates as $update): ?>
                        <div class="update">
                            <?php if (strpos($update['image_path'], '.mp4') === false): // Check if media is an image ?>
                                <img src="<?php echo htmlspecialchars($update['image_path']); ?>" alt="<?php echo htmlspecialchars($update['title']); ?>" class="update-image">
                            <?php else: // If media is a video, display a placeholder ?>
                                <video controls width="100%">
                                    <source src="<?php echo htmlspecialchars($update['image_path']); ?>" type="video/<?php echo pathinfo($update['image_path'], PATHINFO_EXTENSION); ?>">
                                    Your browser does not support the video tag.
                                </video>
                            <?php endif; ?>
                            <div class="update-content">
                                <h3><?php echo htmlspecialchars($update['title']); ?></h3>
                                <p><?php echo htmlspecialchars($update['content']); ?></p>
                                <p><strong>Date:</strong> <?php echo htmlspecialchars($update['upload_date']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No updates available.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
