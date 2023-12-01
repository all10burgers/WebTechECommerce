<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Review</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <style>
    .review-card {
        background-color: #f8f9fa;
        border: 1px solid #e3e6e8;
        border-radius: 5px;
        padding: 15px;
        margin-bottom: 10px;
    }
    .review-card p {
        font-size: 14px;
        margin-bottom: 5px;
    }
    .review-card strong {
        font-size: 16px;
    }
    .product-details {
        margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="container mt-4">
    <?php
    // db connect
    $host = "webtechecommerce.mysql.database.azure.com";
    $user = "rootuser";
    $pass = "default123!";
    $dbname = "new_schema";
    $dbconn = new mysqli($host, $user, $pass, $dbname);
    if ($dbconn->connect_error) {
      die("Connection failed: " . $dbconn->connect_error);
    }

    // Getting the product id from the URL
    $pID = isset($_GET['product_id']) ? $_GET['product_id'] : die('Product ID is missing!');

    // Fetch product details
    $product_query = "SELECT name, price FROM products WHERE id = ?";
    $state = $dbconn->prepare($product_query);
    $state->bind_param("i", $pID);
    $state->execute();
    $product_result = $state->get_result();
    $product_details = $product_result->fetch_assoc();
    ?>

    <!-- Product details here -->
    <div class="product-details">
      <h2><?php echo htmlspecialchars($product_details['name']); ?></h2>
      <p>Price: $<?php echo htmlspecialchars($product_details['price']); ?></p>
      <!-- Placeholder for product image -->
    </div>

    <!-- Reviews -->
    <div class="product-reviews">
      <h3>Customer Reviews</h3>
      <?php
      // here's some static reviews for you
      $static_reviews = [
          ["reviewer_name" => "Billy", "review_text" => "I got it for my cousin."],
          ["reviewer_name" => "Timmy", "review_text" => "It looks great."],
          ["reviewer_name" => "Jimmy", "review_text" => "It feels great."],
          ["reviewer_name" => "Lily", "review_text" => "Love it."]
      ];

      foreach ($static_reviews as $review) {
          echo "<div class='review-card'>";
          echo "<strong>" . htmlspecialchars($review['reviewer_name']) . "</strong>";
          echo "<p>" . htmlspecialchars($review['review_text']) . "</p>";
           echo "</div>";
      }
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


    <?php $dbconn->close(); ?>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
