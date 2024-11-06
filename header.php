<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THEEK EMPOWERMENT FOUNDATION</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: lightgreen;
            padding-top: 80px; /* Ensure the content doesn't overlap with the header */
        }

        /* Header Styles */
        header {
            background-color: yellow;
            padding: 20px;
            color: #fff;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .logo {
            font-family: Arial, sans-serif;
            font-weight: bold;
            color: red;
            flex: 1;
        }

        header .main-nav {
            flex: 2;
            display: flex;
            justify-content: flex-end;
        }

        header .main-nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        header .main-nav ul li {
            margin-left: 20px;
        }

        header .main-nav ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 18px;
            padding: 8px 15px;
            transition: background-color 0.3s ease;
        }

        header .main-nav ul li a:hover {
            background-color: #0052cc;
            border-radius: 4px;
        }

        /* Navigation Styles */
        nav {
            background-color: green;
            text-align: center;
            position: fixed;
            width: 100%;
            top: 50px; /* Positioned below the header */
            left: 0;
            z-index: 1000;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            display: flex;
            justify-content: flex-end;
        }

        nav ul li {
            margin: 10px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            display: block;
        }

        nav ul li a:hover {
            background-color: #003366;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<header>
    <div class="logo">THEEK EMPOWERMENT FOUNDATION</div>
    <nav class="main-nav">
        <ul>
            <!-- Navigation links -->
        </ul>
    </nav>
</header>

<nav>
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="features.php">Features</a></li>
        <li><a href="agriculture.php">Agriculture</a></li>
        <li><a href="business.php">Business</a></li>
        <li><a href="education.php">Education</a></li>
        <li><a href="empowerment.php">Empowerment</a></li>
        <li><a href="entertainment.php">Entertainment</a></li>
        <li><a href="adverts.php">Advertisment</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="donate.php">Donate Now</a></li>
    </ul>
</nav>
