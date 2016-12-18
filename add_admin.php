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
		                <li class="dropdown" class="active">
		                  <a href="admin_add_products.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ADD PRODUCTS <span class="caret"></span></a>
		                  <ul class="dropdown-menu">
		                    <li class="active"><a href="admin_add_products.php">product</a></li>
		                  </ul>
		                </li>
		                <li><a href="admin_add_category.php">ADD CATAGORY</a></li>
		                <li><a href="view-order.php">VIEW ORDER</a></li>
		                <li class="active"><a href="add_admin.php">ADD ADMIN</a></li>    
		              </ul>
		              <ul class="nav navbar-nav navbar-right">
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
				<h3><b>ADD ADMIN</b>  IF USER IS NOT RESISTERD.. PLZ FILLUP THIS FROM</h3>
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
				  <div class="form-group">
				    <input type="name" class="form-control" id="exampleInputEmail1" placeholder="Designation" name="Designation">
				  </div>
				  <button type="submit" class="btn btn-default" name="add">Create New</button>
				</form>
<?php 
	if (isset($_POST["add"])) 
	{
		$name = $_POST["name"];
		$email = $_POST["email"];
		$password = md5($_POST["password"]);
		$address = $_POST["address"];
		$phone = $_POST["phone"];
		$Designation = $_POST["Designation"];
		$user_role ="Admin";
		$sql = "INSERT INTO users (user_name, address, phone, email, password, user_role, Designation) values ('$name', '$address', '$phone', '$email', '$password', '$user_role', '$Designation')";
		//$data = $dbcon->query($sql);

		if($data = $dbcon->query($sql))
		{
			echo("<script>location.href='admin_index.php'</script>");
		}
		else
		{
			$string = "sorry! somthing webt wrong! Try anain.";
			echo "<script>alert(\"$string\")</script>";
			echo "<script>location.href='add_admin.php'</script>";
		}

	}
					
?>				
			</div>
		</div>
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