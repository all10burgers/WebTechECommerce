<?php

if(isset($_POST["send"]) ){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['textarea'];

    $mailTo = "awesome.kr50@gmail.com";
    $txt = "You have recieved an email from ".$name.".\n\n".$message;
    $headers = $email." Sent Message From Ecommerce Website"."\r\n Message: ".$txt;
    
    $subject="Support";
    mail($mailTo,$subject,$headers);
    header("Location: login.html?mailsend");
}

?>