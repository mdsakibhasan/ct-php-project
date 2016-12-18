<?php session_start(); ?>
<?php
 include 'header.php';
 include 'pdo_connection.php';
 $db_user= "root";
 $db_pass= "";
 $db_name= "online_shop";

$dbcon = $connection_object->connection('localhost',$db_user,$db_pass,$db_name);
 ?>
	<!-- here is then nav site -->
	<div class="menu">
		<div class="container-fluid">
			<div class="row">
				<nav class="navbar navbar-default">
				  <div class="container-fluid">
				    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				    </div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				      <ul class="nav navbar-nav">
				        <li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PRODUCTS <span class="caret"></span></a>
				          <ul class="dropdown-menu">
				            <li><a href="product.php">Shart</a></li>
				            <li><a href="product.php">pants</a></li>
				            <li><a href="product.php">watch</a></li>
				            <li role="separator" class="divider"></li>
				            <li><a href="product.php">Glass</a></li>
				            <li role="separator" class="divider"></li>
				            <li><a href="product.php">Moneybag</a></li>
				          </ul>
				        </li>
				        <li><a href="view-check.php">VIEW CART AND CHECKOUT</a></li>
				        <li><a href="#">HELP</a></li>      
				      </ul>
				      <ul class="nav navbar-nav navbar-right">
				        <li><a href="register.php">SIGN UP</a></li>
				        <li class="active"><a href="login.php">LOGIN</a></li>
				        <li><a href="logout.php">LOG OUT</a></li>
				      </ul>
				      <form class="navbar-form navbar-right" role="search">
				        <div class="form-group">
				          <input type="text" class="form-control" placeholder="Search Products ...">
				        </div>
				        <button type="submit" class="btn btn-default">Search</button>
				      </form>
				    </div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>
			</div>
		</div>
	</div>
	<!--here is the login form-->
	<div class="login-form">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<form class="form-horizontal" action="" method="post">
					  <div class="form-group">
					    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
					    <div class="col-sm-10">
					      <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <div class="checkbox">
					        <label>
					          <input type="checkbox"> Remember me    
					        </label>
					        <a href="register.php">Register!</a>
					      </div>
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-default" name="login">Sign in</button>
					    </div>
					  </div>
					</form>
					<?php 
						if(isset($_POST["login"])){
							$email = $_POST["email"];
							$password = md5($_POST["password"]);

							$sql = "SELECT * FROM users where email = '$email' AND password = '$password' ";
							$data = $dbcon->query($sql);
							$row = $data->fetch(PDO::FETCH_ASSOC);

							if ($row["email"] != "" && $row["password"] != "") {
								$_SESSION["login"] = True;
								$_SESSION["email"] = $row["email"];
								$_SESSION["name"] = $row["user_name"];
								$_SESSION["user_role"] = $row["user_role"];

								if($_SESSION["user_role"] == "Admin"){
									echo ("<script>location.href='admin_index.php'</script>");
								}elseif ($_SESSION["user_role"] == "User") {
									echo ("<script>location.href='product.php'</script>");
								}
							}
							else{
								$string = 'user name and password is worng plz try again later';
								echo  "<script>alert(\"$string\")</script>";
								echo  ("<script>location.href='login.php'</script>");	
							}
						}
					 ?>
				</div>
			</div`		</div>
	</div>
	<!--footer section-->
	<div class="footer-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h5 class="text-center">@All Right Reserved By Sakibme.com 2016</h5>
				</div>
			</div>
		</div>
	</div>

</body>
</html>