

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $name = $_POST["name"]; 
    $username = $_POST["username"]; 
    $email = $_POST["email"]; 
    $password = $_POST["password"]; 
    
   
    $hashed_password = password_hash($password, PASSWORD_BCRYPT); 
    $host = "webtechecommerce.mysql.database.azure.com"; 
    $dbname = "new_schema"; 
    $username_db = "rootuser"; 
    $password_db = "default123!"; 
    
    $mysqli = new mysqli($host, $username_db, $password_db, $dbname);


    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }


    $stmt = $mysqli->prepare(
        "INSERT INTO users (name, username, email, password)  
        VALUES (?, ?, ?, ?)"
    );
    $stmt->bind_param("ssss", $name, $username, $email, $hashed_password);


    $stmt->execute();

    $stmt->close();
    $mysqli->close();
    echo "<h2>Registration Successful</h2>"; 
    echo "Thank you for registering, " . $name . "!<br>"; 
    echo "You'll be redirected to login page in 3 seconds"; 
    header("refresh:3;url=login.html"); 
   
} 
?>
