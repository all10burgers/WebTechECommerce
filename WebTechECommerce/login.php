
<?php 
  
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $username = $_POST["username"]; 
    $password = $_POST["password"]; 
  
    // Connect to the database 
    $host = "webtechecommerce.mysql.database.azure.com"; 
    $dbname = "new_schema"; 
    $username_db = "rootuser"; 
    $password_db = "default123!"; 
  
    
    $mysqli = new mysqli($host, $username_db, $password_db, $dbname);


    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }


    $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username); 
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    $stmt->close();
    $mysqli->close();
  
    if ($user) { 
           
        if (password_verify($password, $user["password"])) { 
                
            session_start(); 
            $_SESSION["user"] = $user;
            
            echo '<script type="text/javascript"> 
            window.onload = function () {  
            window.location.href = "store.php";  
            }; 
            </script> '; 
  
               
        } else { 
            echo "<h2>Login Failed</h2>"; 
            echo "Invalid email or password."; 
            } 
    } 
} 
?>
