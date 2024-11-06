<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Theek Youth, Adult And Tuition Education Center</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: lightgreen;
        }

        /* Background image at the top */
        .hero {
            width: 100%;
            height: 400px;
            background-image: url('path_to_your_image.jpg'); /* Replace with your image path */
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }

        .hero h1 {
            font-size: 3rem;
            color: white;
        }

        h1 {
            text-align: center;
            color: #333;
            padding: 20px;
        }

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
            background-color: #333;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .section h2 {
            margin-bottom: 15px;
        }

        .section p {
            margin-bottom: 20px;
            text-align: left;
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

        .about, .youth-education, .adult-education, .tuition-services, .programs {
            background-size: cover;
            background-position: center;
        }

        /* Section specific background colors */
        .about {
            background-color: #4682B4; /* SteelBlue */
        }

        .youth-education {
            background-color: #32CD32; /* LimeGreen */
        }

        .adult-education {
            background-color: #FFD700; /* Gold */
        }

        .tuition-services {
            background-color: #FF6347; /* Tomato */
        }

        .programs {
            background-color: #6A5ACD; /* SlateBlue */
        }

        /* Responsive design for smaller screens */
        @media (max-width: 768px) {
            .section {
                flex: 1 1 100%; /* Full width on mobile */
            }
        }
    </style>
</head>
<body>

    <!-- Hero Section with Background Image -->
    <div class="hero">
        <h1>Welcome to Theek Youth, Adult And Tuition Education Center</h1>
    </div>

    <h1>About Theek Youth, Adult And Tuition Education Center</h1>
    
    <div class="container">

        <!-- About Theek -->
        <div class="section about">
            <h2>About Us</h2>
            <p>Theek Youth, Adult And Tuition Education Center is a comprehensive learning institution dedicated to providing accessible and quality education to individuals across all age groups. We specialize in three key areas of education: youth education, adult education, and tuition services. Our goal is to meet the diverse educational needs within Kenya's current system, offering both CBC and 8-4-4 programs. We nurture lifelong learners and support students with structured, personalized approaches.</p>
        </div>

        <!-- Youth Education -->
        <div class="section youth-education">
            <h2>Youth Education</h2>
            <p>Youth education is a core focus at Theek. We provide a robust foundation for both primary and secondary students within the CBC and 8-4-4 systems. Our programs emphasize critical thinking, problem-solving, creativity, and academic excellence through targeted revision and enrichment lessons.</p>
            <p><strong>Key Features of Youth Education:</strong></p>
            <ul style="text-align: left;">
                <li>Primary Education (CBC & 8-4-4)</li>
                <li>Secondary Education (8-4-4)</li>
                <li>Extracurricular Development</li>
            </ul>
        </div>

        <!-- Adult Education -->
        <div class="section adult-education">
            <h2>Adult Education</h2>
            <p>Our adult education programs are designed to meet the needs of adults seeking literacy or the completion of primary and secondary education. Flexible schedules allow learners to balance work, family, and education. We also offer vocational training to enhance career opportunities.</p>
            <p><strong>Key Features of Adult Education:</strong></p>
            <ul style="text-align: left;">
                <li>Basic Literacy Programs</li>
                <li>Primary & Secondary Education for Adults</li>
                <li>Life Skills & Vocational Training</li>
            </ul>
        </div>

        <!-- Tuition Services -->
        <div class="section tuition-services">
            <h2>Tuition Services</h2>
            <p>Our specialized tuition services support students in both the CBC and 8-4-4 systems. We offer personalized tuition to cater to individual learning needs, focusing on key competencies and exam preparation.</p>
            <p><strong>Key Features:</strong></p>
            <ul style="text-align: left;">
                <li>Individualized Learning</li>
                <li>CBC Support</li>
                <li>Exam Preparation (8-4-4)</li>
                <li>Subject-Specific Coaching</li>
            </ul>
        </div>

        <!-- Programs Offered -->
        <div class="section programs">
            <h2>Programs Offered</h2>
            <p>At Theek, we offer programs for different educational needs:</p>
            <ul style="text-align: left;">
                <li>Basic Literacy</li>
                <li>Primary Education (CBC & 8-4-4)</li>
                <li>Secondary Education (8-4-4)</li>
            </ul>
        </div>

    </div>

</body>
</html>
