<?php
/* Registration process, inserts user info into the database
   and sends account confirmation email message
 */

// Initialize session
session_start();

// Include database connection
include_once("db_connect.php");

// Function to sanitize and validate input
function sanitize_input($input) {
    return filter_var(trim($input), FILTER_SANITIZE_STRING);
}

// Function to generate a random hash
function generate_random_hash() {
    return md5(uniqid(rand(), true));
}

// Function to send account confirmation email
function send_confirmation_email($email, $hash) {
    // Implement email sending logic here
}

// Sanitize and validate input
$first_name = sanitize_input($_POST['firstname']);
$last_name = sanitize_input($_POST['lastname']);
$email = sanitize_input($_POST['email']);
$password = sanitize_input($_POST['password']);

// Hash password
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
if ($result->num_rows > 0) {
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
    exit();
}

// Generate random hash
$hash = generate_random_hash();

// Insert user into the database
$sql = "INSERT INTO users (first_name, last_name, email, password, hash) VALUES (?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sssss", $first_name, $last_name, $email, $password_hash, $hash);

if ($stmt->execute()) {
    // Registration successful
    $_SESSION['registered'] = true;

    // Send account confirmation email
    send_confirmation_email($email, $hash);

    // Redirect to success page or login page
    header("location: registration_success.php");
} else {
    // Registration failed
    $_SESSION['message'] = 'Registration failed!';
    header("location: error.php");
}

$stmt->close();
$mysqli->close();
?>
