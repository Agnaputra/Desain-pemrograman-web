<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if 'input' key exists in $_POST
    if (isset($_POST['input'])) {
        $input = $_POST['input'];
        // Sanitize the text input to prevent HTML injection
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        
        // Process the sanitized input
        echo "Sanitized Input: " . $input . "<br>";
    }

    // Validate and process the email
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        
        // Validate the email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Continue with safe email processing
            echo "Valid Email: " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        } else {
            // Handle invalid email input
            echo "Invalid Email format.";
        }
    }
} else {
    echo "Form not submitted.";
}
?>
