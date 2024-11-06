<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - Theek Youth, Adult And Tuition Education Center</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: grey;
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
            padding: 20px;
        }

        .section {
            flex: 1 1 calc(50% - 40px); /* 50% width minus margin */
            margin: 20px;
            padding: 20px;
            color: #fff;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .youth-education {
            background-color: #4CAF50; /* Green */
        }

        .adult-education {
            background-color: #2196F3; /* Blue */
        }

        .tuition-services {
            background-color: #FF9800; /* Orange */
        }

        .life-skills {
            background-color: #9C27B0; /* Purple */
        }

        .career-guidance {
            background-color: #FF5722; /* Deep Orange */
        }

        .community-outreach {
            background-color: #3F51B5; /* Indigo */
        }

        .programs-offered {
            background-color: #009688; /* Teal */
        }

        .section h2 {
            margin-bottom: 15px;
        }

        .section p {
            margin-bottom: 20px;
            text-align: left;
        }

        .section ul {
            list-style-type: none;
            padding: 0;
            text-align: left;
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
        <h1>Our Services</h1>
    </div>

    <h1>Services Offered by Theek Youth, Adult And Tuition Education Center</h1>

    <div class="container">
        <!-- Youth Education Section -->
        <div class="section youth-education">
            <h2>Youth Education</h2>
            <p>Programs tailored for youth under both the Competency-Based Curriculum (CBC) and the 8-4-4 system.</p>
            <ul>
                <li>Primary Education</li>
                <li>Secondary Education</li>
                <li>Extracurricular Activities</li>
            </ul>
        </div>

        <!-- Adult Education Section -->
        <div class="section adult-education">
            <h2>Adult Education</h2>
            <p>Opportunities for adults to continue their education and develop essential skills.</p>
            <ul>
                <li>Basic Literacy Programs</li>
                <li>Adult Primary and Secondary Education</li>
                <li>Vocational Training</li>
            </ul>
        </div>

        <!-- Tuition Services Section -->
        <div class="section tuition-services">
            <h2>Tuition Services</h2>
            <p>Personalized tutoring sessions to meet the unique needs of each student.</p>
            <ul>
                <li>Individualized Tuition</li>
                <li>CBC Support</li>
                <li>Exam Preparation</li>
            </ul>
        </div>

        <!-- Life Skills Development Section -->
        <div class="section life-skills">
            <h2>Life Skills Development</h2>
            <p>Programs to enhance essential life skills for personal and professional growth.</p>
            <ul>
                <li>Workshops and Seminars</li>
                <li>Counseling Services</li>
            </ul>
        </div>

        <!-- Career Guidance Section -->
        <div class="section career-guidance">
            <h2>Career Guidance</h2>
            <p>Support in making informed career choices and finding opportunities.</p>
            <ul>
                <li>Career Counseling</li>
                <li>Internship and Job Placement Assistance</li>
            </ul>
        </div>

        <!-- Community Outreach Section -->
        <div class="section community-outreach">
            <h2>Community Outreach</h2>
            <p>Initiatives to promote the importance of education in the community.</p>
            <ul>
                <li>Awareness Campaigns</li>
                <li>Collaboration with Local Organizations</li>
            </ul>
        </div>

        <!-- Programs Offered for the 8-4-4 System -->
        <div class="section programs-offered">
            <h2>Programs Offered for the 8-4-4 System</h2>
            <p>Languages and Subjects offered to ensure a comprehensive education.</p>
            <h3>Languages:</h3>
            <ul>
                <li>English</li>
                <li>Kiswahili</li>
                <li>French</li>
            </ul>
            <h3>Subjects:</h3>
            <ul>
                <li>Mathematics</li>
                <li>Biology</li>
                <li>Chemistry</li>
                <li>Physics</li>
                <li>History</li>
                <li>Geography</li>
                <li>Christian Religious Education (CRE)</li>
                <li>Business Studies</li>
                <li>Agriculture</li>
                <li>Home Science</li>
            </ul>
        </div>
    </div>

</body>
</html>
