<!DOCTYPE html>
<html>
<head>
    <title>Product Review</title>
       <!-- bootstrap link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <?php
    // data base 
    $host = "localhost";
    $user = "rootuser"; 
    $pass = "default123!"; 
    $dbname = "new_schema";

    // making a connection to db 
    $dbconn = new mysqli($host, $user, $pass, $dbname);
    if ($dbconn->connect_error) {
        die(" Did not connect " . $dbconn->connect_error);
    }

    // getting the product from the url
    $pID = isset($_GET['product_id']) ? $_GET['product_id'] : die('Product ID not right.');

    // product details
    $product_query = "SELECT name, price FROM products WHERE id = ?";
    $state = $dbconn->prepare($product_query);
    $state->bind_param("i", $pID); 
    $state->execute();
    $product_result = $state->get_result();
    $product_details = $product_result->fetch_assoc();

    // grab exisiting reviews 
    $reviews_query = "SELECT reviewer_name, review_text FROM reviews WHERE product_id = ?";
    $reviews_state = $dbconn->prepare($reviews_query);
    $reviews_state->bind_param("i", $pID);
    $reviews_state->execute();
    $reviews_result = $reviews_state->get_result();
    $state->close();
    ?>

    <!-- show product details -->
    <div class="product-details">
        <h2><?php echo htmlspecialchars($product_details['name']); ?></h2>
        <p>Price: $<?php echo htmlspecialchars($product_details['price']); ?></p>
        <!-- need to include image need comlumb -->
    </div>

    <!-- show existing reviews -->
    <div class="product-reviews">
        <h3>Customer Reviews</h3>
        <?php
        // Loop through the reviews and show them
        while($review = $reviews_result->fetch_assoc()) {
            echo "<div class='review'>";
            echo "<p><strong>" . htmlspecialchars($review['reviewer_name']) . "</strong></p>";
            echo "<p>" . htmlspecialchars($review['review_text']) . "</p>";
            echo "</div>";
        }
        // Close the reviews statement
        $reviews_state->close();
        ?>
    </div>

    <!--  submission form for reviews-->
    <div class="review-form">
        <h3>Write a Review</h3>
        <form action="submit_review.php" method="post">
            <input type="hidden" name="product_id" value="<?php echo $pID; ?>">
            <div class="form-group">
                <label for="reviewer_name">Your Name:</label>
                <input type="text" class="form-control" id="reviewer_name" name="reviewer_name" required>
            </div>
            
            <div class="form-group">
                <label for="review_text">Your Review:</label>
                <textarea class="form-control" id="review_text" name="review_text" required></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit Review</button>
        </form>
    </div>

    <!-- back page  -->
    <a href="store.php" class="btn btn-secondary">Back to Store</a>
    <?php $dbconn->close(); ?>

    <!-- more boot strap links -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
