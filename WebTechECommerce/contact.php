<?php

if(isset($_POST["send"]) ){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['textarea'];

    $mailTo = "juskidn2@yahoo.com";
    $txt = "You have recieved an email from ".$name.".\n\n".$message;
    $headers = $email." Sent Message From Ecommerce Website"."\r\n Message: ".$txt;
    
    $subject="Support";
    mail($mailTo,$subject,$headers);
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
    <div class="header"> Header</div>
    <div class="title">Contact Us</div>
    <div class="container">
    <div class="left">
        <p id="inTouch">Getting In Touch Is Easy!</p>
        <p class="description ">Description Will Go Here, Might add something else</p>
        <a class="find" href="google.com">Find Us Here!</a>
        <p ><a class="email" href="mailto:someone@example.com">placeholder@random.com</a></p>

    </div>
    <div class="right">
        <form action="contact.php" method="POST" name="emailContact">
            <input type="text" name="name" id="name" placeholder="Name">
            <input type="email" name="email" id="email" placeholder="Email">
            <textarea name="textarea" id="textarea" cols="40" rows="10" placeholder="Express Your Thoughts Here"></textarea>
            <input id="sendbtn" name="send" type="submit" value="Send Email">
        </form>
    </div>

    </div>
    
</body>
</html>