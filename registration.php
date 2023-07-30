<!DOCTYPE html>
<html lang="en">
<?php

session_start(); 
error_reporting(0); 
include("connection/connect.php"); 
if(isset($_POST['submit'] )) 
{
     if(empty($_POST['firstname']) || 
   	    empty($_POST['lastname'])|| 
		empty($_POST['email']) ||  
		empty($_POST['phone'])||
		empty($_POST['password'])||
		empty($_POST['cpassword']) ||
		empty($_POST['address']))
		{
            echo "<script>alert('All fields must be Required!');</script>";
		}
	else
	{
	
	$check_username= mysqli_query($db, "SELECT username FROM users where username = '".$_POST['username']."' ");
	$check_email = mysqli_query($db, "SELECT email FROM users where email = '".$_POST['email']."' ");
		

	
	if($_POST['password'] != $_POST['cpassword']){  
       	
          echo "<script>alert('Password not match');</script>"; 
    }
	elseif(strlen($_POST['password']) < 6)  
	{
      echo "<script>alert('Password Must be greater than 6 digits');</script>"; 
	}
	elseif(strlen($_POST['phone']) < 10 || strlen($_POST['phone']) > 10 )    
	{
      echo "<script>alert('Invalid phone number!');</script>"; 
	}

    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
    {
          echo "<script>alert('Invalid email address please type a valid email!');</script>"; 
    }
	elseif(mysqli_num_rows($check_username) > 0) 
     {
       echo "<script>alert('Username Already exists!');</script>"; 
     }
	elseif(mysqli_num_rows($check_email) > 0) 
     {
       echo "<script>alert('Email Already exists!');</script>"; 
     }
	else{
       
	 
	$mql = "INSERT INTO users(username,first_name,last_name,email,phone,password,address) VALUES('".$_POST['username']."','".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['phone']."','".md5($_POST['password'])."','".$_POST['address']."')";
	mysqli_query($db, $mql);
	echo "<script>alert('Welcome to the DPCMS!');</script>";
		 header("refresh:0.1;url=login.php");
    }
	}

}


?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Registration || Petconnect+ - Group5</title>
    <!-- Favicon -->
    <link href="images/Mainlogo.jpg" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/extra.css" rel="stylesheet">
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
                            echo '<a href="login.php" class="nav-item nav-link">Login</a> 
                          <a href="registration.php" class="nav-item nav-link active">Register</a> ';
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

            <section class="contact-page inner-page">
                <div class="container ">
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="widget">
                                <div class="widget-body">
                                
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <label for="exampleInputEmail1"><strong>User-Name</strong></label>
                                                <input class="form-control" type="text" name="username" id="example-text-input" required pattern="[A-Za-z ]+">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="exampleInputEmail1"><strong>First Name</strong></label>
                                                <input class="form-control" type="text" name="firstname" id="example-text-input" required pattern="[A-Za-z ]+">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="exampleInputEmail1"><strong>Last Name</strong></label>
                                                <input class="form-control" type="text" name="lastname" id="example-text-input-2" required pattern="[A-Za-z ]+"> 
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="exampleInputEmail1"><strong>Email Address</strong></label>
                                                <input type="text" class="form-control" placeholder="sample@sample.com"  name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="exampleInputEmail1"><strong>Phone number</strong></label>
                                                <input class="form-control" type="text" placeholder="0xxxxxxxxx" name="phone" id="example-tel-input-3" required>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label for="exampleInputPassword1"><strong>Password</strong> (Create a strong password with a mixture of letters, numbers and symbols)</label>
                                                <input type="password" class="form-control" name="password" placeholder="Password must be greater than 6 digits" id="exampleInputPassword1" required>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label for="exampleInputPassword1"><strong>Confirm password</strong></label>
                                                <input type="password" class="form-control" name="cpassword" placeholder="Password must be greater than 6 digits" id="exampleInputPassword2" required>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label for="exampleTextarea"><strong>Delivery Address</strong></label>
                                                <textarea class="form-control" id="exampleTextarea" name="address" rows="3" required></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <p> <input type="submit" value="Register" name="submit" class="btn theme-btn">
                                                <a href="registration.php" class="btn btn-inverse">Cancel</a> </p>
                                            </div>
                                                
                                        </div>
                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </section>
         <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-4 col-md-12 mb-5">
                <h1 class="mb-3 display-5 text-capitalize text-white"><span class="text-primary">Pawsome</span>Haven</h1>
                <p class="m-0">Pawsome Haven Pet Shop is your one-stop destination for all your pet's needs. We offer a wide range of high-quality products, from food and toys to grooming supplies and accessories. Our mission is to provide exceptional care, promote responsible pet ownership, and ensure the well-being of animals. With our adoption services, grooming, and training, we are dedicated to building a strong bond between pets and their owners. Join us in creating a world where every animal is cherished, protected, and living their best life.</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-primary mb-4">Get In Touch</h5>
                        <p><i class="fa fa-map-marker mr-2"></i>123 Main Street, Colombo, Sri Lanka</p>
                        <p><i class="fa fa fa-phone mr-2"></i>+94 123456789</p>
                        <p><i class="fa fa-envelope mr-2"></i>info@pawsomehaven.com</p>
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-primary mb-4">Popular Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>About Us</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Services</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Team</a>
                            <a class="text-white" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-primary mb-4">Newsletter</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0" placeholder="Your Email" required="required" />
                            </div>
                            <div>
                                <button class="btn btn-lg btn-primary btn-block border-0" type="submit">Submit Now</button>
                            </div>
                        </form>
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
            <div class="col-md-6 text-center text-md-right">
                <ul class="nav d-inline-flex">
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Privacy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Terms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Help</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
</body>

</html>