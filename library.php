<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library Resources</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #dff0d8; /* Light green background color */
        }

        header {
            background: #4CAF50;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #333 3px solid;
            text-align: center;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            margin: 20px;
        }

        .section {
            flex: 1;
            padding: 20px;
            box-sizing: border-box;
        }

        .section.left {
            border-right: 2px solid #4CAF50;
        }

        .card {
            background-color: #fff;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card img {
            max-width: 100%;
            border-radius: 5px;
        }

        .card h3 {
            margin-top: 0;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <header>
        <h1>Library Resources</h1>
    </header>

    <div class="container">
        <!-- Textbooks and Documents Section -->
        <div class="section left">
            <h2>Documents and Textbooks</h2>
            <?php
            // Example data, replace this with your data fetching logic
            $documents = [
                ['name' => 'Math Textbook', 'description' => 'Algebra and Geometry', 'file' => 'math_textbook.pdf', 'type' => 'Document'],
                ['name' => 'History Book', 'description' => 'The History of Europe', 'file' => 'history_book.pdf', 'type' => 'Document'],
                ['name' => 'Science Textbook', 'description' => 'Physics and Chemistry', 'file' => 'science_textbook.pdf', 'type' => 'Document'],
                // Add more document records as needed
            ];

            foreach ($documents as $document) {
                echo '<div class="card">';
                echo '<h3>' . htmlspecialchars($document['name']) . '</h3>';
                echo '<p>' . htmlspecialchars($document['description']) . '</p>';
                echo '<a href="path/to/resources/' . htmlspecialchars($document['file']) . '" class="btn" download>Download</a>';
                echo '</div>';
            }
            ?>
        </div>

        <!-- Images Section -->
        <div class="section right">
            <h2>Images</h2>
            <?php
            // Example data, replace this with your data fetching logic
            $images = [
                ['name' => 'Historical Map', 'description' => 'Map of Europe in 1500', 'file' => 'europe_map.jpg', 'type' => 'Image'],
                ['name' => 'Science Diagram', 'description' => 'Diagram of the Solar System', 'file' => 'solar_system.jpg', 'type' => 'Image'],
                // Add more image records as needed
            ];

            foreach ($images as $image) {
                echo '<div class="card">';
                echo '<h3>' . htmlspecialchars($image['name']) . '</h3>';
                echo '<p>' . htmlspecialchars($image['description']) . '</p>';
                echo '<img src="path/to/resources/' . htmlspecialchars($image['file']) . '" alt="' . htmlspecialchars($image['name']) . '">';
                echo '</div>';
            }
            ?>
        </div>
    </div>

</body>
</html>
