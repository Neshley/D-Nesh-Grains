<?php
// Example: hardcoded credentials (for testing only)
$valid_username = "admin";
$valid_password = "12345";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];


    if ($username === $valid_username && $password === $valid_password) {
        // Start a session
        session_start();
        $_SESSION['username'] = $username;


        // Redirect to your main website page
        header("Location: index.html");
        exit();
    } else {
        echo "Invalid username or password.";
    }
}
?>
