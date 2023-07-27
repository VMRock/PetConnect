<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

 $sql = "SELECT users.*, pet_adoption.* FROM users INNER JOIN pet_adoption ON users.user_id=pet_adoption.user_id WHERE pet_id='$_GET[petadoption_email]'";
 $query = mysqli_query($db, $sql);
$rows = mysqli_fetch_array($query);

 $sql_pets = "SELECT age,gender FROM pets WHERE pet_id='$_GET[petadoption_email]'";
 $query_pet = mysqli_query($db, $sql_pets);
 $row = mysqli_fetch_array($query_pet);
                                                            
// Assuming $rows['date'] contains the date in 'Y-m-d H:i:s' format, like '2023-07-27 12:34:56'

// Convert the date string to a DateTime object
$date = new DateTime($rows['date']);

// Add 2 days to the date
$date->add(new DateInterval('P2D'));

// Get the date in 'Y-m-d' format (without time)
$formattedDate = $date->format('Y-m-d');

// Output the formatted date in the table cell
echo '<td>' . $formattedDate . '</td>';

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Update pets</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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
            <div class="col-lg-12">
            <div class="card card-outline-primary">
                            <div class="card-header">
                                                    <h4 class="m-b-0 text-white">Pet Adoption Email</h4>
                                                </div>
                            <div class="form-container">
                                    <form method="post" action="adoption_email.php">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" value="<?php echo $rows['username']; ?>" id="name" required>
                                        <label for="email">Email</label>
                                        <input type="email" name="email" value="<?php echo $rows['email']; ?>" id="email" required>
                                        <label for="subject">Subject</label> 
                                        <input type="subject" name="subject" value="Thank You for Expressing Interest in Adopting a Pet from Pawsome Haven!" id="subject" required>
                                        <label for="message">Message</label>
                                        <select name="message" id="message" required="required">
                                            <option value="Thank You for Expressing Interest in Adopting a Pet from Pawsome Haven!
Dear <?php echo $rows['first_name'] . " " . $rows['last_name']; ?>,
We hope this email finds you in good health and high spirits. We are delighted to learn about your interest in adopting a pet from Pawsome Haven, and we truly appreciate your decision to provide a loving home to one of our adorable furry friends.

We are pleased to inform you that you have selected <?php echo $rows['pet_name']; ?>, a wonderful <?php echo $rows['breed']; ?>,, as the potential new member of your family. <?php echo $rows['pet_name']; ?>, is a playful and affectionate companion who can bring immense joy and happiness to your life.

Details of the Pet:
Name: <?php echo $rows['pet_name']; ?>,
Breed: <?php echo $rows['breed']; ?>,
Age: <?php echo $row['age']; ?>,
Gender: <?php echo $row['gender']; ?>,

Before proceeding with the adoption process, we kindly request you to visit our pet shop at the following address on <?php echo $formattedDate; ?>, at 10.00 am. This will allow you to interact with <?php echo $rows['pet_name']; ?>, and our team will be more than happy to assist you with any questions or concerns you may have.

Pawsome Haven Pet Shop
123 Main Street, Colombo, Sri Lanka

We take the adoption process seriously, as it involves providing a nurturing environment for our beloved animals. During your visit, we will guide you through the adoption procedure and ensure that it is a smooth and fulfilling experience for you.Please make sure to bring the following documents with you during your visit:
1. Valid identification (e.g., Driver's License, Passport)
2. Proof of address (e.g., Utility Bill)
3. Attached to this email, you will find the adoption form. Please fill it out and bring the completed form with you during your visit to our pet shop.
Please note that this is not a final commitment, and our team will also conduct a brief interview to assess the compatibility between you and <?php echo $rows['pet_name']; ?>,. The well-being of the animal is our utmost priority, and we want to ensure that both you and the pet have a loving and harmonious relationship.

If, for any reason, you are unable to keep the appointment or need to reschedule, please inform us at least 24 hours in advance, and we will be happy to accommodate your request.Once again, thank you for choosing to adopt from Pawsome Haven. By opening your heart and home to <?php echo $rows['pet_name']; ?>, you are making a tremendous difference in their life.

Should you have any questions or need further assistance, please don't hesitate to contact us at +94 123456789 or info@pawsomehaven.com.We eagerly await your visit and are excited to see the beginning of a beautiful bond between you and your potential new furry friend!
Warm regards,

The Pawsome Haven Adoption Team
123 Main Street, Colombo, Sri Lanka
+94 123456789
info@pawsomehaven.com 
This is an automatically generated e-mail from our subscription list. Please do not reply to this e-mail.">Select Message</option></select>
                                        <br>
                                        <button type="submit">Send Email</button>
                                    </form>
                        </div>
                    </div>
                                                                           
                </div>
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
