<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Entertainment | Theek International</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .header-background {
            background-image: url('images/pic 1.jpg'); /* Path to your background image */
            background-size: cover;
            background-position: center;
            height: 600px; /* Adjust the height as needed */
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        .container {
            width: 85%;
            margin: auto;
            overflow: hidden;
            padding: 20px;
            background-color: white;
            margin-top: 0px; /* To overlap the background image if necessary */
            border-radius: 8px;
        }
        h1, h2, h3 {
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .section {
            margin-bottom: 30px;
        }
        .section p {
            line-height: 1.6;
            margin-bottom: 15px;
        }
        .platforms {
            display: flex;
            flex-wrap: wrap;
        }
        .platform {
            flex: 1 1 45%;
            background-color: #ecf0f1;
            margin: 10px;
            padding: 15px;
            border-radius: 5px;
        }
        .platform h3 {
            margin-top: 0;
        }
        .social-media {
            text-align: center;
            margin-top: 40px;
        }
        .social-media a {
            margin: 0 10px;
            text-decoration: none;
        }
        .social-media img {
            width: 40px;
            height: 40px;
        }
        @media (max-width: 768px) {
            .platform {
                flex: 1 1 100%;
            }
            .container {
                width: 95%;
            }
        }

        /* Latest Updates Section */
        .latest-updates {
            margin-top: 50px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .latest-updates h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .update-item {
            display: flex;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }

        .update-item img,
        .update-item video {
            width: 40%; /* Image/Video on the left side, takes 40% of space */
            object-fit: cover;
        }

        .update-text {
            padding: 20px;
            width: 60%; /* Text on the right side, takes 60% of space */
        }

        .update-text p {
            margin: 0;
            font-size: 16px;
            line-height: 1.4;
        }

        /* Upload form styling */
        .latest-updates form {
            display: flex;
            flex-direction: column;
        }

        .latest-updates input[type="text"],
        .latest-updates textarea {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .latest-updates input[type="file"],
        .latest-updates input[type="url"] {
            margin-bottom: 20px;
        }

        .latest-updates input[type="submit"] {
            padding: 10px;
            background-color: #0056b3;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="header-background">
    <h1>Entertainment at Theek International</h1>
   </div>
</div>

<div class="container">
    <div class="section">
        <p>
            The Entertainment section of Theek International is dedicated to providing engaging and enriching experiences for both youth and adults. We focus on blending creativity, culture, and fun through various platforms that promote personal and community growth.
        </p>
    </div>

    <div class="section">
        <h2>Our Platforms</h2>
        <div class="platforms">
            <!-- Shooting Episodes and Short Movies -->
            <div class="platform">
                <h3>Shooting Episodes & Short Movies</h3>
                <p>
                    We produce compelling episodes and short films that highlight social issues, inspire change, and showcase local talents. Our productions aim to educate and entertain, fostering a deeper understanding of community challenges and triumphs.
                </p>
            </div>
            <!-- Talks and Engagements -->
            <div class="platform">
                <h3>Talks & Engagements</h3>
                <p>
                    Our talks and engagement sessions feature thought leaders, experts, and influencers who share insights on various topics. These events encourage dialogue, knowledge sharing, and active participation from the audience.
                </p>
            </div>
            <!-- Motivational Talks -->
            <div class="platform">
                <h3>Motivational Talks</h3>
                <p>
                    We host motivational speakers who inspire individuals to achieve personal and professional growth. These sessions aim to empower attendees with the confidence and tools needed to overcome challenges and pursue their goals.
                </p>
            </div>
            <!-- Live Streams Linked with Social Media -->
            <div class="platform">
                <h3>Live Streams</h3>
                <p>
                    Our live streams bring real-time content to a broader audience through social media platforms. We cover events, interviews, and performances, allowing viewers to engage with us from anywhere in the world.
                </p>
            </div>
        </div>
    </div>

    <!-- Latest Updates Section -->
    <div class="latest-updates section">
        <h2>Latest Updates</h2>

        <!-- Example of an update with image -->
        <div class="update-item">
            <img src="path_to_image_1.jpg" alt="Update Image 1">
            <div class="update-text">
                <p>Update Text 1: This is a sample update text that goes alongside the image. It can describe the content of the image or share a message.</p>
            </div>
        </div>

        <!-- Example of an update with video -->
        <div class="update-item">
            <video controls src="path_to_video_1.mp4" alt="Update Video 1"></video>
            <div class="update-text">
                <p>Update Text 2: This is a sample update text for the video. It can describe the content of the video or provide additional information.</p>
            </div>
        </div>

        <!-- Example of an update (replace this with dynamic content) -->
        <div class="update-item">
            <img src="path_to_image_1.jpg" alt="Update Image 1">
            <div class="update-text">
                <p>Update Text 1: This is a sample update text that goes alongside the image. It can describe the content of the image or share a message.</p>
            </div>
        </div>

        <div class="update-item">
            <img src="path_to_image_2.jpg" alt="Update Image 2">
            <div class="update-text">
                <p>Update Text 2: Another example of text that is shown on the right side of the image. You can write anything here related to the update.</p>
            </div>

        </div>
    </div>
</div>

<!-- Footer Section -->
<?php include 'footer.php'; ?>

</body>
</html>
