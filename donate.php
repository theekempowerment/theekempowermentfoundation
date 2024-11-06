
<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate to Theek International</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 60%;
            margin: auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        .row > div {
            flex: 1;
            padding: 0 10px;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #2c3e50;
            color: white;
            border: none;
            cursor: pointer;
            padding: 15px;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #34495e;
        }
        .message {
            font-size: 18px;
            color: #555;
            margin-bottom: 20px;
        }
        .motivation {
            font-size: 16px;
            color: #333;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form inputs
    $fname = htmlspecialchars($_POST['fname']);
    $sname = htmlspecialchars($_POST['sname']);
    $lname = htmlspecialchars($_POST['lname']);
    $country_code = htmlspecialchars($_POST['country_code']);
    $phone = htmlspecialchars($_POST['phone']);
    $payment_method = htmlspecialchars($_POST['payment_method']);
    $amount = htmlspecialchars($_POST['amount']);
    $donation_for = htmlspecialchars($_POST['donation_for']);

    // Here you can write the code to process the donation, such as redirecting to a payment gateway or storing the data

    echo "<div class='message'>Thank you for your generous donation! Your contribution is greatly appreciated and will make a significant impact.</div>";
}
?>

<div class="container">
    <h1>Make a Donation</h1>
    
    <p class="motivation">
        At Theek International, every contribution counts. Your donation helps us to advance our mission, supporting vital programs and initiatives that make a real difference in the world. Whether you're funding education for underprivileged children, providing essential resources for businesses, or supporting our entertainment and agricultural projects, your generosity creates ripples of positive change.
    </p>

    <form action="donate.php" method="POST">
        
        <!-- First Name, Second Name, and Last Name in one row -->
        <div class="row">
            <div>
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="fname" required>
            </div>
            <div>
                <label for="sname">Second Name</label>
                <input type="text" id="sname" name="sname" required>
            </div>
            <div>
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lname" required>
            </div>
        </div>

        <!-- Country Code and Phone Number in one row -->
        <div class="row">
            <div>
                <label for="country_code">Country Code</label>
                <input type="tel" id="country_code" name="country_code" placeholder="+123" required>
            </div>
            <div>
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="4567890" required>
            </div>
        </div>

        <!-- Payment Method -->
        <label for="payment_method">Payment Method</label>
        <select id="payment_method" name="payment_method" required>
            <option value="paypal">PayPal</option>
            <option value="pesapal">Pesapal</option>
            <option value="bank">Bank Transfer</option>
            <option value="mpesa">M-Pesa</option>
        </select>

        <!-- Amount -->
        <label for="amount">Donation Amount</label>
        <input type="number" id="amount" name="amount" min="1" step="any" required>

        <!-- Donation Purpose -->
        <label for="donation_for">Donating For</label>
        <select id="donation_for" name="donation_for" required>
            <option value="education">Education</option>
            <option value="business_support">Business Support</option>
            <option value="ngo_program">NGO Program</option>
            <option value="entertainment_equipment">Entertainment Equipment</option>
            <option value="agricultural">Agricultural</option>
            <option value="media_equipment">Media Equipment</option>
            <option value="gifts">Gifts</option>
            <option value="appreciation">Appreciation</option>
        </select>

        <!-- Submit Button -->
        <input type="submit" value="Donate">
    </form>
</div>

<!-- Footer Section -->
<?php include 'footer.php'; ?>

</body>
</html>
