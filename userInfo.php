<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Personal Information Form</title>
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

    <!-- Container -->
	<div class="container" style="border:1px solid #cecece">
		<div class="jumbotron">
			<h2>Personal Information Form</h2>
		</div>
		<!-- Form -->
		<form action="payment.php" method="post">
			<!-- Trigger To Add -->
			<input type="hidden" name="Desired_Action" value="Adding">
			<div class="panel-group">
				<div class="panel panel-info">
					<div class="panel-heading">Shipping</div>
					<div class="panel-body">
						<div class="form-group">
							<!-- All Personal Information -->
							<div class="col-sm-6">
								<label for="fName">First Name:</label>
								<input type="text" class="form-control" id="fName" name="fName">
							</div>
							<div class="col-sm-6">
								<label for="lName">Last Name:</label>
								<input type="text" class="form-control" id="lName" name="lName">
							</div>
							<div class="col-sm-12">
								<label for="address1">Address line 1:</label>
								<input type="text" class="form-control" id="address1" name="address1">
							</div>
							<div class="col-sm-12">
								<label for="address2">Address line 2:</label>
								<input type="text" class="form-control" id="address2" name="address2">
							</div>
							<div class="col-sm-6">
								<label for="city">Town/City:</label>
								<input type="text" class="form-control" id="city" name="city">
							</div>
							<div class="col-sm-6">
								<label for="state">State:</label>
								<select class="form-control" id="state" name="state">
									<option value="">N/A</option>
									<option value="AK">Alaska</option>
									<option value="AL">Alabama</option>
									<option value="AR">Arkansas</option>
									<option value="AZ">Arizona</option>
									<option value="CA">California</option>
									<option value="CO">Colorado</option>
									<option value="CT">Connecticut</option>
									<option value="DC">District of Columbia</option>
									<option value="DE">Delaware</option>
									<option value="FL">Florida</option>
									<option value="GA">Georgia</option>
									<option value="HI">Hawaii</option>
									<option value="IA">Iowa</option>
									<option value="ID">Idaho</option>
									<option value="IL">Illinois</option>
									<option value="IN">Indiana</option>
									<option value="KS">Kansas</option>
									<option value="KY">Kentucky</option>
									<option value="LA">Louisiana</option>
									<option value="MA">Massachusetts</option>
									<option value="MD">Maryland</option>
									<option value="ME">Maine</option>
									<option value="MI">Michigan</option>
									<option value="MN">Minnesota</option>
									<option value="MO">Missouri</option>
									<option value="MS">Mississippi</option>
									<option value="MT">Montana</option>
									<option value="NC">North Carolina</option>
									<option value="ND">North Dakota</option>
									<option value="NE">Nebraska</option>
									<option value="NH">New Hampshire</option>
									<option value="NJ">New Jersey</option>
									<option value="NM">New Mexico</option>
									<option value="NV">Nevada</option>
									<option value="NY">New York</option>
									<option value="OH">Ohio</option>
									<option value="OK">Oklahoma</option>
									<option value="OR">Oregon</option>
									<option value="PA">Pennsylvania</option>
									<option value="PR">Puerto Rico</option>
									<option value="RI">Rhode Island</option>
									<option value="SC">South Carolina</option>
									<option value="SD">South Dakota</option>
									<option value="TN">Tennessee</option>
									<option value="TX">Texas</option>
									<option value="UT">Utah</option>
									<option value="VA">Virginia</option>
									<option value="VT">Vermont</option>
									<option value="WA">Washington</option>
									<option value="WI">Wisconsin</option>
									<option value="WV">West Virginia</option>
									<option value="WY">Wyoming</option>
								</select>
							</div>
							<div class="col-sm-6">
								<label for="zip">Zip code:</label>
								<input type="number" class="form-control" id="zip" name="zip">
							</div>
							<div class="col-sm-6">
								<label for="phone">Day phone (incl. area code):</label>
								<input type="tel" class="form-control" id="phone" name="phone">
							</div>
							<div class="col-sm-6">
								<label for="email">Email:</label>
								<input type="email" class="form-control" id="email" name="email">
							</div>
							<div class="col-sm-12">
								<label for="email">Billing address</label>
								<div class="panel-group">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a data-toggle="collapse" href="#collapse1">Use different billing address</a>
											</h4>
										</div>
										<div id="collapse1" class="panel-collapse collapse">
											<ul class="list-group">
												<li class="list-group-item">
													<label for="address3">Address line 1:</label>
													<input type="text" class="form-control" id="address3" name="address3">
													<label for="address4">Address line 2:</label>
													<input type="text" class="form-control" id="address4" name="address4">
													<label for="city2">Town/City:</label>
													<input type="text" class="form-control" id="city2" name="city2">
													<label for="state2">State:</label>
													<select class="form-control" id="state2" name="state2">
														<option value="">N/A</option>
														<option value="AK">Alaska</option>
														<option value="AL">Alabama</option>
														<option value="AR">Arkansas</option>
														<option value="AZ">Arizona</option>
														<option value="CA">California</option>
														<option value="CO">Colorado</option>
														<option value="CT">Connecticut</option>
														<option value="DC">District of Columbia</option>
														<option value="DE">Delaware</option>
														<option value="FL">Florida</option>
														<option value="GA">Georgia</option>
														<option value="HI">Hawaii</option>
														<option value="IA">Iowa</option>
														<option value="ID">Idaho</option>
														<option value="IL">Illinois</option>
														<option value="IN">Indiana</option>
														<option value="KS">Kansas</option>
														<option value="KY">Kentucky</option>
														<option value="LA">Louisiana</option>
														<option value="MA">Massachusetts</option>
														<option value="MD">Maryland</option>
														<option value="ME">Maine</option>
														<option value="MI">Michigan</option>
														<option value="MN">Minnesota</option>
														<option value="MO">Missouri</option>
														<option value="MS">Mississippi</option>
														<option value="MT">Montana</option>
														<option value="NC">North Carolina</option>
														<option value="ND">North Dakota</option>
														<option value="NE">Nebraska</option>
														<option value="NH">New Hampshire</option>
														<option value="NJ">New Jersey</option>
														<option value="NM">New Mexico</option>
														<option value="NV">Nevada</option>
														<option value="NY">New York</option>
														<option value="OH">Ohio</option>
														<option value="OK">Oklahoma</option>
														<option value="OR">Oregon</option>
														<option value="PA">Pennsylvania</option>
														<option value="PR">Puerto Rico</option>
														<option value="RI">Rhode Island</option>
														<option value="SC">South Carolina</option>
														<option value="SD">South Dakota</option>
														<option value="TN">Tennessee</option>
														<option value="TX">Texas</option>
														<option value="UT">Utah</option>
														<option value="VA">Virginia</option>
														<option value="VT">Vermont</option>
														<option value="WA">Washington</option>
														<option value="WI">Wisconsin</option>
														<option value="WV">West Virginia</option>
														<option value="WY">Wyoming</option>
													</select>
													<label for="zip2">Zip code:</label>
													<input type="number" class="form-control" id="zip2" name="zip2">
												</li>
											</ul>
										</div>
									</div>
								</div>

							</div>
						</div>

					</div>
				</div>
				<input type="submit" name="continue" class="btn btn-info btn btn-warning btn pull-right" role="button" id="add to cart button" value="Continue"/>
		</form>
		</div>
</body>

</html>