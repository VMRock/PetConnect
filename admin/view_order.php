<!DOCTYPE html>
<html lang="en">

<?php
        include("../connection/connect.php");
        error_reporting(0);
        session_start();
    ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>View Order</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script language="javascript" type="text/javascript">
        var popUpWin = 0;

        function popUpWindow(URLStr, left, top, width, height) {
            if (popUpWin) {
                if (!popUpWin.closed) popUpWin.close();
            }
            popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 1000 + ',height=' + 1000 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
        }
    </script>
                    <style>
        .invisible-border {
            border: none;
            outline: none;
        }
        /* Additional styles for the form */
        .form-container {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .form-container label {
            font-weight: bold;
        }
        .form-container input,
        .form-container textarea,
        .form-container select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
        }
        .form-container button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #0056b3;
        }
    </style>
                </head>

                <body class="fix-header">

<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
    </svg>
</div>

<div id="main-wrapper">

<div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php">

                        <span class="text-primary">Pawsome</span> Haven
                    </a>
                </div>

                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                    </ul>

                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome Admin</a>
                        <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                            <ul class="dropdown-user">
                                <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="left-sidebar">
        <div class="scroll-sidebar">
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="nav-devider"></li>
                    <li class="nav-label">Home</li>
                    <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
                    <li class="nav-label"></li>
                    <li> <a href="all_users.php"> <span><i class="fa fa-user f-s-20 "></i></span><span>Normal Users</span></a></li>
                    <li> <a href="all_adminUsers.php"> <span><i class="fa fa-user f-s-20 "></i></span><span>Admin Users</span></a></li>
                    <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Category</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="all_product_category.php">All Product Category</a></li>
                            <li><a href="add_pcategory.php">Add Pet Category</a></li>
                            <li><a href="add_product_category.php">Add Product Category</a></li>
                        </ul>
                    </li>
                    <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-product-hunt" aria-hidden="true"></i><span class="hide-menu">products</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="all_products.php">All products</a></li>
                            <li><a href="add_products.php">Add products</a></li>
                        </ul>
                    </li>
                    <li> <a href="all_orders.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Orders</span></a></li>
                    <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">LostFound</span></a>
                         <ul aria-expanded="false" class="collapse">
                            <li><a href="all_lostandfound.php">All Lost And Found</a></li>
                            <li><a href="add_lostandfound.php">Add Lost And Found</a></li>
                        </ul>
                    </li>
                    <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-paw" aria-hidden="true"></i><span class="hide-menu">Pet Adoption</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="all_pets.php">All pets</a></li>
                            <li><a href="add_pets.php">Add pets</a></li>
                            <li><a href="adoption_pets.php">Adoption pets</a></li>
                        </ul>
                    </li>
                    <li> <a href="all_contact.php"><i class="fa fa-phone" aria-hidden="true"></i><span>Contact Us</span></a></li>
                    <li> <a href="all_volunteer.php"><i class="fa fa-child" aria-hidden="true"></i><span>Volunteers</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="page-wrapper">

                            <div class="container-fluid">

                                <div class="row">
                                    <div class="col-12">

                                        <div class="col-lg-12">
                                            <div class="card card-outline-primary">
                                                <div class="card-header">
                                                    <h4 class="m-b-0 text-white">View Order</h4>
                                                </div>

                                                <div class="table-responsive m-t-20">
                                                    <table id="myTable" class="table table-bordered table-striped">

                                                        <tbody>
                                                            <?php
											$sql="SELECT users.*, product_orders.* FROM users INNER JOIN product_orders ON users.user_id=product_orders.user_id where order_id='".$_GET['user_upd']."'";
												$query=mysqli_query($db,$sql);
												$rows=mysqli_fetch_array($query);																																						
												?>
                                                            <tr>
                                                                <td><strong>Username:</strong></td>
                                                                <td>
                                                                    <center><?php echo $rows['username']; ?></center>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        <a href="javascript:void(0);" onClick="popUpWindow('order_update.php?form_id=<?php echo htmlentities($rows['order_id']);?>');" title="Update order">
                                                                            <button type="button" class="btn btn-primary">Update Order Status</button></a>
                                                                    </center>
                                                                </td>


                                                            </tr>
                                                            <tr>
                                                                <td><strong>Product_name:</strong></td>
                                                                <td>
                                                                    <center><?php echo $rows['product_name']; ?></center>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        <a href="javascript:void(0);" onClick="popUpWindow('userprofile.php?newform_id=<?php echo htmlentities($rows['order_id']);?>');" title="Update order">
                                                                            <button type="button" class="btn btn-primary">View User Detials</button></a>

                                                                    </center>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td><strong>Quantity:</strong></td>
                                                                <td>
                                                                    <center><?php echo $rows['quantity']; ?></center>
                                                                </td>


                                                            </tr>
                                                            <tr>
                                                                <td><strong>Price:</strong></td>
                                                                <td>
                                                                    <center>Rs. <?php echo $rows['price']; ?></center>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Address:</strong></td>
                                                                <td>
                                                                    <center><?php echo $rows['address']; ?></center>
                                                                </td>


                                                            </tr>
                                                            <tr>
                                                                <td><strong>Date:</strong></td>
                                                                <td>
                                                                    <center><?php echo $rows['date']; ?></center>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Status:</strong></td>
                                                                <?php 
																			$status=$rows['order_status'];
																			if($status=="" or $status=="NULL")
																			{
																			?>
                                                                <td>
                                                                    <center><button type="button" class="btn btn-info"><span class="fa fa-bars" aria-hidden="true"></span> Dispatch</button></center>
                                                                </td>
                                                                <?php 
																			  }
																			   if($status=="in process")
																			 { ?>
                                                                <td>
                                                                    <center><button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin" aria-hidden="true"></span>On a Way!</button></center>
                                                                </td>
                                                                <?php
																				}
																			if($status=="closed")
																				{
																			?>
                                                                <td>
                                                                    <center><button type="button" class="btn btn-primary"><span class="fa fa-check-circle" aria-hidden="true"></span> Delivered</button></center>
                                                                </td>
                                                                <?php 
																			} 
																			?>
                                                                <?php
																			if($status=="rejected")
																				{
                                                                                    $order_id = $rows['order_id'];
                                                                                    // Retrieve the order details including quantity and product_id from the product_orders table
    $query = "SELECT quantity, product_name FROM product_orders WHERE order_id = '$order_id'";
    $result = mysqli_query($db, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $quantity = $row['quantity'];
        $product_name = $row['product_name'];

        // Update the product table to add the quantity back
        mysqli_query($db, "UPDATE products SET quantity = quantity + $quantity WHERE product_name = '$product_name'");
    }
                                                                                                                                  
																			?>
                                                                <td>
                                                                    <center><button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> Cancelled</button> </center>
                                                                </td>
                                                                <?php 
																			} 
																			?>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card card-outline-primary">
                            <div class="card-header">
                                                    <h4 class="m-b-0 text-white">Order Status Update Email</h4>
                                                </div>
                            <div class="form-container">
                                    <form method="post" action="email.php">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" value="<?php echo $rows['username']; ?>" id="name" required>
                                        <label for="email">Email</label>
                                        <input type="email" name="email" value="<?php echo $rows['email']; ?>" id="email" required>
                                        <label for="subject">Subject</label> 
                                        <select name="subject" id="subject" required="required">
                                            <option value="">Select Order Status</option>
                                            <option value="Hey <?php echo $rows['first_name'] . " " . $rows['last_name']; ?>, your order is placed!">Hey, your order is placed!</option>
                                            <option value="Hey <?php echo $rows['first_name'] . " " . $rows['last_name']; ?>, your package has been shipped!">Hey, your package has been shipped!</option>
                                            <option value="Hey <?php echo $rows['first_name'] . " " . $rows['last_name']; ?>, Your package has been delivered!">Your package has been delivered!</option>
                                            <option value="Hey <?php echo $rows['first_name'] . " " . $rows['last_name']; ?>, your package has been cancelled.">Hey, your package has been cancelled.</option>
                                        </select>
                                        <label for="message">Message</label>
                                        <select name="message" id="message" required="required">
                                            <option value="">Select Message</option>
                                            <option value="Your order is placed!
Hi,

Thank you for ordering from Pawsome Haven!

We're excited for you to receive your order and will notify you once it's on its way. We hope you had a great shopping experience! You can check your order status in our website.

Please note, we are unable to change your delivery address once your order is placed.​

Here's a confirmation of what you bought in your order.

DELIVERY DETAILS

Name: <?php echo $rows['first_name'] . " " . $rows['last_name']; ?>,
Address: <?php echo $rows['address']; ?>,
Phone: <?php echo $rows['phone']; ?>,
Email: <?php echo $rows['email']; ?>,

ORDER DETAIL

Product Name: <?php echo $rows['product_name']; ?>,
Quantity:  <?php echo $rows['quantity']; ?>,
Price: Rs.<?php echo $rows['price']; ?>,

NEED HELP?
Can I change my shipping address after I have placed the order?
Unfortunately, you can't change the address, but you may cancel and re-order with right address.

Will somebody contact me before delivering the package to my location?​
Our delivery hero may contact you to confirm your location, you will also receive a SMS/Email on the day of delivery.

How do I cancel my order?​
Click on ' MyOrder ', once you see your order, click the cancel button within 7 days.


HELP CENTER | CONTACT US
123 Main Street, Colombo, Sri Lanka
+94 123456789
info@pawsomehaven.com
 
This is an automatically generated e-mail from our subscription list. Please do not reply to this e-mail.">Your order is placed!</option>
                                            <option value="Your package has been shipped!
Hi,

We are pleased to share that the item(s) from your order have been shipped.

DELIVERY DETAILS

Name: <?php echo $rows['first_name'] . " " . $rows['last_name']; ?>,
Address: <?php echo $rows['address']; ?>,
Phone: <?php echo $rows['phone']; ?>,
Email: <?php echo $rows['email']; ?>,

ORDER DETAIL

Product Name: <?php echo $rows['product_name']; ?>,
Quantity:  <?php echo $rows['quantity']; ?>,
Price: Rs.<?php echo $rows['price']; ?>,

NEED HELP?
Can I change my shipping address after I have placed the order?
Unfortunately, you can't change the address, but you may cancel and re-order with right address.

Will somebody contact me before delivering the package to my location?​
Our delivery hero may contact you to confirm your location, you will also receive a SMS/Email on the day of delivery.

How do I cancel my order?​
Click on ' MyOrder ', once you see your order, click the cancel button within 7 days.


HELP CENTER | CONTACT US
123 Main Street, Colombo, Sri Lanka
+94 123456789
info@pawsomehaven.com
 
This is an automatically generated e-mail from our subscription list. Please do not reply to this e-mail.">Your package has been shipped!</option>
                                            <option value="Your package has been delivered!
Hi,

Thank you for choosing Pawsome Haven! Item(s) from your order has been delivered.

We hope you are enjoying your order and would love to hear what you think of your purchase. Your review will help many shoppers make the right choice.

DELIVERY DETAILS

Name: <?php echo $rows['first_name'] . " " . $rows['last_name']; ?>,
Address: <?php echo $rows['address']; ?>,
Phone: <?php echo $rows['phone']; ?>,
Email: <?php echo $rows['email']; ?>,

ORDER DETAIL

Product Name: <?php echo $rows['product_name']; ?>,
Quantity:  <?php echo $rows['quantity']; ?>,
Price: Rs.<?php echo $rows['price']; ?>,

NEED HELP?
How do I return my order?
You can return your item(s) within 7 days of purchase.

I found the package open and seal broken. What should I do?
You are advised to not accept delivery of such orders. However, if you do receive any such package, please get in touch with us immediately via website.


HELP CENTER | CONTACT US
123 Main Street, Colombo, Sri Lanka
+94 123456789
info@pawsomehaven.com
 
This is an automatically generated e-mail from our subscription list. Please do not reply to this e-mail.">Your package has been delivered!</option>
                                            <option value="Your package has been cancelled!
Hi,

Sorry to be the bearer of bad news, but your order was cancelled.

ORDER DETAIL

Product Name: <?php echo $rows['product_name']; ?>,
Quantity:  <?php echo $rows['quantity']; ?>,
Price: Rs.<?php echo $rows['price']; ?>,

HELP CENTER | CONTACT US
123 Main Street, Colombo, Sri Lanka
+94 123456789
info@pawsomehaven.com
 
This is an automatically generated e-mail from our subscription list. Please do not reply to this e-mail.">Your package has been cancelled!</option>
                                        </select>
                                        <br>
                                        <button type="submit">Send Email</button>
                                    </form>
                                                                        </div>
                                                                        </div>
                                    </div>
                    <footer class="footer"> batch 103 || Group 5 © 2023 - PetConnect+</footer>

                    <script src="js/lib/jquery/jquery.min.js"></script>
                    <script src="js/lib/bootstrap/js/popper.min.js"></script>
                    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
                    <script src="js/jquery.slimscroll.js"></script>
                    <script src="js/sidebarmenu.js"></script>
                    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
                    <script src="js/custom.min.js"></script>
                    <script src="js/lib/datatables/datatables.min.js"></script>
                    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
                    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
                    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
                    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
                    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
                    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
                    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
                    <script src="js/lib/datatables/datatables-init.js"></script>
                </body>

                </html>