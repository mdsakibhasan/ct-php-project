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
  
  
  <!-- here is start add product start work -->
  <section class="main-section section-padding">
  <div class="container">
    <div class="row">
       
      <!--//////////////-->
      <!--//////////////-->
      <div class="col-sm-5 center">
        <div class="product-details sign">
          
            <h2>Add New Product</h2>

          <form class="form" action="" method="post" enctype="multipart/form-data" class="form-horizontal">

            <div class="col-sm-12">
          <div class="form-group">
              <input type="text" class="form-control" id="inputEmail3" placeholder="Product ID" name="product_id">
            </div>
          </div>
          <div class="col-sm-12">
          <div class="form-group">
              <input type="text" class="form-control" id="inputEmail3" placeholder="Product Name" name="product_name">
            </div>
          </div>
          <div class="col-sm-12">
          <div class="form-group">
              <input type="text" class="form-control" id="inputEmail3" placeholder="Product Available" name="product_stock">
            </div>
          </div>
          <div class="col-sm-12">
          <div class="form-group">
              <input type="text" class="form-control" id="inputEmail3" placeholder="Unit Price" name="product_unit_price">
            </div>
          </div>
          <div class="col-sm-12">
          <div class="form-group">
              <input type="text" class="form-control" id="inputEmail3" placeholder="Discount" name="discount">
            </div>
          </div>
          <div class="col-sm-12">
          <div class="form-group">
              <input type="text" class="form-control" id="inputEmail3" placeholder="Short Description" name="product_short_des">
            </div>
          </div>
          <div class="col-sm-12">
          <div class="form-group">
              <input type="text" class="form-control" id="inputEmail3" placeholder="Full Details" name="product_des">
            </div>
          </div>
          <div class="col-sm-12">
          <div class="form-group">
              <select class="form-control" name="catagory_id">
                <?php
                    $sql = "SELECT * FROM catagory";
                    $data = $dbcon->query($sql);
                    
                    while($row = $data->fetch(PDO::FETCH_ASSOC)) {
                      $catagory_name = $row["catagory_name"];
                      $catagory_id = $row["catagory_id"];
                      echo "<option value='$catagory_id'>$catagory_name</option>";
                    }
                 ?>
              </select>
            </div>
          </div>
            <div class="col-sm-12">
              <div class="form-group">
                <p>Image</p>
                <input type="file" class="form-control" id="inputEmail3" placeholder="image" name="product_image">
              </div>
            </div> <br>
              
            <div class="col-sm-12">
              <div class="form-group">
                <input type="submit" name="add" value="Create New Product" />
              </div>
            </div>
</form>
<?php 
  if (isset($_POST["add"])) 
  {
    $product_id = $_POST["product_id"];
    $product_name = $_POST["product_name"];
    $product_stock = $_POST["product_stock"];
    $product_unit_price = $_POST["product_unit_price"];
    $discount = $_POST["discount"];
    $product_short_des = $_POST["product_short_des"];
    $product_des = $_POST["product_des"];
    $catagory_id = $_POST["catagory_id"];
    $product_image = $_FILES["product_image"]["name"];
    
    


    $sql = "INSERT INTO products (product_id, product_name, product_stock, product_unit_price, discount, product_short_des, product_des, catagory_id, product_image) values ('$product_id', '$product_name', '$product_stock', '$product_unit_price', '$discount', '$product_short_des', '$product_des', '$catagory_id', '$product_image')";

    if($data = $dbcon->query($sql))
    {
      echo("<script>location.href='admin_add_products.php'</script>");
    }
    else
    {
      $string = 'sorry! somthing webt wrong! Try anain.\n';
      echo "<script>alert(\"$string\")</script>";
      echo "<script>location.href='admin_index.php'</script>";
    }

  }
          
?>
        </div> 
      </div> 
      <!--//////////////-->
    </div>
  </div>
</section>

