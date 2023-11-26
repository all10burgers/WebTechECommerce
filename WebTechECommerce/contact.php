<?php

if(isset($_POST["send"]) ){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['textarea'];

    $mailTo = "juskidn2@yahoo.com";
    $headers = $email." Sent Message From Ecommerce Website";
    $txt = "You have recieved an email from ".$name.".\n\n".$message;
    $subject="Support";
    mail($mailTo,$subject,$txt,$headers);
    header("Location: login.html?mailsend");
}

?>