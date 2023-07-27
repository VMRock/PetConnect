<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");  
error_reporting(0);
session_start();

if (isset($_POST['submit'])) {
    if (empty($_POST['type']) || empty($_POST['pet_type']) || empty($_POST['name']) || empty($_POST['gender']) || $_POST['age'] == '' || empty($_POST['location']) || empty($_POST['lostfound_date']) || empty($_POST['phoneno'])) {
        echo "<script>alert('All fields must be filled!');</script>";
        
    } else {
        if(strlen($_POST['phone']) < 10 || strlen($_POST['phone']) > 10 )  {
            echo "<script>alert('Invalid phone number!');</script>";
        } else {
        $fname = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $fsize = $_FILES['file']['size'];
        $extension = explode('.', $fname);
        $extension = strtolower(end($extension));
        $fnew = uniqid() . '.' . $extension;
        $store = "admin/admin_img/lost_and_found/" . basename($fnew);

        if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif') {
            if ($fsize >= 1000000) {
                echo "<script>alert('Max image size is 1024kb!');</script>";
            } else {
                $sql = "INSERT INTO lost_and_found (lostfound_id, type, pet_type, name, gender, age, image, location, lostfound_date, phoneno) 
                        VALUES (NULL, '".$_POST['type']."', '".$_POST['pet_type']."', '".$_POST['name']."', '".$_POST['gender']."', '".$_POST['age']."', '".$fnew."', '".$_POST['location']."', '".$_POST['lostfound_date']."', '".$_POST['phoneno']."')";
                mysqli_query($db, $sql);
                move_uploaded_file($temp, $store);
                echo "<script>alert('New lost/found pet added successfully.');</script>";
                
                            header("refresh:0.1;url=LostFound.php");
            }
        } elseif ($extension == '') {
            echo "<script>alert('Please select an image.');</script>";
        } else {
            echo "<script>alert('Invalid image extension!');</script>";
        }
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
    <title>Lost And Found Pets || Petconnect+ - Group5</title>
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
                    <a href="LostFound.php" class="nav-item nav-link active">LostFound</a>
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
                <a href="Volunteer.php" class="btn btn-lg btn-primary px-3 d-none d-lg-block">Volunteer Sign Up</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

     <!-- LostFound Start -->
     <div class="container pt-5">
        <div class="d-flex flex-column text-center mb-5 pt-5">
            <h4 class="text-secondary mb-3">Pet Lost And Found Notice</h4>
        </div>
        <div class="row">
    <?php 					
    $query_res = mysqli_query($db, "SELECT * FROM lost_and_found"); 
    while($r = mysqli_fetch_array($query_res)) {
        echo '<div class="col-xs-12 col-sm-6 col-md-4">
            <div class="card border-0 mb-2">
                <img class="card-img-top" src="admin/admin_img/lost_and_found/'.$r['image'].'" alt="">
                <div class="card-body bg-light p-4">
                    <h4 class="card-title text-truncate">'.$r['name'].'</h4>
                    <div class="d-flex mb-3">
                        <small class="mr-2"><i class="fa fa-user text-muted"></i> '.$r['type'].'</small>
                        <small class="mr-2"><i class="fa fa-user text-muted"></i> '.$r['pet_type'].'</small>
                        <small class="mr-2"><i class="fa fa-comments text-muted"></i>'.$r['date'].'</small>
                    </div>
                    <p>Lost/Found date: '.$r['lostfound_date'].'</p>
                    <p>Pet Type: '.$r['pet_type'].'</p>
                    <p>Gender: '.$r['gender'].'</p>
                    <p>Location: '.$r['location'].'</p>
                <a class="btn theme-btn-dash pull-right contact-button" data-phone="'.$r['phoneno'].'" href="#">Reveal Phone Number</a>
                <p class="phone-number d-none">'.$r['phoneno'].'</p>
                </div>
            </div>
        </div>';                                      
    }	
    ?>
</div>

 <!-- Start -->
 <div class="container-fluid bg-light pt-5 pb-4">
        <div class="container py-5">
            <div class="d-flex flex-column text-center mb-5">
                <h1 class="display-4 m-0">Lost and Found  <span class="text-primary">Form</span></h1>
            </div>
        </div>
    </div>
    <!-- End -->
    
<div class="row">
        <div class="col-md-6 offset-md-3">
       <!--<h4 class="text-secondary mb-3">Insert Lost and Found Notice</h4>-->
       <div class="bg-primary py-5 px-4 px-sm-5">
            
            <form action="" method="post" enctype="multipart/form-data">
        <div class="form-body">
            <hr>
                    <div class="form-group">
                        <label class="m-0">Type</label>
                        <select name="type" class="form-control custom-select" required>
                            <option value="">-- Select Type --</option>
                            <option value="Lost">Lost</option>
                            <option value="Found">Found</option>
                        </select>
                    </div>              
                    <div class="form-group">
                        <label class="m-0">Type</label>
                        <select name="pet_type" class="form-control custom-select" required>
                            <option value="">-- Select pet Type --</option>
                            <option value="Dog">Dog</option>
                            <option value="Cat">Cat</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>               
                    <div class="form-group">
                        <label class="m-0">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Breed-name" required pattern="[A-Za-z ]+">
                    </div>               
                    <div class="form-group">
                        <label class="m-0">Gender</label>
                        <select name="gender" class="form-control custom-select" required>
                            <option value="">-- Select Gender --</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Unknown">Unknown</option>
                        </select>
                    </div>               
                    <div class="form-group">
                        <label class="m-0">Age</label>
                        <input type="number" name="age" class="form-control" required>
                    </div>
                         
                    <div class="form-group">
                        <label class="control-label">Image</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                
                    <div class="form-group">
                        <label class="m-0">Location</label>
                        <textarea name="location" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label class="m-0">Lost/Found Date</label>
                        <input type="date" name="lostfound_date" class="form-control" required>
                    </div>
                    <div class="form-group">
    <label class="m-0">Phone Number</label>
    <input type="text" name="phoneno" class="form-control" maxlength="10" minlength="10" pattern="[0-9]{10}" title="Please enter a 10-digit phone number" required>
</div>
                    <div class="form-actions">
                        <input type="submit" name="submit" class="btn btn-dark btn-block border-0 py-3" value="Save">
                    </div>
            </div>
    </form>
        </div>
</div>
    </div>
    </div>
    </section>
    <!-- LostFound End -->
    
    <?php include "include/footer.php" ?>

    <script>
    // Get all the contact buttons
    const contactButtons = document.querySelectorAll('.contact-button');

    // Add click event listener to each contact button
    contactButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();

            // Get the associated phone number
            const phoneNumber = this.getAttribute('data-phone');

            // Toggle the visibility of the phone number
            const phoneNumberElement = this.parentElement.querySelector('.phone-number');
            phoneNumberElement.classList.toggle('d-none');

            // Update the button text based on visibility
            if (phoneNumberElement.classList.contains('d-none')) {
                this.textContent = 'Reveal Phone Number';
            } else {
                this.textContent = 'Hide Phone Number';
            }
        });
    });
</script>
</body>

</html>