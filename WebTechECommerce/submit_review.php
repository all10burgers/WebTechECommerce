<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $host = "webtechecommerce.mysql.database.azure.com";
    $user = "rootuser"; 
    $pass = "default123!"; 
    $dbname = "new_schema";

    // connecting to the database
    $dbconn = new mysqli($host, $user, $pass, $dbname);

    if ($dbconn->connect_error) {
        // Consider logging this error and presenting a user-friendly message
        error_log("Connection failed: " . $dbconn->connect_error);
        exit('An error occurred. Please try again later.');
    }

    // form data grab
    $pID = $_POST['product_id'];
    $reviewer_id = $_POST['reviewer_name'];
    $reviewTXT = $_POST['review_text'];

    // inserting statement 
    $insertSQL = "INSERT INTO reviews (product_id, reviewer_name, review_text) VALUES (?, ?, ?)";

    if ($state = $dbconn->prepare($insertSQL)) {
        $state->bind_param("iss", $pID, $reviewer_id, $reviewTXT);

        if ($state->execute()) {
            // redirect with a success message
            header("Location: product_review.php?product_id=" . $pID . "&review_submitted=1");
            exit();
        } else {
            // Log error and present a user-friendly message
            error_log("Execute failed: " . $state->error);
            exit('An error occurred while submitting your review. Please try again later.');
        }

        $state->close();
    } else {
        // Log error and present a user-friendly message
        error_log("Prepare failed: " . $dbconn->error);
        exit('An error occurred. Please try again later.');
    }

    $dbconn->close();
} else {
    // redirect if the form wasn't submitted
    header("Location: product_review.php");
    exit();
}
?>

