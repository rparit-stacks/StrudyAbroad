<?php
session_start();

// Database connection details
$servername = "localhost";
$username = "u974036710_study";
$password = "Babita@111288";
$dbname = "u974036710_study";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input data
function sanitizeInput($data) {
    global $conn;
    return htmlspecialchars(strip_tags($conn->real_escape_string($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and collect form data
    $firstName = sanitizeInput($_POST['firstName']);
    $lastName = sanitizeInput($_POST['lastName']);
    $email = sanitizeInput($_POST['email']);
    $phone = sanitizeInput($_POST['phone']);
    $country = sanitizeInput($_POST['country']);

    // Insert data into database
    $sql = "INSERT INTO leads (firstName, lastName, email, phone, country) VALUES ('$firstName', '$lastName', '$email', '$phone', '$country')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Lead information submitted successfully.";
    } else {
        $_SESSION['message'] = "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Redirect back to the form page with a success or error message
    header("Location: form_page.php");
    exit();
}

$conn->close();
?>