<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Assignment</title>
    <style>
        /* Body and Background */
        body {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #444;
        }

        /* Container styling */
        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.2);
            width: 450px;
            text-align: center;
        }

        /* Header */
        h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
            font-weight: 600;
        }

        /* Success Message */
        .success-message {
            color: #28a745;
            font-size: 16px;
            margin-bottom: 20px;
            display: none; /* Initially hidden */
        }

        /* Form styling */
        form {
            display: flex;
            flex-direction: column;
            align-items: stretch;
        }

        label {
            font-size: 14px;
            font-weight: 600;
            color: #555;
            margin-bottom: 6px;
            text-align: left;
            display: block;
        }

        /* Input fields */
        input[type="text"], input[type="file"] {
            padding: 12px;
            font-size: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 16px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus, input[type="file"]:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 6px rgba(106, 17, 203, 0.2);
            outline: none;
        }

        /* Submit Button */
        input[type="submit"] {
            background-color: #6a11cb;
            color: #fff;
            border: none;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #2575fc;
            transform: translateY(-2px);
        }

        input[type="submit"]:active {
            background-color: #1a5bb8;
            transform: translateY(0);
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Upload Assignment</h1>

    <?php
    // Display success message if the file was uploaded successfully
    if (isset($_GET['success']) && $_GET['success'] == 1) {
        echo "<p class='success-message' id='successMessage'>Your file has been uploaded successfully!</p>";
    }
    ?>

    <form action="uploadAssignmentToMembers.php" method="POST" enctype="multipart/form-data">
        <label for="title">Assignment Title:</label>
        <input type="text" id="title" name="title" required placeholder="Enter the title of your assignment">

        <label for="file">Select File (Document, Image, or Video):</label>
        <input type="file" id="file" name="file" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.gif,.mp4,.webm,.ogg" required>

        <input type="submit" name="submit" value="Upload Assignment">
    </form>
</div>

<script>
    // Check if the success message is present
    const successMessage = document.getElementById('successMessage');
    if (successMessage) {
        successMessage.style.display = 'block'; // Show the message

        // Redirect after 3 seconds
        setTimeout(function() {
            window.location.href = 'assignment.php'; // Redirect to assignment.php
        }, 3000);
    }
</script>

</body>
</html>
