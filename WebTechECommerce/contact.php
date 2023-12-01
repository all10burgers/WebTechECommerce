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
    <div class="header"> </div>
    <div class="title">Contact Us</div>
    <div class="container">
    <div class="left">
        <p id="inTouch">Getting In Touch Is Easy!</p>
        <p class="description ">Need to reach us? Click the email below or fill out the form on the right.</p>
        <a class="find" href="https://map.concept3d.com/?id=2028&_gl=1*1dgek45*_ga*ODUxMzk2MTc0LjE2OTk5OTczNTk.*_ga_1ZM4FXT4XW*MTcwMTM5NDA3My4zLjAuMTcwMTM5NDA3My42MC4wLjA.#!ct/0?s/?sbc/">Find Us Here!</a>
        <p ><a class="email" href="mailto:keenan.ray@my.utsa.edu">keenan.ray@my.utsa.edu</a></p>

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