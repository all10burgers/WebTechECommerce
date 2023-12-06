
<?php
// If the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    // Simulate email sign-up success (in production, you would handle sign-up logic here)
    echo '<script>alert("Thank you for signing up for email notifications!");</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="path_to_your_css/email_signup_style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up for Email Notifications</title>
</head>
<body>
    <h2>Sign Up for Email Notifications</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Sign Up</button>
    </form>
</body>
</html>



