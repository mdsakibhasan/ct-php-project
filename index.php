<?php
 include 'header.php';
 include 'pdo_connection.php';
$db_user= "root";
 $db_pass= "";
 $db_name= "online_shop";

$dbcon = $connection_object->connection('localhost',$db_user,$db_pass,$db_name);
 ?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>ONLINE SUPER SHOP</title>
</head>


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
	<!--here is the slider site-->
	<div class="menu">
        <div class="container-fluid">
          <br>
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <img src="images/s4.png" >
              </div>

              <div class="item">
                <img src="images/s1.jpg" >
              </div>
            
              <div class="item">
                <img src="images/s3.jpg" >
              </div>

              <div class="item">
                <img src="images/s2.jpg" >
              </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
    </div><br><br>










    <!--here is the product section-->
		<!--here is the product section-->
<section>
  <div class="container">
    <div class="row">
      <?php
          $sql = "SELECT * FROM catagory";
          $data = $dbcon->query($sql);

          while($row = $data->fetch(PDO::FETCH_ASSOC)){
            
        ?>
        <div class="col-md-3">
            <img class="img-responsive" src="<?php echo 'image/'.$row['catagory_image']; ?>" >
            <div class="cat-text">
              <p><?php echo $row['catagory_name']; ?></p>
            </div>
        </div>
       <?php } ?>
    </div>
  </div>
</section>

















	<!--footer section-->
	<div class="footer-section">
		<div class="container-fluid">
			<div class="row">
				<div class="foot">
					<h5 class="text-center">@All Right Reserved By Sakibme.com 2016</h5>
				</div>
			</div>
		</div>
	</div>
</body>
</html>