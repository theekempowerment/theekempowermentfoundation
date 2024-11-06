<?php
session_start(); // Start session to access the message
include 'header.php';

// Store message and clear it from the session
$uploadMessage = isset($_SESSION['upload_message']) ? $_SESSION['upload_message'] : '';
unset($_SESSION['upload_message']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Theek International</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: green;
            padding-top: 110px;
        }

        .header-image {
            background-image: url('kevhab.jpg');
            height: 750px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .wrapper {
            display: flex;
        }
        .sidebar {
            width: 25%;
            background-color: #E23D28;
            color: green;
            height: 100vh;
            padding: 20px;
            box-sizing: border-box;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .sidebar a {
            display: block;
            color: white;
            padding: 10px;
            margin: 5px 0;
            text-decoration: none;
            background-color: green;
            border-radius: 5px;
            text-align: center;
        }
        .sidebar a:hover {
            background-color: blue;
        }
        .dashboard {
            width: 75%;
            padding: 20px;
            background-color: #ADFF2F;
            min-height: 100vh;
        }

        /* Success message styles */
        .success-message {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
        }

        /* Upload form styling */
        .upload-section {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .upload-section h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 15px;
            border-bottom: 2px solid #ccc;
            padding-bottom: 10px;
        }

        .upload-section label {
            font-weight: bold;
            display: block;
            margin: 10px 0 5px;
        }

        .upload-section select,
        .upload-section input[type="file"],
        .upload-section textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .upload-section textarea {
            resize: vertical;
        }

        .upload-section input[type="submit"] {
            background-color: green;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            display: inline-block;
        }

        .upload-section input[type="submit"]:hover {
            background-color: darkgreen;
        }

        /* Members section styling */
        .members-section, .users-section {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .members-section h2, .users-section h2 {
            margin-bottom: 15px;
        }
    </style>

    <script>
        // Function to refresh the page after 4 seconds
        function refreshDashboard() {
            setTimeout(function() {
                location.reload(); // Reload the page
            }, 4000); // Wait for 4 seconds
        }

        // Function to dynamically load the upload form content into the dashboard
        function loadContent(page) {
            const dashboard = document.getElementById('dashboard-content');

            let content = `
                <div class="upload-section">
                    <h2>Upload to ${page.charAt(0).toUpperCase() + page.slice(1)}</h2>
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="page" value="${page}">
                        <label for="upload-type">Select Upload Type:</label>
                        <select id="upload-type" name="upload_type" onchange="showUploadFields()">
                            <option value="image">Images with Text</option>
                            <option value="document">Documents with Text</option>
                            <option value="video">Videos with Text</option>
                        </select><br><br>

                        <!-- Image Upload Section -->
                        <div id="image-upload" style="display: none;">
                            <label for="file">Upload Image(s):</label>
                            <input type="file" name="file[]" id="file" accept="image/*" multiple><br><br>
                            <label for="description">Enter Text for Images:</label>
                            <textarea name="description" rows="4"></textarea><br>
                        </div>

                        <!-- Document Upload Section -->
                        <div id="document-upload" style="display: none;">
                            <label for="file">Upload Document(s):</label>
                            <input type="file" name="file[]" id="file" accept=".pdf,.doc,.docx,.txt" multiple><br><br>
                            <label for="description">Enter Text for Documents:</label>
                            <textarea name="description" rows="4"></textarea><br>
                        </div>

                        <!-- Video Upload Section -->
                        <div id="video-upload" style="display: none;">
                            <label for="file">Upload Video(s):</label>
                            <input type="file" name="file[]" id="file" accept="video/*" multiple><br><br>
                            <label for="description">Enter Text for Videos:</label>
                            <textarea name="description" rows="4"></textarea><br>
                        </div>

                        <input type="submit" value="Upload">
                    </form>
                </div>
            `;
            dashboard.innerHTML = content; // Update the dashboard content with the form
        }

        // Function to load the Members Dashboard content
        function loadMembersDashboard() {
            const dashboard = document.getElementById('dashboard-content');
            let membersContent = `
                <div class="members-section">
                    <h2>Members Dashboard</h2>
                    <p>Here you can view and manage all the members of your platform.</p>
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr>
                            <th style="border: 1px solid #ccc; padding: 8px; text-align: left;">Member ID</th>
                            <th style="border: 1px solid #ccc; padding: 8px; text-align: left;">Name</th>
                            <th style="border: 1px solid #ccc; padding: 8px; text-align: left;">Email</th>
                            <th style="border: 1px solid #ccc; padding: 8px; text-align: left;">Status</th>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #ccc; padding: 8px;">1</td>
                            <td style="border: 1px solid #ccc; padding: 8px;">John Doe</td>
                            <td style="border: 1px solid #ccc; padding: 8px;">john@example.com</td>
                            <td style="border: 1px solid #ccc; padding: 8px;">Active</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #ccc; padding: 8px;">2</td>
                            <td style="border: 1px solid #ccc; padding: 8px;">Jane Smith</td>
                            <td style="border: 1px solid #ccc; padding: 8px;">jane@example.com</td>
                            <td style="border: 1px solid #ccc; padding: 8px;">Inactive</td>
                        </tr>
                        <!-- Additional members can be added here -->
                    </table>
                </div>
            `;
            dashboard.innerHTML = membersContent;a // Update the dashboard content with the members dashboard
        }

        // Function to load the Users Dashboard content
        function loadUsersDashboard() {
            const dashboard = document.getElementById('dashboard-content');
            let usersContent = `
                <div class="users-section">
                    <h2>Users Dashboard</h2>
                    <p>Here you can view and manage all the users of your platform.</p>
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr>
                            <th style="border: 1px solid #ccc; padding: 8px; text-align: left;">User ID</th>
                            <th style="border: 1px solid #ccc; padding: 8px; text-align: left;">Username</th>
                            <th style="border: 1px solid #ccc; padding: 8px; text-align: left;">Email</th>
                            <th style="border: 1px solid #ccc; padding: 8px; text-align: left;">Role</th>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #ccc; padding: 8px;">1</td>
                            <td style="border: 1px solid #ccc; padding: 8px;">user_one</td>
                            <td style="border: 1px solid #ccc; padding: 8px;">user1@example.com</td>
                            <td style="border: 1px solid #ccc; padding: 8px;">Admin</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #ccc; padding: 8px;">2</td>
                            <td style="border: 1px solid #ccc; padding: 8px;">user_two</td>
                            <td style="border: 1px solid #ccc; padding: 8px;">user2@example.com</td>
                            <td style="border: 1px solid #ccc; padding: 8px;">Member</td>
                        </tr>
                        <!-- Additional users can be added here -->
                    </table>
                </div>
            `;
            dashboard.innerHTML = usersContent; // Update the dashboard content with the users dashboard
        }

        // Function to show the relevant upload fields based on selection
        function showUploadFields() {
            const uploadType = document.getElementById('upload-type').value;
            document.getElementById('image-upload').style.display = uploadType === 'image' ? 'block' : 'none';
            document.getElementById('document-upload').style.display = uploadType === 'document' ? 'block' : 'none';
            document.getElementById('video-upload').style.display = uploadType === 'video' ? 'block' : 'none';
        }
    </script>
</head>
<body>

<div class="header-image"></div>

<div class="wrapper">
    <div class="sidebar">
        <h2>Menu</h2>
        <a href="javascript:void(0);" onclick="loadContent('resources')">Upload to Resources</a>
        <a href="javascript:void(0);" onclick="loadContent('advertisement')">Upload to Advertisement</a>
        <a href="javascript:void(0);" onclick="loadContent('home')">Upload to Home</a>
        <a href="javascript:void(0);" onclick="loadContent('business')">Upload to Business</a>
        <a href="javascript:void(0);" onclick="loadContent('empowerment')">Upload to Empowerment</a>
        <a href="javascript:void(0);" onclick="loadContent('agriculture')">Upload to Agriculture</a>
        <a href="javascript:void(0);" onclick="loadContent('entertainment')">Upload to Entertainment</a>
        <a href="javascript:void(0);" onclick="loadContent('education')">Upload to Education</a>
        <a href="javascript:void(0);" onclick="loadMembersDashboard()">View Members</a> <!-- Link for Members Dashboard -->
        <a href="javascript:void(0);" onclick="loadUsersDashboard()">View Users</a> <!-- New link for Users Dashboard -->
    </div>

    <div class="dashboard" id="dashboard-content">
        <?php if ($uploadMessage): ?>
            <div class="success-message"><?php echo $uploadMessage; ?></div>
        <?php else: ?>
            <h1>Welcome to the Admin Dashboard</h1>
            <p>Select a section from the menu to upload content.</p>
        <?php endif; ?>
    </div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>
