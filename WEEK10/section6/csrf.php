<?php
header('Content-Type: application/json');
session_start();  // Start the session for CSRF token handling

// Generate a CSRF token if not already set
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Retrieve headers and validate CSRF token
$headers = apache_request_headers();
if (isset($headers['Csrf-Token'])) {
    if ($headers['Csrf-Token'] !== $_SESSION['csrf_token']) {
        // CSRF token mismatch
        exit(json_encode(['error' => 'Wrong CSRF token.']));
    }
} else {
    // CSRF token not provided in the request headers
    exit(json_encode(['error' => 'No CSRF token.']));
}

// If token validation is successful, the script can proceed to process the request
// Your main processing code here

?>
