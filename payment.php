<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Payment</title>
	<!-- Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet">
</head>

<body>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-1.11.3.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.js"></script>
	<!-- Navigation Bar -->
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header"> <a class="navbar-brand" href="#">EFY</a> </div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="index.html">Home</a>
				</li>
				<li><a href="productPage.html">Product Page</a>
				</li>
				<li><a href="cart.php">Cart Page</a>
				</li>
			</ul>
		</div>
	</nav>
	
	<?php
	// Class item = represents a product that is a item is in shopping basket
	class item {
		var $fName;
		var $lName;
		var $address1;
		var $address2;
		var $city;
		var $state;
		var $zip;
		var $phone;
		var $email;
		var $address3;
		var $address4;
		var $city2;
		var $state2;
		var $zip2;


		// Put all data from previous page into item class
		function item( $fName, $lName, $address1, $address2, $city, $state, $zip, $phone, $email, $address3, $address4, $city2, $state2, $zip2 ) {
			$this->fName = $fName;
			$this->lName = $lName;
			$this->address1 = $address1;
			$this->address2 = $address2;
			$this->city = $city;
			$this->state = $state;
			$this->zip = $zip;
			$this->phone = $phone;
			$this->email = $email;
			$this->address3 = $address3;
			$this->address4 = $address4;
			$this->city2 = $city2;
			$this->state2 = $state2;
			$this->zip2 = $zip2;
		}
	}

	session_start();
	
	if ( $_POST[ 'Desired_Action' ] == "Adding" ) //add and update case
	{

		// Read in form data
		$fName = $_POST[ 'fName' ];
		$lName = $_POST[ 'lName' ];
		$address1 = $_POST[ 'address1' ];
		$address2 = $_POST[ 'address2' ];
		$city = $_POST[ 'city' ];
		$state = $_POST[ 'state' ];
		$zip = $_POST[ 'zip' ];
		$phone = $_POST[ 'phone' ];
		$email = $_POST[ 'email' ];
		$address3 = $_POST[ 'address3' ];
		$address4 = $_POST[ 'address4' ];
		$city2 = $_POST[ 'city2' ];
		$state2 = $_POST[ 'state2' ];
		$zip2 = $_POST[ 'zip2' ];
		
		// If shipping and billing address is same than copy shipping address into billing address
		if ( $address3 == "" ) {
			$address3 = $address1;
			$address4 = $address2;
			$city2 = $city;
			$state2 = $state;
			$zip2 = $zip;
		}

		// Add personal information to basket called 'perInfo'
		$item = new item( $fName, $lName, $address1, $address2, $city, $state, $zip, $phone, $email, $address3, $address4, $city2, $state2, $zip2 );
		$_SESSION[ 'perInfo' ] = $item;
	}
	$item = $_SESSION[ 'perInfo' ];
	?>
	<!-- Container -->
	<div class="container" style="border:1px solid #cecece">
		<!-- Jumbotron -->
		<div class="jumbotron">
			<h2>Payment Information</h2>
		</div>
		<!-- Form -->
		<form action="finalOrder.php" method="post">
			<input type="hidden" name="Desired_Action" value="Adding">
			<div class="panel-group">
				<div class="panel panel-info">
					<div class="panel-heading">Shipping</div>
					<div class="panel-body">
						<div class="form-group">
							<div class="col-sm-6">
								<label for="name">Name on Credit Card:</label>
								<input type="text" class="form-control" id="name" name="name">
							</div>
							<div class="col-sm-6">
								<label for="cType">Credit Card Type:</label>
								<input type="text" class="form-control" id="cType" name="cType">
							</div>
							<div class="col-sm-12">
								<label for="cNum">Credit Card Number:</label>
								<input type="text" class="form-control" id="cNum" name="cNum">
							</div>
							<div class="col-sm-6">
								<label for="eMon">Expiration Date Month:</label>
								<select class="form-control" id="eMon" name="eMon">
									<option value="">N/A</option>
									<option value="Jan">Jan</option>
									<option value="Feb">Feb</option>
									<option value="Mar">Mar</option>
									<option value="Apr">Apr</option>
									<option value="May">May</option>
									<option value="June">June</option>
									<option value="July">July</option>
									<option value="Aug">Aug</option>
									<option value="Sep">Sep</option>
									<option value="Oct">Oct</option>
									<option value="Nov">Nov</option>
									<option value="Dec">Dec</option>
								</select>
							</div>
							<div class="col-sm-6">
								<label for="eYear">Expiration Date Year:</label>
								<select class="form-control" id="eYear" name="eYear">
									<option value="">N/A</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									<option value="2021">2021</option>
									<option value="2022">2022</option>
									<option value="2023">2023</option>
									<option value="2024">2024</option>
									<option value="2025">2025</option>
								</select>
							</div>
							<div class="col-sm-3">
								<label for="cSNum">Credit Card Security Number:</label>
								<input type="text" class="form-control" id="cSNum" name="cSNum">
							</div>
						</div>

					</div>
				</div>
				<!-- Button To Next Page -->
				<input type="submit" name="continue" class="btn btn-info btn btn-warning btn pull-right" role="button" id="add to cart button" value="Continue"/>
		</form>
		</div>


</body>

</html>