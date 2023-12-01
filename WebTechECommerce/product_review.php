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
        // Database connection
        $host = "webtechecommerce.mysql.database.azure.com";
        $user = "rootuser";
        $pass = "default123!";
        $dbname = "new_schema";
        $dbconn = new mysqli($host, $user, $pass, $dbname);
        if ($dbconn->connect_error) {
            die("Did not connect: " . $dbconn->connect_error);
        }

        // Getting the product from the URL
        $pID = isset($_GET['product_id']) ? $_GET['product_id'] : die('Product ID not specified.');

        // Fetching product details
        $product_query = "SELECT name, price FROM products WHERE id = ?";
        $state = $dbconn->prepare($product_query);
        $state->bind_param("i", $pID);
        $state->execute();
        $product_result = $state->get_result();
        $product_details = $product_result->fetch_assoc();
        ?>

        <!-- Show product details -->
        <div class="product-details">
            <h2><?php echo htmlspecialchars($product_details['name']); ?></h2>
            <p>Price: $<?php echo htmlspecialchars($product_details['price']); ?></p>
            <!-- Include product image if available -->
        </div>

        <!-- Show static reviews -->
        <div class="product-reviews">
            <h3>Customer Reviews</h3>
            <?php
            // Static array of reviews
            $static_reviews = [
                ["reviewer_name" => "Jane Doe", "review_text" => "I got it for my cousin."],
                ["reviewer_name" => "John Smith", "review_text" => "It looks great."],
                ["reviewer_name" => "Alice Johnson", "review_text" => "It feels great."],
                ["reviewer_name" => "Bob Brown", "review_text" => "Love it."]
            ];

            // Loop through the static reviews and display them
            foreach ($static_reviews as $review) {
                echo "<div class='review-card'>";
                echo "<strong>" . htmlspecialchars($review['reviewer_name']) . "</strong>";
                echo "<p>" . htmlspecialchars($review['review_text']) . "</p>";
                echo "</div>";
            }
            ?>
        </div>

        <!-- Review submission form (remain the same) -->
        <!-- Back page link (remain the same) -->

        <?php $dbconn->close(); ?>
    </div>

    <!-- Bootstrap JS and other necessary scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
