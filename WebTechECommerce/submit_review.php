<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $host = "localhost";
    $user = "rootuser"; 
    $pass = "default123!"; 
    $dbname = "new_schema";

    // connecting to the database
    $dbconn = new mysqli($host, $user, $pass, $dbname);


    if ($dbconn->connect_error) {
        die("Connection failed: " . $dbconn->connect_error);
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
            // message that you did submit 
            header("Location: product_review.php?product_id=" . $pID . "&review_submitted=1");
            exit();
        } else {
            echo "Error: " . $state->error;
        }

        $state->close();
    } else {
        echo "Error: " . $dbconn->error;
    }


    $dbconn->close();
} else {
    // go back if nothing was done to it
    header("Location: product_review.php");
    exit();
}
?>
