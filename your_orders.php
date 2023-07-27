<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

if(empty($_SESSION['user_id']))  
{
	header('location:login.php');
}
else
{
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Your Orders || Petconnect+ - Group5</title>
    <!-- Favicon -->
    <link href="images/Mainlogo.jpg" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/extra.css" rel="stylesheet">
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


    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row badge-primary py-2 px-lg-5">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white pr-3" href="">FAQs</a>
                    <span class="text-white">|</span>
                    <a class="text-white px-3" href="">Help</a>
                    <span class="text-white">|</span>
                    <a class="text-white pl-3" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white px-3" href="https://www.facebook.com/">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-3" href="https://www.twitter.com/">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-white px-3" href="https://www.linkedin.com/">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-white px-3" href="https://www.instagram.com/">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-white pl-3" href="https://www.youtube.com/">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-capitalize"><img class="img-rounded" src="images/Mainlogo.jpg" alt="" width="18%"><span class="text-primary">Pawsome</span>Haven</h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="d-inline-flex flex-column text-center pr-3 border-right">
                        <h6>Opening Hours</h6>
                        <p class="m-0">8.00AM - 9.00PM</p>
                    </div>
                    <div class="d-inline-flex flex-column text-center px-3 border-right">
                        <h6>Email Us</h6>
                        <p class="m-0">info@pawsomehaven.com</p>
                    </div>
                    <div class="d-inline-flex flex-column text-center pl-3">
                        <h6>Call Us</h6>
                        <p class="m-0">+94 123456789</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-lg-5">
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-capitalize font-italic text-white"><span class="text-primary">Pawsome</span>Haven</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    <a href="pet.php" class="nav-item nav-link">Product</a>
                    <a href="services.php" class="nav-item nav-link">About</a>
                    <a href="Adoption.php" class="nav-item nav-link">Adoption</a>
                    <a href="LostFound.php" class="nav-item nav-link">LostFound</a>
                    <a href="Contact.php" class="nav-item nav-link">Contact</a>
                    <?php
                    if(empty($_SESSION["user_id"])) // if user is not login
                        {
                            echo '<a href="login.php" class="nav-item nav-link active">Login</a> 
                          <a href="registration.php" class="nav-item nav-link">Register</a> ';
                        }
                    else
                        {

                                
                                echo  '<a href="your_orders.php" class="nav-item nav-link active">MyOrders</a>';
                                echo  '<a href="logout.php" class="nav-item nav-link">Logout</a>';
                                echo  '<a href="userprofile.php" class="nav-item nav-link" target="_blank" onclick="openUserProfile()">My account</a>';
                        }

                    ?>
                </div>
                <a href="Volunteer.php" class="btn btn-lg btn-primary px-3 d-none d-lg-block">Volunteer Sign Up</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
    <div class="page-wrapper">

        <section class="restaurants-page">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                    </div>
                    <div class="col-xs-12">
                        <div class="bg-gray">
                            <div class="row">
                            <table class="table">
                                                    <tbody>                                      
                                                        <tr>
                                                            <td><strong>7 Days Returns (Change of mind is not applicable)</strong></td>
                                                                                                                
                                                        </tr>                                                      
                                                    </tbody>
                                                </table>
                            <table class="table table-bordered table-hover">
    <thead style="background: #404040; color:white;">
        <tr>
            <th>Item</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Status</th>
            <th>Date</th>
            <th>Delivery Date</th> <!-- New column header for Delivery Date -->
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $query_res = mysqli_query($db, "select * from product_orders where user_id='".$_SESSION['user_id']."'");
        if (!mysqli_num_rows($query_res) > 0 ) {
            echo '<td colspan="7"><center>You have No orders Placed yet. </center></td>';
        } else {			      
            while($row = mysqli_fetch_array($query_res)) {
        ?>
        <tr>
            <td data-column="Item"><?php echo $row['product_name']; ?></td>
            <td data-column="Quantity"><?php echo $row['quantity']; ?></td>
            <td data-column="Price">Rs.<?php echo $row['price']; ?></td>
            <td data-column="Status">
                <?php 
                    $status = $row['order_status'];
                    if ($status == "" or $status == "NULL") {
                ?>
                <button type="button" class="btn btn-info"><span class="fa fa-bars" aria-hidden="true"></span> Dispatch</button>
                <?php 
                    } elseif ($status == "in process") { 
                ?>
                <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin" aria-hidden="true"></span> On The Way!</button>
                <?php
                    } elseif ($status == "closed") {
                ?>
                <button type="button" class="btn btn-success"><span class="fa fa-check-circle" aria-hidden="true"></span> Delivered</button>
                <?php 
                    } elseif ($status == "rejected") {
                ?>
                <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> Cancelled</button>
                <?php 
                    } 
                ?>
            </td>
            <td data-column="Date"><?php echo $row['date']; ?></td>
            <td data-column="Delivery Date">
                <button type="button" class="btn btn-primary" onclick="showDeliveryDate('<?php echo $row['date']; ?>')">Show Delivery Date</button>
            </td>
            <td data-column="Action">
    <?php
        $orderDate = strtotime($row['date']);
        $sevenDaysAgo = strtotime('-7 days');

        if ($orderDate >= $sevenDaysAgo) {
            // If the order date is within 7 days, display the delete button.
    ?>
        <a href="delete.php?userorder_del=<?php echo $row['order_id'];?>" onclick="return confirm('Are you sure you want to cancel your order?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10">
            <i class="fa fa-trash-o" style="font-size:16px"></i>
        </a>
    <?php
        } else {
            // If the order date is more than 7 days, you can display a disabled or blocked button.
            // For example, a button with "disabled" attribute and some text indicating it's blocked.
    ?>
        <button type="button" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10" disabled>
            <i class="fa fa-trash-o" style="font-size:16px"></i> 
        </button>
    <?php
        }
    ?>
</td>

        </tr>
        <?php }} ?>
    </tbody>
</table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>

    <?php include "include/footer.php" ?>

    </div>
    <script>
function showDeliveryDate(orderDate) {
    // Assume delivery time is 3 days after the order date (you can customize this as needed)
    const deliveryTimeInDays = 3;

    // Convert orderDate string to Date object
    const orderDateObj = new Date(orderDate);

    // Calculate delivery date
    const deliveryDateObj = new Date(orderDateObj);
    deliveryDateObj.setDate(orderDateObj.getDate() + deliveryTimeInDays);

    // Format the delivery date as a string (you can customize the date format as needed)
    const deliveryDateString = deliveryDateObj.toDateString();

    // Display the delivery date in an alert or any other desired way
    alert("Delivery Date: " + deliveryDateString);
}
</script>
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
<?php
}
?>