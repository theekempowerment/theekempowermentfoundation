<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Theek Empowerment Foundation</title>
    <style>
        /* Reset and styling for basic text */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Keyframes for smooth animations */
        @keyframes backgroundMotion {
            0% { transform: scale(1) translateY(0); }
            50% { transform: scale(1.05) translateY(-10px); }
            100% { transform: scale(1) translateY(0); }
        }

        @keyframes imageMotion {
            0% { transform: translateX(0) scale(1); }
            50% { transform: translateX(10px) scale(1.05); }
            100% { transform: translateX(0) scale(1); }
        }

        /* Top section with moving background */
        .top-section {
            background-image: url('images/pic 1.jpg');
            background-size: cover;
            background-position: center;
            height: 700px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: red;
            text-align: center;
            position: relative;
            animation: backgroundMotion 10s ease-in-out infinite;
        }

        .top-section h1 {
            font-size: 3em;
            margin: 0;
        }

        /* Container for main content */
        .container {
            width: 80%;
            margin: auto;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        /* Style and animation for blocks */
        .block {
            display: flex;
            margin-bottom: 40px;
            border-radius: 8px;
            overflow: hidden;
            animation: backgroundMotion 8s ease-in-out infinite;
        }

        .block:nth-child(odd) {
            background-color: #f0f0f0;
        }

        .block:nth-child(even) {
            background-color: #e0e0e0;
        }

        /* Image inside each block with animation */
        .block img {
            width: 50%;
            object-fit: cover;
            animation: imageMotion 6s ease-in-out infinite;
        }

        .block .content {
            width: 50%;
            padding: 20px;
        }

        h2, h3 {
            color: #2c3e50;
        }

        p {
            line-height: 1.6;
        }

        ul {
            list-style-type: square;
            margin-left: 20px;
        }

        .content h3 {
            margin-top: 0;
        }

        /* Footer styles */
        footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 50px;
            margin-top: 100px;
        }
    </style>
</head>
<body>

    <!-- Top Section with Background Image -->
    <div class="top-section">
        <h1>About Theek Empowerment Foundation</h1>
    </div>

    <!-- Main Content -->
    <div class="container">
        <p>
            Theek Empowerment Foundation is a dynamic, forward-thinking non-governmental organization (NGO) that stands at the forefront of transformative change in rural and urban communities. Our mission is to uplift and empower individuals through sustainable initiatives in agriculture, education, youth, and adult empowerment.
        </p>

        <!-- Block 1: Agriculture and Sustainable Development -->
        <div class="block">
            <img src="The image/agric.jpg" alt="Agriculture Image">
            <div class="content">
                <h3>Agriculture and Sustainable Development</h3>
                <p>Agriculture remains the backbone of many developing economies. At Theek Empowerment Foundation, we are dedicated to improving agricultural practices for smallholder farmers and rural communities. We promote climate-smart agriculture, provide access to modern farming technologies, and support organic and sustainable farming practices.</p>
            </div>
        </div>

        <!-- Block 2: Education for All -->
        <div class="block">
            <img src="The image/prac 1.jpg" alt="Education Image">
            <div class="content">
                <h3>Education for All</h3>
                <p>Education is a powerful tool for breaking the cycle of poverty. Our education programs focus on providing quality education to underserved communities, building schools, offering scholarships, and supporting teacher training programs.</p>
            </div>
        </div>

        <!-- Block 3: Youth Empowerment -->
        <div class="block">
            <img src="images/pic 5.jpg" alt="Youth Image">
            <div class="content">
                <h3>Youth Empowerment</h3>
                <p>Youth are the future, and investing in them means investing in a brighter tomorrow. We provide leadership workshops, vocational training, mentoring, and support for youth-led initiatives to foster the next generation of leaders.</p>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <?php include 'footer.php'; ?>

</body>
</html>
