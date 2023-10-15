<?php
session_start();

$x = $_POST['pid'];

$host = "localhost";
$user = "root";
$pass = "";
$db = "eshopper";

$con = new mysqli($host, $user, $pass, $db);

if (!$con) {
    die('Could not connect: ' . $con->error);
}

$sql = "SELECT * FROM product WHERE pid=$x";
$result = $con->query($sql);

if (!$result) {
    die('Could not execute query: ' . $con->error);
}

$row = $result->fetch_assoc();

$pname = $row['pname'];
$cart = $row['pid'];
$bname = $row['brand'];
$price = $row['price'];

include "head2.php";

?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh mục</h2>
						<div class="panel-group Danh mục-products" id="accordian"><!--Danh mục-productsr-->
							<div class="panel panel-default">
								
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Đàn ông
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Armani</a></li>
											<li><a href="#">Prada</a></li>
											<li><a href="#">Dolce and Gabbana</a></li>
									
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#womens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Phụ nữ
										</a>
									</h4>
								</div>
								<div id="womens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Fendi</a></li>
											<li><a href="#">Guess</a></li>
											<li><a href="#">Valentino</a></li>
										</ul>
									</div>
								</div>
							</div>
							
						</div><!--/Danh mục-products-->
					
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="images/mens/<?php echo $x ?>.jpg" alt="" />
								</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    
								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<h2><?php echo $pname ?></h2>
								<p><?php echo $bname?></p>
								<span>
									<span><?php echo $price?></span>
									
									<form action="cart.php" name="addtocart" method="post">
							<input type="hidden" name="cartid" value="<?php echo $x ?>" />
										
					<input type="Submit" name="Submit" value="Buy" class="btn btn-default add-to-cart"></a></form>


										
								
								</span>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b> E-SHOPPER</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					
					
				</div>
			</div>
		</div>
	</section>
	<?php
	include "foot.html";
	?>