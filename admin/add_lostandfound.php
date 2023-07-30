<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

if (isset($_POST['submit'])) {
    if (empty($_POST['type']) || empty($_POST['pet_type']) || empty($_POST['name']) || empty($_POST['gender']) || $_POST['age'] == '' || empty($_POST['location']) || empty($_POST['lostfound_date']) || empty($_POST['phoneno'])) {
        $error = '<div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>All fields must be filled!</strong>
                </div>';
    } else {
        $fname = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $fsize = $_FILES['file']['size'];
        $extension = explode('.', $fname);
        $extension = strtolower(end($extension));
        $fnew = uniqid() . '.' . $extension;
        $store = "../admin/admin_img/lost_and_found/" . basename($fnew);

        if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif') {
            if ($fsize >= 1000000) {
                $error = '<div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Max image size is 1024kb!</strong> Try a different image.
                        </div>';
            } else {
                $sql = "INSERT INTO lost_and_found (lostfound_id, type, pet_type, name, gender, age, image, location, lostfound_date, phoneno) 
                        VALUES (NULL, '".$_POST['type']."', '".$_POST['pet_type']."', '".$_POST['name']."', '".$_POST['gender']."', '".$_POST['age']."', '".$fnew."', '".$_POST['location']."', '".$_POST['lostfound_date']."', '".$_POST['phoneno']."')";
                mysqli_query($db, $sql);
                move_uploaded_file($temp, $store);
                $success = '<div class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                New lost/found pet added successfully.
                            </div>';
            }
        } elseif ($extension == '') {
            $error = '<div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Please select an image.</strong>
                    </div>';
        } else {
            $error = '<div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Invalid image extension!</strong> Only PNG, JPG, and GIF are accepted.
                    </div>';
        }
    }
}
?>

                <head>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <meta name="description" content="">
                    <meta name="author" content="">
                    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
                    <title>Add Lost and Found pet</title>
                    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
                    <link href="css/helper.css" rel="stylesheet">
                    <link href="css/style.css" rel="stylesheet">
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
                                <!-- Start Page Content -->

                                <?php  echo $error;
									        echo $success; ?>

                                <div class="col-lg-12">
                                    <div class="card card-outline-primary">
                                        <div class="card-header">
                                        <h4 class="m-b-0 text-white">Add Lost/Found Pet</h4>
                        </div>
                        <div class="card-body">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-body">
            <hr>
            <div class="row p-t-20">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Type</label>
                        <select name="type" class="form-control custom-select" required>
                            <option value="">-- Select Type --</option>
                            <option value="Lost">Lost</option>
                            <option value="Found">Found</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Type</label>
                        <select name="pet_type" class="form-control custom-select" required>
                            <option value="">-- Select pet Type --</option>
                            <option value="Dog">Dog</option>
                            <option value="Cat">Cat</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label class="control-label">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Breed-name" required>
                    </div>
                </div>
            </div>
            <div class="row p-t-20">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Gender</label>
                        <select name="gender" class="form-control custom-select" required>
                            <option value="">-- Select Gender --</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Unknown">Unknown</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label class="control-label">Age</label>
                        <input type="number" name="age" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row p-t-20">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Image</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label class="control-label">Location</label>
                        <textarea name="location" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
            </div>
            <div class="row p-t-20">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Lost/Found Date</label>
                        <input type="date" name="lostfound_date" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label class="control-label">Phone Number</label>
                        <input type="text" name="phoneno" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <input type="submit" name="submit" class="btn btn-primary" value="Save">
            <a href="add_lostandfound.php" class="btn btn-inverse">Cancel</a>
        </div>
    </form>
</div>

                                </div>
                            </div>
                            <?php include "include/footer.php" ?>
                        </div>
                    </div>
                    </div>
                    </div>

                    <script src="js/lib/jquery/jquery.min.js"></script>
                    <script src="js/lib/bootstrap/js/popper.min.js"></script>
                    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
                    <script src="js/jquery.slimscroll.js"></script>
                    <script src="js/sidebarmenu.js"></script>
                    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
                    <script src="js/custom.min.js"></script>

                </body>

                </html>