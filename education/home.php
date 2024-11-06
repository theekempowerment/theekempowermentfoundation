<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our School Website</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: skyblue;
        }

        /* Styles for the background image at the top */
        .hero-section {
            height: 400px; /* Adjust height as needed */
            background-image: url('path_to_your_image.jpg'); /* Replace with your image */
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            color: green;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 48px;
        
            margin: 0;
        }

        /* Section layout */
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 0 auto;
            max-width: 1200px;
        }

        .section {
            flex: 1 1 calc(50% - 40px); /* 50% width minus margin */
            margin: 20px;
            padding: 40px;
            color: #fff;
            text-align: center;
            border-radius: 8px;
            background-size: cover;
            background-position: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .section h2 {
            margin-bottom: 15px;
        }

        .section p {
            margin-bottom: 20px;
        }

        .section a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #fff;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        /* Different color backgrounds for balance */
        .advert {
            background-color: #FF6347;
        }

        .about-us {
            background-color: #4682B4;
        }

        .contact-us {
            background-color: #32CD32;
        }

        .Our-services {
            background-color: ##007FFF;
        }


        .register {
            background-color: #FFD700;
        }

        .programmes {
            background-color: #FF4500;
        }

        .resources {
            background-color: #6A5ACD;
        }

        .support-school {
            background-color: #20B2AA;
        }

        /* Responsive design for smaller screens */
        @media (max-width: 768px) {
            .section {
                flex: 1 1 100%; /* Full width on mobile */
            }

            .hero-section h1 {
                font-size: 32px; /* Make the heading smaller on mobile */
            }
        }
    </style>
</head>
<body>

    <!-- Background Image Section -->
    <div class="hero-section">
        <h1>Welcome to Theek Youth, Adult And Tuition Education Center</h1>
    </div>

    <div class="container">

        <!-- Advert Section -->
        <div class="section advert">
            <h2>Advert Section</h2>
            <p>Stay updated with the latest offers and promotions that help our school thrive.</p>
            <a href="advert.php">Learn More</a>
        </div>

        <!-- About Us Section -->
<div class="section about-us">
    <h2>About Us</h2>
    <p>Discover our school’s rich history and the values that have shaped our mission over the years.</p>
    <a href="aboutus.php">Our Story</a> <!-- Updated link to aboutus.php -->
</div>


 <!-- Our Services Section -->
 <div class="section about-us">
            <h2>Our Services</h2>
            <p>Discover our school’s rich history and the values that have shaped our mission over the years.</p>
            <a href="services.php">Our Service</a>
        </div>

        <!-- Contact Us Section -->
        <div class="section contact-us">
            <h2>Contact Us</h2>
            <p>Have questions? Reach out to our dedicated team for more information.</p>
            <a href="contact.php">Get in Touch</a>
        </div>

        <!-- Register Section -->
        <div class="section register">
            <h2>Register</h2>
            <p>Join our community! Sign up for courses and become part of our educational journey.</p>
            <a href="register.php">Register Now</a>
        </div>

        <!-- Programmes Section -->
        <div class="section programmes">
            <h2>Programmes</h2>
            <p>Explore our wide range of academic and extracurricular programs designed to inspire students.</p>
            <a href="programmes.php">View Programmes</a>
        </div>

        <!-- Resources Section -->
        <div class="section resources">
            <h2>Resources</h2>
            <p>Access a variety of learning materials and resources that empower both students and teachers.</p>
            <a href="resources.php">Access Resources</a>
        </div>

        <!-- Support Our School Section -->
        <div class="section support-school">
            <h2>Support Our School</h2>
            <p>Your generous contributions help us maintain and grow our school’s legacy of excellence.</p>
            <a href="support.php">Support Us</a>
        </div>

    </div>

</body>
</html>
