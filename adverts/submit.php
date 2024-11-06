<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Personal Information
    $first_name = $_POST['first_name'];
    $second_name = $_POST['second_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $alt_phone = $_POST['alt_phone'];
    $email = $_POST['email'];
    $country_code = $_POST['country_code'];
    $gender = $_POST['gender'];
    $marital_status = $_POST['marital_status'];
    $nationality = $_POST['nationality'];
    $county = $_POST['county'];
    $subcounty = $_POST['subcounty'];
    $ward = $_POST['ward'];
    $country = $_POST['country'];
    $current_address = $_POST['current_address'];

    // Education Details
    $education_level = $_POST['education_level'];
    $education_details1 = $_POST['education_details1'];
    $education_details2 = $_POST['education_details2'];

    // Mode of Learning
    $learning_mode = $_POST['learning_mode'];
    $learning_mode_more = $_POST['learning_mode_more'];
    $additional_courses = $_POST['additional_courses'];

    // Parent/Guardian Information
    $guardian_full_name = $_POST['guardian_full_name'];
    $guardian_phone = $_POST['guardian_phone'];
    $guardian_alt_phone = $_POST['guardian_alt_phone'];
    $guardian_id = $_POST['guardian_id'];
    $guardian_current_address = $_POST['guardian_current_address'];
    $guardian_relationship = $_POST['guardian_relationship'];

    // Additional Information
    $who_pays_fees = $_POST['who_pays_fees'];
    $payer_phone = $_POST['payer_phone'];

    // Declaration
    $declaration_check = isset($_POST['declaration_check']) ? true : false;

    // Store data into the database or process as needed

    // Example: Redirect to a success page or display a message
    echo "Thank you for your submission!";
}
?>
