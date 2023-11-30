<?php 
session_start(); 

// Start the session 
// Check if the add to cart button is clicked 
if (isset($_POST["add_to_cart"])) { 
	
	// Get the product ID from the form 
	$product_id = $_POST["product_id"]; 
	
	// Get the product quantity from the form 
	$product_quantity = $_POST["product_quantity"]; 

	// Initialize the cart session variable 
	// if it does not exist 
	if (!isset($_SESSION["cart"])) { 
		$_SESSION["cart"] = []; 
		header("location:cart.php"); 
	} 

	// Add the product and quantity to the cart 
	$_SESSION["cart"][$product_id] = $product_quantity; 
	header("location:cart.php"); 
} 
?> 
<!DOCTYPE html> 
<html> 
	<head> 
		<title>Group 5 Shopping Web Application</title> 
		<link rel="stylesheet"
				href="store.css"> 
	</head> 
	<body> 
		<header> 
			<h1>Welcome <?php 
			$user = $_SESSION["user"]; 
			echo $user["name"]; 
			?> to GFG Shopping Web Application</h1> 
		</header> 
		<nav> 
			<ul> 
				<li><a href="store.html">Home</a></li> 
				<li><a href="store.html">Shop</a></li> 
				<li><a href="cart.php">Cart</a></li> 
				<li><a href="logout.php">Logout</a></li> 

			</ul> 
		</nav> 
		<main> 
			<section> 
				<h2>Products</h2> 
				<ul> 
					<li> 
						<h3>GFG Bag</h3> 
						<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20230407154213/gfg-bag.jpg"
							alt="Product 1"> 
						<p>Bag with 2 Extra pockets</p> 
						<p><span>$12</span></p> 

						<form method="post" action="store.php"> 
							<input type="hidden"
								name="product_id"
								value="1"> 
							<label for="product1_quantity"> 
								Quantity: 
							</label> 
							<input type="number"
								id="product1_quantity"
								name="product_quantity"
								value=""
								min="0"
								max="10"> 
							<button type="submit"
									name="add_to_cart"> 
								Add to Cart</button> 
						</form> 
					</li> 
					<li> 
						<h3>GFG T-Shirt</h3> 
						<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20230407153931/gfg-tshirts.jpg"
							alt="Product 2"> 
						<p>100% cotton t-shirts</p> 
						<p> 
							<span>$20</span> 
						</p> 

						<form method="post" action="store.php"> 
							<input type="hidden"
								name="product_id"
								value="2"> 
							<label for="product2_quantity"> 
								Quantity: 
							</label> 
							<input type="number"
								id="product2_quantity"
								name="product_quantity"
								value=""
								min="0"
								max="10"> 
							<button type="submit"
									name="add_to_cart"> 
								Add to Cart 
						</button> 
						</form> 
					</li> 
					<li> 
						<h3>GFG Hoodie</h3> 
						<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20230407153938/gfg-hoodie.jpg"
							alt="Product 3"> 
						<p>Black Color Stylish Hoodie</p> 
						<p> 
							<span>$50</span> 
						</p> 

						<form method="post" action="sore.php"> 
							<input type="hidden"
								name="product_id"
								value="3"> 
							<label for="product3_quantity"> 
								Quantity: 
							</label> 
							<input type="number"
								id="product3_quantity"
								name="product_quantity"
								value=""
								min="0"
								max="10"> 
							<button type="submit"
									name="add_to_cart"> 
								Add to Cart 
							</button> 
						</form> 
					</li> 
								
					<!-- Add forms for the other products here --> 
				</ul> 
			</section> 
		</main> 
		<footer> 
			<p>&copy; E-commerce site By Group 5</p> 
		</footer> 
		<script src="store.php"></script> 
	</body> 
</html>
