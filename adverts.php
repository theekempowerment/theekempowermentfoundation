<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advertisements - Theek International</title>
    <link rel="stylesheet" href="../styles.css">

    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header-background {
            background-image: url('images/pic 4.jpg'); /* Path to your background image */
            background-size: cover;
            background-position: center;
            height: 600px; /* Adjust the height as needed */
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        .container {
            padding: 20px;
        }
        /* Section Styling */
        .section {
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            color: #fff;
            display: flex;
            flex-direction: column;
            gap: 20px;
            background-color: #fff; /* Default background for sections */
            color: #000; /* Default text color for sections */
        }
        .section img {
            width: 100%; /* Make images responsive */
            border-radius: 8px;
        }
        /* Advertisement Block Styling */
        .advertisement {
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            color: #000;
            border: 2px solid #ddd; /* Light border for better separation */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Light shadow for depth */
        }
        /* Community Empowerments Section */
        .community {
            background-color: #1DB954; /* Green */
        }
        /* Education Learning Programs Section */
        .education {
            background-color: #4A90E2; /* Blue */
        }
        /* Business Section */
        .business {
            background-color: #E94E77; /* Pink */
        }
        /* Titles and Descriptions */
        .advert-title {
            font-weight: bold;
        }
        .advert-description {
            line-height: 1.5;
        }
        .advert-contact {
            font-weight: bold;
        }
        /* Video Section Styling */
        .video-section {
            padding: 20px;
            margin-top: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .video-section video {
            width: 100%;
            border-radius: 8px;
        }
        .video-section h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="header-background">
        <h1>Advertisements at Theek International</h1>
    </div>

    <div class="container">
        <!-- Community Empowerments Section -->
        <div class="section community">
            <h2>Community Empowerments</h2>
            <img src="images/pic 1.jpg" alt="Community Empowerments Image">
            <div class="advertisement">
                <h3><span class="advert-title">Empowerment Program 1</span></h3>
                <p><span class="advert-description">Join our community empowerment program to uplift underprivileged communities. Learn more about our initiatives and get involved!</span></p>
                <p><strong>Contact:</strong> <span class="advert-contact">contact@TheekInternational.com</span></p>
            </div>
            <div class="advertisement">
                <h3><span class="advert-title">Empowerment Program 2</span></h3>
                <p><span class="advert-description">We provide support and resources to help community projects thrive. Find out how you can contribute and make a difference.</span></p>
                <p><strong>Contact:</strong> <span class="advert-contact">support@TheekInternational.com</span></p>
            </div>
        </div>

        <!-- Education Learning Programs Section -->
        <div class="section education">
            <h2>Education Learning Programs</h2>
            <img src="path_to_education_image.jpg" alt="Education Learning Programs Image">
            <div class="advertisement">
                <h3><span class="advert-title">Learning Program 1</span></h3>
                <p><span class="advert-description">Our education programs are designed to enhance learning opportunities for students. Explore our range of courses and workshops.</span></p>
                <p><strong>Contact:</strong> <span class="advert-contact">education@TheekInternational.com</span></p>
            </div>
            <div class="advertisement">
                <h3><span class="advert-title">Learning Program 2</span></h3>
                <p><span class="advert-description">We offer various training programs for professionals to advance their skills. Check out our upcoming sessions and enroll today.</span></p>
                <p><strong>Contact:</strong> <span class="advert-contact">training@TheekInternational.com</span></p>
            </div>
        </div>

        <!-- Business Section -->
        <div class="section business">
            <h2>Business Advertisements</h2>
            <img src="path_to_business_image.jpg" alt="Business Advertisements Image">
            <div class="advertisement">
                <h3><span class="advert-title">Business Ad 1</span></h3>
                <p><span class="advert-description">Promote your business with our advertising services. Reach out to our extensive network and boost your brand visibility.</span></p>
                <p><strong>Contact:</strong> <span class="advert-contact">ads@TheekInternational.com</span></p>
            </div>
            <div class="advertisement">
                <h3><span class="advert-title">Business Ad 2</span></h3>
                <p><span class="advert-description">We offer tailored advertising solutions for various industries. Get in touch to create a custom ad package that suits your needs.</span></p>
                <p><strong>Contact:</strong> <span class="advert-contact">sales@TheekInternational.com</span></p>
            </div>
        </div>

        <!-- Video Section -->
        <div class="video-section">
            <h2>Featured Videos</h2>
            <video controls src="path_to_video_1.mp4" alt="Featured Video 1"></video>
            <video controls src="path_to_video_2.mp4" alt="Featured Video 2"></video>
            <p>Watch our featured videos to learn more about our programs and initiatives.</p>
        </div>
    </div>

    <!-- Footer Section -->
    <?php include 'footer.php'; ?>
</body>
</html>
