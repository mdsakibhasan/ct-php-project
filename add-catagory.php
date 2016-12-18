<?php 
	session_start();
	if ($_SESSION['login'] != Ture ){
		$string ="sorry! Try again later. \n you are not logged in.";
		echo "<script>alert(\"$string\")</script>";
		echo "<script>location.href='login.php'</script>";
	} elseif ($_SESSION['user_role'] != 'admin' ){
		$string ="sorry! Try again later. \n you are not allowed this page.";
		echo "<script>alert(\"$string\")</script>";
		echo "<script>location.href='index.php'</script>";
	}
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
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> ADD PRODUCTS <span class="caret"></span></a>
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
				        <li><a href="view-check.php">ADD CATAGORY</a></li>
				        <li><a href="view-order.php">VIEW ORDER</a></li>
				        <li class="active"><a href="#">ADD ADMIN</a></li>      
				      </ul>
				      <ul class="nav navbar-nav navbar-right">
				        <li><a href="login.php">LOGIN</a></li>
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
	<!--here is the category form-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h3>ADD catagory</h3>
				<form action="" method="post">
				  <div class="form-group">
				    <input type="name" class="form-control" id="exampleInputEmail1" placeholder="cat_name" name="cat_name">
				  </div>
				  <div class="form-group">
				    <input type="file" name="cat_img"><span>input image file here</span>
				  </div>
				  <button type="submit" class="btn btn-default" name="add_cat">SUBMIT</button>
				</form>
<?php 
	if (isset($_POST["add_cat"])) 
	{
		$cat_name = $_POST["cat_name"];
		$sql = "INSERT INTO catagory (catagory_name) values ('$cat_name')";

		if($data = $dbcon->query($sql))
		{
			echo("<script>location.href='add-catagory.php'</script>");
		}
		else
		{
			$string = 'sorry! somthing webt wrong! Try anain.\n';
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