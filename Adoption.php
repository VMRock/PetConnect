<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");  
error_reporting(0);
session_start();

if (empty($_SESSION["user_id"])) {
    header('location:login.php');
} else {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $petId = $_POST["pet_id"];
        $petName = $_POST["pet_name"];
        $breed = $_POST["breed"];
        $userId = $_SESSION["user_id"];

        // Perform necessary validation and sanitization on $petId, $petName, $breed, and $userId before insertion

        // Check if the pet_name is already adopted
        $checkSQL = "SELECT pet_name,user_id FROM pet_adoption WHERE pet_name='$petName' AND  user_id='$userId'  LIMIT 1";
        $checkResult = mysqli_query($db, $checkSQL);
        if (mysqli_num_rows($checkResult) > 0) {
            // Pet name is already adopted
            echo "<script>alert('This pet is already in process of adoption. Please choose a different Pet.');</script>";
            echo "<script>window.location.replace('Adoption.php');</script>";
            exit; // Stop further execution of the code
        }

        // Insert the adoption request
        $SQL = "INSERT INTO pet_adoption (user_id, pet_id, pet_name, breed) VALUES ('$userId', '$petId', '$petName', '$breed')";

        if (mysqli_query($db, $SQL)) {
            
            echo "<script>alert('Thank you. We will contact you via email.');</script>";
            echo "<script>window.location.replace('Adoption.php');</script>";
        } else {
          
            echo "<script>alert('An error occurred. Please try again later.');</script>";
            echo "<script>window.location.replace('Adoption.php');</script>";
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
    <title>Pet Adoption || Petconnect+ - Group5</title>
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
                    <a href="Adoption.php" class="nav-item nav-link active">Adoption</a>
                    <a href="LostFound.php" class="nav-item nav-link ">LostFound</a>
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
        <h4 class="text-secondary mb-3">Find your new best friend</h4>
    </div>
    <div class="row">
        <?php
        $query_res = mysqli_query($db, "SELECT * FROM pets");
        while ($r = mysqli_fetch_array($query_res)) {
            $mql = "SELECT * FROM pet_category WHERE category_id='" . $r['category_id'] . "'";
            $newquery = mysqli_query($db, $mql);
            $fetch = mysqli_fetch_array($newquery);
            echo '<div class="col-xs-12 col-sm-6 col-md-4">
            <div class="card border-0 mb-2">
                <img class="card-img-top" src="admin/admin_img/adoption/' . $r['image'] . '" alt="">
                <div class="card-body bg-light p-4">
                    <h4 class="card-title text-truncate">' . $r['pet_name'] . '</h4>
                    <div class="d-flex mb-3">
                        <small class="mr-2"><i class="fa fa-user text-muted"></i> ' . $r['breed'] . '</small>
                    </div>
                    <p>Pet Id: ' . $r['pet_id'] . '</p>
                    <p>PetCategory: ' . $fetch['category_name'] . '</p>
                    <p>Gender: ' . $r['gender'] . '</p>
                    <p>Age: ' . $r['age'] . '</p>
                    <div id="adoption-form-' . $r['pet_id'] . '">
                        <!-- Adopt button with a form to submit the adoption data -->
                        <form method="post" action="Adoption.php">
                            <input type="hidden" name="pet_id" value="' . $r['pet_id'] . '">
                            <input type="hidden" name="pet_name" value="' . $r['pet_name'] . '">
                            <input type="hidden" name="breed" value="' . $r['breed'] . '">
                            <button class="btn btn-dark btn-block border-0 py-3" type="submit" ">Adopt</button>
                        </form>
                        </div>
                </div>
            </div>
        </div>';
        }
        ?>
    </div>
</div>

<script>
    function blockAdoptionForm(petId) {
        var adoptionForm = document.getElementById('adoption-form-' + petId);
        adoptionForm.innerHTML = '<p class="text-danger">Adoption request submitted! Waiting for approval...</p>';
    }

    
</script>
<!-- Display the list of adopted pets -->
<div class="container pt-5">
        <div class="d-flex flex-column text-center mb-5 pt-5">
            <h4 class="text-secondary mb-3">Your Adopted Pets</h4>
        </div>
        <table class="table table-bordered table-hover">
            <thead style="background: #404040; color:white;">
                <tr>
                    <th>Pet ID</th>
                    <th>Pet Name</th>
                    <th>Breed</th>
                    <th>Adoption Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("connection/connect.php");
                session_start();
                
                if (empty($_SESSION["user_id"])) {
                    header('location: login.php');
                    exit;
                }

                // Fetch the adopted pets data for the current user
                $userId = $_SESSION["user_id"];
                $sql = "SELECT * FROM pet_adoption WHERE user_id = '$userId'";
                $result = mysqli_query($db, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['pet_id'] . '</td>';
                    echo '<td>' . $row['pet_name'] . '</td>';
                    echo '<td>' . $row['breed'] . '</td>';
                    echo '<td>' . $row['date'] . '</td>';
                    echo '<td>';
                    echo '<form method="post" onsubmit="return confirm(\'Are you sure you want to cancel adoption?\')" action="cancel_adoption.php">';
                    echo '<input type="hidden" name="adoption_id" value="' . $row['adoption_id'] . '">';
                    echo '<button class="btn btn-danger btn-block border-0 py-3" type="submit">Cancel</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- End of displaying the list of adopted pets -->

    </section>

    <!-- Footer Start -->
    
    <?php include "include/footer.php" ?>
    <!-- Footer End -->
    
</body>

</html>