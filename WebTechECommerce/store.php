<?php 
session_start(); 
  

if (isset($_POST["add_to_cart"])) { 
    
    $product_id = $_POST["product_id"]; 
    
    $product_quantity = $_POST["product_quantity"]; 
  

    if (!isset($_SESSION["cart"])) { 
        $_SESSION["cart"] = []; 
        header("location:cart.php"); 
    } 

    $_SESSION["cart"][$product_id] = $product_quantity; 
    header("location:cart.php"); 
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group 5 Shopping Web Application</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="store.css">
</head>
<body>
    <header class="bg-primary text-white text-center p-3">
        <h1>Welcome <?php echo htmlspecialchars($_SESSION["user"]["name"]); ?> to Shopping Web Application</h1>
    </header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="contact.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                <li class="nav-item"><a class="nav-link" href="email_signup.php">Email Signup</a></li>
            </ul>
        </div>
    </nav>

    <main class="container mt-4">
        <section>
            <h2 class="text-center mb-4">Products</h2>
            <div class="row">
                <!-- Product 1 -->
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="ProjPictures/adam-birkett-1M0omkZlGM4-unsplash.jpg" alt="Phone Charger">
                        <div class="card-body">
                            <h5 class="card-title">Phone Charger</h5>
                            <p class="card-text">Standard 3ft Phone Charger</p>
                            <p class="card-text"><strong>$12</strong></p>
                            <form method="post" action="store.php" class="d-flex justify-content-between align-items-center">
                                <div>
                                    <input type="hidden" name="product_id" value="1">
                                    <input type="number" id="product1_quantity" name="product_quantity" value="" min="0" max="10">
                                </div>
                                <button type="submit" name="add_to_cart" class="btn btn-primary">Add to Cart</button>
                            </form>
                            <a href="product_review.php?product_id=1" class="btn btn-secondary mt-2">View Reviews</a>
                        </div>
                    </div>
                </div>
                <!-- Product 2 -->
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="ProjPictures/felipepelaquim-Zb6HZX6WHvU-unsplash.jpg" alt="HeadPhones">
                        <div class="card-body">
                            <h5 class="card-title">HeadPhones</h5>
                            <p class="card-text">Over Ear</p>
                            <p class="card-text"><strong>$20</strong></p>
                            <form method="post" action="store.php">
                                <input type="hidden" name="product_id" value="2">
                                <div class="form-group">
                                    <label for="product2_quantity">Quantity:</label>
                                    <input type="number" class="form-control" id="product2_quantity" name="product_quantity" value="" min="0" max="10">
                                </div>
                                <button type="submit" name="add_to_cart" class="btn btn-primary">Add to Cart</button>
                            </form>
                            <a href="product_review.php?product_id=2" class="btn btn-secondary mt-2">View Reviews</a>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="ProjPictures/jascent-leung-CubSQS4iYEE-unsplash.jpg" alt="Phone Case">
                        <div class="card-body">
                            <h5 class="card-title">Phone Case</h5>
                            <p class="card-text">Dark Themed Phone Case</p>
                            <p class="card-text"><strong>$50</strong></p>
                            <form method="post" action="store.php">
                                <input type="hidden" name="product_id" value="3">
                                <div class="form-group">
                                    <label for="product3_quantity">Quantity:</label>
                                    <input type="number" class="form-control" id="product3_quantity" name="product_quantity" value="" min="0" max="10">
                                </div>
                                <button type="submit" name="add_to_cart" class="btn btn-primary">Add to Cart</button>
                            </form>
                            <a href="product_review.php?product_id=3" class="btn btn-secondary mt-2">View Reviews</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-primary text-white text-center p-3">
        <p>&copy; Group 5</p>
    </footer>

    <!-- Bootstrap JS and other necessary scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
