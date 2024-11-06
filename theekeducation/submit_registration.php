<?php
// Database connection parameters
$host = 'localhost'; // Change if needed
$db_name = 'theek'; // Change to your database name
$username = 'root'; // Change to your database username
$password = ''; // Change to your database password

try {
    // Create a PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL insert statement
    $stmt = $pdo->prepare("INSERT INTO student_registrations (
        first_name, middle_name, last_name, dob, gender, country_code, 
        phone, email, id_number, mode_of_learning, education_level, 
        additional_courses, physical_address, home_address, city, 
        state, postal_code, parent_name, relationship, parent_id, 
        parent_phone, parent_email, parent_address, emergency_contact_name, 
        emergency_contact_phone, relationship_emergency, signature, registration_date
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)");

    // Bind parameters and execute the statement
    $stmt->execute([
        $_POST['first_name'],
        $_POST['middle_name'],
        $_POST['last_name'],
        $_POST['dob'],
        $_POST['gender'],
        $_POST['country_code'],
        $_POST['phone'],
        $_POST['email'],
        $_POST['id_number'],
        $_POST['mode_of_learning'],
        $_POST['education_level'],
        $_POST['additional_courses'],
        $_POST['physical_address'],
        $_POST['home_address'],
        $_POST['city'],
        $_POST['state'],
        $_POST['postal_code'],
        $_POST['parent_name'],
        $_POST['relationship'],
        $_POST['parent_id'],
        $_POST['parent_phone'],
        $_POST['parent_email'],
        $_POST['parent_address'],
        $_POST['emergency_contact_name'],
        $_POST['emergency_contact_phone'],
        $_POST['relationship_emergency'],
        $_POST['signature'],
        $_POST['registration_date']
    ]);

    echo "Registration successful!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
