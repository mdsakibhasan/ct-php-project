<?php 
	session_start();
	if ($_SESSION['login'] != 'Ture' ){
		$string ="sorry! Try again later. \n you are not logged in.";
		echo "<script>alert(\"$string\")</script>";
		echo "<script>location.href='login.php'</script>";
	} elseif ($_SESSION['user_role'] != 'Admin' ){
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
		                <li class="dropdown" class="active">
		                  <a href="admin_add_products.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ADD PRODUCTS <span class="caret"></span></a>
		                  <ul class="dropdown-menu">
		                    <li class="active"><a href="admin_add_products.php">product</a></li>
		                  </ul>
		                </li>
		                <li><a href="admin_add_category.php">ADD CATAGORY</a></li>
		                <li><a href="view-order.php">VIEW ORDER</a></li>
		                <li><a href="add_admin.php">ADD ADMIN</a></li>    
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
	
	
	
	
	<section class="main-section section-padding">
  <div class="container">
    <div class="row">
       
      <!--//////////////-->
      <!--//////////////-->
      <div class="col-sm-10 center">
        <div class="product-details">
          <div class="col-sm-3"> 
              <img src="images/st1.jpg" alt="" class="img-responsive">
          </div>
          <div class="col-sm-9">
            <h1>Product Details</h1>
            <p>Simple pagination inspired by Rdio, great for apps and search results. The large block is hard to miss, easily scalable, and pio, great for apps and search results. The large block is hard to miss, easily scalable, and pio, great for apps and search results. The large block is hard to miss, easily scalable, and provides large click areas.</p>
            <hr>
            <ul class="list-unstyled">
              <li>pagination inspired</li>
              <li>Product price</li>
            </ul>
          </div>

        <a href="#" class="btn btn-custom addtocart">Edit product</a>
        </div> 
      </div> 
      <!--//////////////-->
    </div>
  </div>
</section>
<?php include 'footer.php'; ?>
	


