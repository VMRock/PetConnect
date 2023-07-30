<!DOCTYPE html>
<html lang="en">
<?php
    include("connection/connect.php"); 
    error_reporting(0);
    session_start();
    include_once 'product-action.php'; 
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>products || Petconnect+ - Group5</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script>
function openUserProfile() {
    var url = "userprofile.php";
    var width = 800;
    var height = 500;
    var left = (screen.width - width) / 2;
    var top = (screen.height - height) / 2;
    window.open(url, "User Profile", "width=" + width + ",height=" + height + ",left=" + left + ",top=" + top);
}
</script>
</head>
<body>
    <header id="header" class="header-scroll top-header headrom">
        <nav class="navbar navbar-dark">
            <div class="container">
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/Mainlogo.jpg" alt="" width="10%"><span class="text-primary">Pawsome</span>Haven </a>
                <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                    <ul class="nav navbar-nav">
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    <a href="pet.php" class="nav-item nav-link active">Product</a>
                    <a href="services.php" class="nav-item nav-link ">About</a>
                    <a href="Adoption.php" class="nav-item nav-link">Adoption</a>
                    <a href="LostFound.php" class="nav-item nav-link">LostFound</a>
                    <a href="Contact.php" class="nav-item nav-link">Contact</a>                   
                    <?php
                    if(empty($_SESSION["user_id"])) // if user is not login
                        {
                            echo '<a href="login.php" class="nav-item nav-link">Login</a> 
                          <a href="registration.php" class="nav-item nav-link">Register</a> ';
                        }
                    else
                        {                                
                                echo  '<a href="your_orders.php" class="nav-item nav-link">MyOrders</a>';
                                echo  '<a href="logout.php" class="nav-item nav-link">Logout</a>';
                                echo  '<a href="userprofile.php" class="nav-item nav-link" target="_blank" onclick="openUserProfile()">My account</a>';
                        }
                    ?>
                </div>          
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="page-wrapper">
        <div class="top-links">
            <div class="container">
                <ul class="row links">
                    <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="pet.php">Choose product category</a></li>
                    <li class="col-xs-12 col-sm-4 link-item active"><span>2</span><a href="products.php?product_category_id=<?php echo $_GET['product_category_id']; ?>">Pick Your favorite product</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Order and Pay</a></li>
                </ul>
            </div>
        </div>
        <?php $ress= mysqli_query($db,"select * from product_category where product_category_id='$_GET[product_category_id]'");
									     $rows=mysqli_fetch_array($ress);									  
										  ?>
        <section class="inner-page-hero bg-image" data-image-src="admin/admin_img/cat1.gif">
            <div class="profile">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12  col-md-4 col-lg-4 profile-img">
                            <div class="image-wrap">
                                <figure><?php echo '<img src="admin/admin_img/'.$rows['image'].'" alt="Product Category logo">'; ?></figure>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                            <div class="pull-left right-text white-txt">
                                <h6><a href="#"><?php echo $rows['product_name']; ?></a></h6>
                                <!--<p><?php //echo $rows['address']; ?></p>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="breadcrumb">
            <div class="container">
            </div>
        </div>
        <div class="container m-t-30">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                    <div class="widget widget-cart">
                        <div class="widget-heading">
                            <h3 class="widget-title text-dark">
                                Your Cart
                            </h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="order-row bg-white">
                            <div class="widget-body">
                                <?php
                                    $item_total = 0;
                                    foreach ($_SESSION["cart_item"] as $item)  
                                    {
                                ?>
                                        <div class="title-row">
                                            <?php echo $item["product_name"]; ?><a href="products.php?product_category_id=<?php echo $_GET['product_category_id']; ?>&action=remove&id=<?php echo $item["product_id"]; ?>">
                                            <i class="fa fa-trash pull-right"></i></a>
                                        </div>

                                        <div class="form-group row no-gutter">
                                            <div class="col-xs-8">
                                                <input type="text" class="form-control b-r-0" value=<?php echo "Rs.".$item["price"]; ?> readonly id="exampleSelect1">
                                            </div>
                                            <div class="col-xs-4">
                                                <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input">
                                            </div>                                   
                                        </div>
                                <?php
                                    $item_total += ($item["price"]*$item["quantity"]); 
                                    }
                                ?>

                            </div>
                        </div>
                        <div class="widget-body">
                            <div class="price-wrap text-xs-center">
                                <p>TOTAL</p>
                                <h3 class="value"><strong><?php echo "Rs.".$item_total; ?></strong></h3>
                                <p>Free Delivery!</p>
                                <?php
                                        if($item_total==0){
                                        ?>

                                <a href="checkout.php?product_category_id=<?php echo $_GET['product_category_id'];?>&action=check" class="btn btn-danger btn-lg disabled">Checkout</a>

                                <?php
                                        }
                                        else{   
                                        ?>
                                <a href="checkout.php?product_category_id=<?php echo $_GET['product_category_id'];?>&action=check" class="btn btn-success btn-lg active">Checkout</a>
                                <?php   
                                        }
                                        ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="menu-widget" id="2">
                        <div class="widget-heading">
                            <h3 class="widget-title text-dark">
                                products <a class="btn btn-link pull-right" data-toggle="collapse" href="#popular2" aria-expanded="true">
                                    <i class="fa fa-angle-right pull-right"></i>
                                    <i class="fa fa-angle-down pull-right"></i>
                                </a>
                            </h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="collapse in" id="popular2">
                            <?php  
									$stmt = $db->prepare("select * from products where product_category_id='$_GET[product_category_id]'");
									$stmt->execute();
									$products = $stmt->get_result();
									if (!empty($products)) 
									{
									foreach($products as $product)
										{																										 
													 ?>
                            <div class="food-item">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-lg-8">
                                        <form method="post" action='products.php?product_category_id=<?php echo $_GET['product_category_id'];?>&action=add&id=<?php echo $product['product_id']; ?>'>
                                            <div class="rest-logo pull-left">
                                                <a class="restaurant-logo pull-left" href="#"><?php echo '<img src="admin/admin_img/products/'.$product['image'].'" alt="product logo">'; ?></a>
                                            </div>

                                            <div class="rest-descr">
                                                <h6><a href="#"><?php echo $product['product_name']; ?></a></h6>
                                                <p> <?php echo $product['description']; ?></p>
                                            </div>

                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-lg-3 pull-right item-cart-info">
    <span class="price pull-left">Rs. <?php echo $product['price']; ?></span>
    <?php
        $quantity = $product['quantity'];
        if ($quantity > 0) {
            echo '<input type="text" name="quantity" style="margin-left:30px;" value="1" size="2" />';
            echo '<input type="submit" class="btn theme-btn" style="margin-left:40px;" value="Add To Cart" />';
        } else {
            echo '<input type="text" name="quantity" style="margin-left:30px; border: 1px solid #ccc; pointer-events: none;" value="0" size="2" />';
            echo '<input type="submit" class="btn theme-btn disabled" style="margin-left:40px; pointer-events: none; cursor: not-allowed;" value="Out of Stock" disabled />';
        }
    ?>
</div>
                                    </form>
                                    <div class="col-lg-10">
    <span class="price pull-left">Amount of item</span>
    <input type="textbox" name="quantity" style="margin-left: 30px; border-right: 4px solid #ccc;" value="<?php echo $product['quantity']; ?>" size="2" disabled />
</div>
                                </div>

                            </div>

                            <?php
									  }
									}
									
								?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    <div class="container-fluid text-white py-4 px-sm-3 px-md-5" style="background: #111111;">
        <div class="row">
            <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white">
                    &copy; <a class="text-white font-weight-bold" href="https://PawsomeHaven.com">PetConnect+</a>. All Rights Reserved. Designed by
                    <a class="text-white font-weight-bold">batch 103 || Group 5 </a>
                </p>
            </div>
        </div>
    </div>
    <!-- Footer End -->
    </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>