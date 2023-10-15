<?php
include "head.html";
?>	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập vào tài khoản của bạn</h2>
						<form action="log.php" name="login" method="post">
							<input type="text" placeholder="Name" name="username"/>
							<input type="password" placeholder="Password" name="password" />
							
							<button type="submit" class="btn btn-default">Đăng nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				
			</div>
		</div>
	</section><!--/form-->
	<?php
	
	include "foot.html";
	?>
