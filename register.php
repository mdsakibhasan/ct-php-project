<?php 
include ('pdo_connection.php');

$db_user= "root";
 $db_pass= "";
 $db_name= "online_shop";
$dbcon = $connection_object->connection('localhost',$db_user,$db_pass,$db_name);

?>
<?php include 'header.php'; ?>
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
				        <li class="active"><a href="register.php">SIGN UP</a></li>
				        <li><a href="login.php">LOGIN</a></li>
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
	<!--here is the registerd form-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h3>IF USER IS NOT RESISTERD.. PLZ FILLUP THIS FROM</h3>
				<form action="" method="post">
				  <div class="form-group">
				    <input type="name" class="form-control" id="exampleInputEmail1" placeholder="NAME" name="name">
				  </div>
				  <div class="form-group">
				    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
				  </div>
				  <div class="form-group">
				    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
				  </div>
				  <div class="form-group">
				    <input type="address" class="form-control" id="exampleInputEmail1" placeholder="ADDRESS" name="address">
				  </div>
				  <div class="form-group">
				    <input type="name" class="form-control" id="exampleInputEmail1" placeholder="phone" name="phone">
				  </div>
				  <input type="submit" class="btn btn-default" value="SIGNUP" name="add">
				</form>
<?php 
	if (isset($_POST["add"])) 
	{
		$name = $_POST["name"];
		$email = $_POST["email"];
		$password = md5($_POST["password"]);
		$address = $_POST["address"];
		$phone = $_POST["phone"];
		$user_role ="User";
		$sql = "INSERT INTO users (user_name, address, phone, email, password, user_role) values ('$name', '$address', '$phone', '$email', '$password', '$user_role')";

		if($data = $dbcon->query($sql))
		{
			echo("<script>location.href='login.php'</script>");
		}
		else
		{
			$string = 'sorry! somthing webt wrong! Try anain.\n';
			echo "<script>alert(\"$string\")</script>";
			echo "<script>location.href='register.php'</script>";
		}

	}
					
?>
				<span>Already a member?   </span><span><a href="login.php">  LOGIN</a></span>
			</div>
		</div>
	</div>
<?php include 'footer.php'; ?>