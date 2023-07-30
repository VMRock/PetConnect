<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

if (isset($_POST['submit'])) {
    if (empty($_POST['type']) || empty($_POST['pet_type']) || empty($_POST['name']) || empty($_POST['gender']) || $_POST['age'] == '' || empty($_POST['location']) || empty($_POST['lostfound_date'])) {
        $error = '<div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>All fields must be filled!</strong>
                </div>';
    } else {
        // File Upload Process
        $fname = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $fsize = $_FILES['file']['size'];
        $extension = explode('.', $fname);
        $extension = strtolower(end($extension));
        $fnew = uniqid() . '.' . $extension;
        $store = "admin_img/lost_and_found/" . basename($fnew);

        if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif' || $extension == 'jpeg') {
            if ($fsize >= 1000000) {
                $error = '<div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Max image size is 1024kb!</strong> Try a different image.
                        </div>';
            } else {
                // If everything is fine with the uploaded image, continue with the update process.
                $type = $_POST['type'];
                $pet_type = $_POST['pet_type'];
                $name = $_POST['name'];
                $gender = $_POST['gender'];
                $age = $_POST['age'];
                $location = $_POST['location'];
                $lostfound_date = $_POST['lostfound_date'];
                $lostfound_id = $_GET['lostandfound_upd'];

                $sql = "UPDATE lost_and_found SET type='$type', pet_type='$pet_type', name='$name', gender='$gender', age='$age', image='$fnew', location='$location', lostfound_date='$lostfound_date' WHERE lostfound_id='$lostfound_id'";

                if (mysqli_query($db, $sql)) {
                    move_uploaded_file($temp, $store);

                    $success = '<div class="alert alert-success alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>Record Updated!</strong>
                                </div>';
                } else {
                    $error = '<div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Error updating record:</strong> ' . mysqli_error($db) . '
                            </div>';
                }
            }
        } else {
            $error = '<div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Invalid image format!</strong> Only JPG, JPEG, PNG, and GIF images are allowed.
                    </div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Update Lost and Found</title>
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
                <!-- Display error and success messages -->
                <?php echo $error;
                echo $success; ?>

                <div class="col-lg-12">
                    <div class="card card-outline-primary">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">Update Lost Pet</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                    <?php
                                    // Fetch existing data from the database for pre-populating the form
                                    $qml = "SELECT * FROM lost_and_found WHERE lostfound_id='$_GET[lostandfound_upd]'";
                                    $rest = mysqli_query($db, $qml);
                                    $roww = mysqli_fetch_array($rest);
                                    ?>
                                    <hr>
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Type</label>
                                        <select name="type" class="form-control custom-select" required>
                                            <option value="">-- Select Type --</option>
                                            <option value="Lost" <?php if ($roww['type'] == 'Lost') echo 'selected'; ?>>Lost</option>
                                            <option value="Found" <?php if ($roww['type'] == 'Found') echo 'selected'; ?>>Found</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Pet Type</label>
                                        <select name="pet_type" class="form-control custom-select" required>
                                            <option value="">-- Select Pet Type --</option>
                                            <option value="Dog" <?php if ($roww['pet_type'] == 'Dog') echo 'selected'; ?>>Dog</option>
                                            <option value="Cat" <?php if ($roww['pet_type'] == 'Cat') echo 'selected'; ?>>Cat</option>
                                            <option value="Other" <?php if ($roww['pet_type'] == 'Other') echo 'selected'; ?>>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-danger">
                                        <label class="control-label">Name</label>
                                            <input type="text" name="name" value="<?php echo $roww['name']; ?>" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Gender</label>
                                        <select name="gender" class="form-control custom-select" required>
                                            <option value="">-- Select Gender --</option>
                                            <option value="Male" <?php if ($roww['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                                            <option value="Female" <?php if ($roww['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                                            <option value="Unknown" <?php if ($roww['gender'] == 'Unknown') echo 'selected'; ?>>Unknown</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-danger">
                                        <label class="control-label">Age</label>
                                        <input type="number" name="age" value="<?php echo $roww['age']; ?>" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Image</label>                               
                                        <input type="file" name="file" class="form-control">
                                        <input type="hidden" name="existing_img" value="<?php echo $existingImg; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-danger">
                                        <label class="control-label">Location</label>
                                        <textarea name="location" class="form-control" rows="3" required><?php echo $roww['location']; ?></textarea>
                                    </div>
                                </div>
                            </div>                              
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Lost/Found Date</label>
                                    <input type="date" name="lostfound_date" value="<?php echo $roww['lostfound_date']; ?>" class="form-control" required>                           
                                </div>
                            </div>                                
                            <div class="col-md-6">
                                <div class="form-group has-danger">
                                    <label class="control-label">Phone Number</label>
                                    <input type="text" name="phoneno" value="<?php echo $roww['phoneno']; ?>" class="form-control"rows="4" required>
                                </div>
                            </div>
                            <div class="form-actions">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Update">
                                    <a href="all_lostandfound.php" class="btn btn-inverse">Cancel</a>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php include "include/footer.php" ?>
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
