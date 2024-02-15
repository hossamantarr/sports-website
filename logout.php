<?php
/* Log out process, unsets and destroys session variables */
session_start();

// CSRF protection: generate and store CSRF token
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check CSRF token
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("CSRF token validation failed.");
    }

    // Clear session variables
    session_unset();
    session_destroy();

    // Regenerate session ID for security
    session_regenerate_id(true);

    // Redirect to main page
    header("location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/logForm.css">
  <title>Logout</title>
</head>

<body>
    <div class="forma" style="background-color: #222;">
        <h1>Thanks for using our website</h1>
        <p><?= 'You have been successfully logged out!'; ?></p>
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">
            <button type="submit" class="button-block" style="background-color:#3c643c; font-size: 2rem;
                font-weight: 500; text-transform: uppercase; color: white; border:none;">
                Return to the main page
            </button>
        </form>
    </div>
</body>
</html>
