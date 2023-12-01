<?php

if (isset($_POST["send"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['textarea'];
    $resumePath = '';

    // Handle File Upload
    if (isset($_FILES['resume']) && $_FILES['resume']['error'] == 0) {
        $allowed = array("pdf" => "application/pdf", "doc" => "application/msword", "docx" => "application/vnd.openxmlformats-officedocument.wordprocessingml.document");
        $filename = $_FILES['resume']['name'];
        $filetype = $_FILES['resume']['type'];
        $filesize = $_FILES['resume']['size'];

        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

        // Verify MIME type of the file
        if (in_array($filetype, $allowed)) {
            // Check whether file exists before uploading it
            if (file_exists("upload/" . $filename)) {
                echo $filename . " is already exists.";
            } else {
                move_uploaded_file($_FILES["resume"]["tmp_name"], "upload/" . $filename);
                echo "Your file was uploaded successfully.";
                $resumePath = "upload/" . $filename;
            } 
        } else {
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    }

    $mailTo = "juskidn2@yahoo.com";
    $headers = "From: " . $email;
    $txt = "You have received an email from " . $name . ".\n\n" . $message . "\n\nResume Path: " . $resumePath;

    $subject = "Support";
    mail($mailTo, $subject, $txt, $headers);
    header("Location: login.html?mailsend");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="contact.css">
</head>
<body>
    <div class="header">Header</div>
    <div class="title">Contact Us</div>
    <div class="container">
        <div class="left">
            <p id="inTouch">Getting In Touch Is Easy!</p>
            <p class="description">Need to reach us? Click the email below or fill out the form on the right.</p>
            <a class="find" href="https://map.concept3d.com/?id=2028">Find Us Here!</a>
            <p><a class="email" href="mailto:keenan.ray@my.utsa.edu">keenan.ray@my.utsa.edu</a></p>
        </div>
        <div class="right">
            <form action="contact.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="name" id="name" placeholder="Name">
                <input type="email" name="email" id="email" placeholder="Email">
                <textarea name="textarea" id="textarea" cols="40" rows="10" placeholder="Express Your Thoughts Here"></textarea>

                <!-- File Upload Field -->
                <label for="resume">Upload Your Resume:</label>
                <input type="file" name="resume" id="resume" accept=".pdf,.doc,.docx"><br><br>

                <input id="sendbtn" name="send" type="submit" value="Send Email">
            </form>
        </div>
    </div>
</body>
</html>
