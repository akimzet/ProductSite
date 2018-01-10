<!DOCTYPE html>
<html lang="en">
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cart Page</title>
	<!-- Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet">
</head>

<body>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-1.11.3.min.js"></script>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header"> <a class="navbar-brand" href="#">EFY</a> </div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="index.html">Home</a>
				</li>
				<li><a href="productPage.html">Product Page</a>
				</li>
				<li><a href="cart.php">Cart Page</a></li>
			</ul>
		</div>
	</nav>
	<?php
	$verbose = true; //set to false to get rid of additional print outs


	//========================================
	// Class item = represents a product that is a item is in shopping basket
	class item {
		var $code; // code
		var $name; // name
		var $descrption;
		var $quantity; // quantity
		var $price; // price per item

		function item( $code, $name, $description, $quantity, $price ) {
			$this->code = $code;
			$this->name = $name;
			$this->description = $description;
			$this->quantity = $quantity;
			$this->price = $price;
		}
	}

	//========================================
	// Class basket = represents shopping basket with the variable $session_basket representing the Array of item instances in basket

	/**
	 * shopping basket class
	 */
	class basket {

		/**
		 * constructor
		 */
		
		function basket() {
			$this->sessionStart();
		}

		/**
		 * start session OR if one already created retrieve shopping_basket
		 */
		function sessionStart() {
			global $session_basket; //global variable ---array of items in basket

			//start session or retrieve if already exists with client
			session_start();

//			if ( $verbose ) //verbose printout --not necessary
//				echo "session id " . session_id() . "<br>";

			//if previouisly started grab data associated with session_basket
			if ( isset( $_SESSION[ 'session_basket' ] ) ) {
				$session_basket = $_SESSION[ 'session_basket' ];
//				if ( $verbose ) //verbose printout --not necessary
//				{
//					echo "retrieved session basket is: ";
//					print_r( $session_basket );
//					echo "<br>";
//				}
			} else { //if no session_basket initially to empty array
				$session_basket = Array();

				//store in SESSION variables
				$_SESSION[ 'session_basket' ] = $session_basket;

//				if ( $verbose ) //verbose printout --not necessary
//					echo "session basket NEW";
			}
		}



		/**
		 * destory session -- call when someone wants to completely CLEAR the cart --get rid of session
		 */
		function sessionEnd() {
			session_unset();
			session_destroy();
		}


		/**
		 *determine the number of elements in basket
		 */
		function basketSize() {
			global $session_basket;

			// make session if not found
			if ( $session_basket == "" ) {
				$this->sessionStart();
			}

			if ( !is_array( $session_basket ) ) {
				return 0;
			}
			return $i;
		}

		/**
		 * register item in session
		 * if same code exist in session, modify it.
		 */
		function registerItem( $code, $name, $description, $quantity, $price ) {
			global $session_basket;

			// make session if not found
			if ( $session_basket == "" ) {
				$this->sessionStart();
			}

			// test to see if this product (with id $code) is currently IN basket, if so EDIT IT (update)
			if ( !$this->editItem( $code, $name, $description, $quantity, $price ) ) {
				$item = new item( $code, $name, $description, $quantity, $price ); //if NOT in basket CREATE IT
				$session_basket[] = $item;
			}



			//Make sure to add updated $session_basket array to the SESSION variables

			$_SESSION[ 'session_basket' ] = $session_basket;
		}



		/**
		 * see if product (with product id $code) is in the current $session_basket array
		 * if exist, modify it and return true
		 * else retrun false
		 */
		function editItem( $code, $name, $description, $quantity, $price ) {
			global $session_basket;

			// make session if not found
			if ( $session_basket == "" ) {
				$this->sessionStart();
				return false;
			}

			reset( $session_basket );
			while ( list( $k, $v ) = each( $session_basket ) ) { //search in $session_basket
				if ( $session_basket[ $k ]->code == $code ) { //if found matching code (product id)
					// Found same code --- upade with new values the item
					$session_basket[ $k ]->name == $name;
					$session_basket[ $k ]->description = $description;
					$session_basket[ $k ]->quantity = $quantity;
					$session_basket[ $k ]->price = $price;


//					if ( $verbose ) //verbose printout --not necessary
//						echo "INSIDE editItem: " . $code . "<br>";
//
//					return true; //return true we updated it
				}
			}

			return false; //could not find the product currently in basket
		}



		/**
		 * delete item from basket ($session_basket array) that has product id of $code and name of $name
		 */
		function deleteItem( $code, $name ) {
			global $session_basket;

			// make session if not found         
			if ( $session_basket == "" ) {
				$this->sessionStart();
			}

			reset( $session_basket );
			while ( list( $k, $v ) = each( $session_basket ) ) { //look through each item in basket
				if ( $session_basket[ $k ]->code == $code ) { //if this item's code matches $code then we found the one to remove
					unset( $session_basket[ $k ] ); // remove this item from the $session_basket array
					return true;
				}
			}
		}
	}





	// STEP 1: Create or Retrive shopping basket if it already is in session
	$basket = new basket();


	// STEP 2 YOU will need to ALTER THIS CODE IN THE FOLLOWING WAYS:
	// 1) Pass a parameter to the code when invoked telling it if you are "adding" (to basket), "deleting" (from basket), "clearing"
	// entire basket.
	// 2) Call this parameter "Desired_Action" and test for it. THE CODE BELOW is ONLY the code for adding/updating the basket
	// a) Desired_Action = Adding/Updating
	// then read in product information passed to this program from a form called "Add to Cart" to create an item and
	// then call $basket->registerItem(***) see below
	// b) Desired_Action = Deleting
	// then read in the product id into variable $code and product name into variable $name of the item you want to
	// delete from the basket. You get this information from the form that invokes this method passing. Then
	// call $basket->deleteItem($code,$name);
	// c) Desired_Action = Clear
	// simply call $basket->sessionEnd();

	if ( $_POST[ 'Desired_Action' ] == "Adding" ) //add and update case
	{

		//read in form data

		$code = $_POST[ 'code' ];
		$name = $_POST[ 'name' ];
		$description = $_POST[ 'description' ];
		$quantity = $_POST[ 'quantity' ];
		$price = $_POST[ 'price' ];


		//add it to the basket
		$basket->registerItem( $code, $name, $description, $quantity, $price );

	} else if ( $_POST[ 'Desired_Action' ] == "Deleting" ) //remove from cart case
	{

		$basket->deleteItem( $_POST[ 'code' ], $_POST[ 'name' ] );
	}
	?>

	<div class="jumbotron text-center">
		<h1>Your Shopping Bag</h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Item</th>
							<th>Product</th>
							<th>Description</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Cost</th>
						</tr>
					</thead>
					<?php
					// For loop to go through each basket and display its content
					reset( $session_basket );
					$i = 0;
					$total = 0;
					$itemN = 0;
					while ( list( $k, $v ) = each( $session_basket ) ) {
						$i++;
						$item = $session_basket[ $k ];
						$image = "images/product" . $item->code . ".jpg";
						?>
					<tbody>
						<tr class="info">
							<td>
								<?php echo $item->code; ?> </td>
							<td>
								<h5 class="text-center"><strong><?php echo $item->name; ?> </strong></h5>
								<img class="img-responsive img-thumbnail" src="<?php echo $image ?>" alt="productimg">
							</td>
							<td>
								<p>
									<?php echo $item->description; ?>
								</p>
							</td>
							<td><?php echo $item->quantity; ?> </td>
							<td>$<?php echo number_format($item->price, 2, '.', ''); ?> </td>
							<td>$<?php echo number_format($item->price * $item->quantity, 2, '.', ''); ?> </td>
						</tr>
						<?php
						$total += $item->price * $item->quantity;
						$itemN += $item->quantity;
						}
					// Display total price
					$_SESSION["total"] = $total + ((($itemN * 2) + $total) * 0.08) + $itemN * 2;
						?>
					</tbody>
				</table>
				<h4 align="right">Cost: $<?php echo number_format($total, 2, '.', ''); ?></h4>
				<h4 align="right">Shipping Fee: $<?php echo number_format($itemN * 2, 2, '.', ''); ?></h4>
				<h4 align="right">Tax Rate 8%: $<?php echo number_format(((($itemN * 2) + $total) * 0.08), 2, '.', ''); ?></h4>
				<h3 align="right">Total Cost: $<?php echo number_format($total + ((($itemN * 2) + $total) * 0.08) + $itemN * 2, 2, '.', ''); ?></h3>
				<a href="userInfo.php" class="btn btn-success btn pull-right" role="button">Checkout</a>
				<a href="#" class="btn btn-success btn pull-left" role="button">Apply Coupon</a>
			</div>
		</div>
	</div>
	<!-- Include all compiled plugins (below), or include individual files as needed -->



	<script src="js/bootstrap.js"></script>
</body>

</html>