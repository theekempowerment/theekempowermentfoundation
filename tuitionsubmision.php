<?php
// Start session if needed
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'theek');

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize and retrieve the form data
    $first_name = $conn->real_escape_string($_POST['first_name']);
    $second_name = $conn->real_escape_string($_POST['second_name']);
    $last_name = $conn->real_escape_string($_POST['last_name']);
    $phone_number = $conn->real_escape_string($_POST['phone_number']);
    $email = $conn->real_escape_string($_POST['email']);
    $nationality = $conn->real_escape_string($_POST['nationality']);
    $current_address = $conn->real_escape_string($_POST['current_address']);
    $education_system = $conn->real_escape_string($_POST['education_system']);
    $cbc_grade = isset($_POST['cbc_grade']) ? $conn->real_escape_string($_POST['cbc_grade']) : null;
    $form_level = isset($_POST['form_level']) ? $conn->real_escape_string($_POST['form_level']) : null;
    $parent_name = $conn->real_escape_string($_POST['parent_name']);
    $parent_phone = $conn->real_escape_string($_POST['parent_phone']);
    $parent_id = $conn->real_escape_string($_POST['parent_id']);
    $fee_payer_name = $conn->real_escape_string($_POST['fee_payer_name']);
    $fee_payer_phone = $conn->real_escape_string($_POST['fee_payer_phone']);

    // Prepare the SQL statement to insert the data
    $sql = "INSERT INTO tuition_applications (
                first_name, second_name, last_name, phone_number, email, nationality, current_address,
                education_system, cbc_grade, form_level,
                parent_name, parent_phone, parent_id,
                fee_payer_name, fee_payer_phone
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        // Bind the parameters to the SQL query
        $stmt->bind_param(
            "sssssssssssssss",
            $first_name, $second_name, $last_name, $phone_number, $email, $nationality, $current_address,
            $education_system, $cbc_grade, $form_level,
            $parent_name, $parent_phone, $parent_id,
            $fee_payer_name, $fee_payer_phone
        );

        // Execute the statement
        if ($stmt->execute()) {
            echo "Tuition application submitted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error in preparing the SQL query.";
    }

    // Close the database connection
    $conn->close();
}
?>
