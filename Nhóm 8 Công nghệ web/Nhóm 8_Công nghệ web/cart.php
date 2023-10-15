<?php
session_start();

// Check if the cartid variable is defined.
if (!isset($_POST['cartid'])) {
  $_POST['cartid'] = '';
}

$x = $_POST['cartid'];

$host = "localhost";
$user = "root";
$pass = "";
$db = "eshopper";
$con = new mysqli($host, $user, $pass, $db);

if (!$con) {
  die('Could not connect: ' . $con->error);
}

// Sanitize the cartid variable.
$x = mysqli_real_escape_string($con, $x);

// Create the SQL query.
$sql = "SELECT * FROM product WHERE pid='$x'";

// Execute the SQL query.
$result = $con->query($sql);

if (!$result) {
  die('Could not execute query: ' . $con->error);
}

// Get the product information.
$row = $result->fetch_assoc();

$pname = $row['pname'];
$cart = $row['pid'];
$bname = $row['brand'];
$price = $row['price'];

?>





<?php include "head3.php"?>
<body>
	

	<section id="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="cart_product">
								<a href=""><img src="images/mens/<?php echo $x ?>.jpg" alt="" height="200"></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $pname ?></a></h4>
								<p><?php echo $x?></p>
							</td>
							<td class="cart_price">
								<p><?php echo $price?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="#"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
									<a class="cart_quantity_down" href="#"> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo $price?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>

							</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
		<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
					<form name="reg" action="mail.php" method="post">
						<h2>Enter Your Email Address For Verification</h2>
							<input type="text"  name="email" placeholder="Enter Your Email Address"/>
							<input type="submit"  name="send" class="btn btn-default">
						</form>
					</div>
				</div>

			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Giá trị giỏ hàng<span><?php echo $price?></span></li>
						</ul>
							<a class="btn btn-default update" href="#">Update</a>
							<a class="btn btn-default check_out" href="#">Check Out</a>
					</div>
				</div>
			</div>
			
		</div>
		
	</section><!--/#do_action-->
<?php
include "foot.html";
?>