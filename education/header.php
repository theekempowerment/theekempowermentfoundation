<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> <!-- Link to external stylesheet if needed -->
    <title>School Website</title>
    <style>
        /* Basic styles for the header */
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
        }
        header {
            background-color: blue;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        /* Logo section */
        .logo {
            color: white;
            font-size: 20px;
            font-weight: bold;
            text-transform: uppercase;
        }
        /* Navigation links */
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        nav ul li {
            margin: 0 20px;
        }
        nav ul li a {
            text-decoration: none;
            color: white;
            font-size: 18px;
            font-weight: bold;
            padding: 10px 15px;
            transition: background-color 0.3s;
        }
        nav ul li a:hover {
            background-color: #555;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <header>
        <nav>
            <!-- Logo section -->
            <div class="logo">
                Theek Youth, Adult And Tuition Education Center
            </div>
            <!-- Navigation links -->
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="student-portal.php">Student Portal</a></li>
            </ul>
        </nav>
    </header>

</body>
</html>
