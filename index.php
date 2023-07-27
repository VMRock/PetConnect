<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");  
error_reporting(0);  
session_start(); 
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Home || Petconnect+ - Group5</title>
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
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="Pet.php" class="nav-item nav-link">Product</a>
                    <a href="services.php" class="nav-item nav-link">About</a>
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
                <a href="Volunteer.php" class="btn btn-lg btn-primary px-3 d-none d-lg-block">Volunteer Sign Up</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->     
    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="admin/admin_img/dog4.gif" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h3 class="text-white mb-3 d-none d-sm-block">Best Pet Products</h3>
                            <h1 class="display-3 text-white mb-3">Best Friend With Happy Time</h1>
                            <h5 class="text-white mb-3 d-none d-sm-block">Dogs have an exceptional sense of smell. They have up to 300 million olfactory receptors in their noses, compared to about 6 million in humans. This allows them to detect specific scents, such as drugs, explosives, or even diseases like cancer.</h5>
                            <a href="adoption.php" class="btn btn-lg btn-primary mt-3 mt-md-4 px-4">Adopt Now</a>
                            <a href="services.php" class="btn btn-lg btn-secondary mt-3 mt-md-4 px-4">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="admin/admin_img/cat4.gif" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h3 class="text-white mb-3 d-none d-sm-block">Best Pet Products</h3>
                            <h1 class="display-3 text-white mb-3">Keep Your Pet Happy</h1>
                            <h5 class="text-white mb-3 d-none d-sm-block">Cats have a specialized collarbone called the "clavicle," but it's not connected to other bones in their skeleton. This allows them to squeeze through tight spaces and makes them excellent climbers.</h5>
                            <a href="adoption.php" class="btn btn-lg btn-primary mt-3 mt-md-4 px-4">Adopt Now</a>
                            <a href="services.php" class="btn btn-lg btn-secondary mt-3 mt-md-4 px-4">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-primary rounded" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-primary rounded" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->  
    <!-- About Start -->
    <div class="container py-5">
        <div class="row py-5">
            <div class="col-lg-7 pb-5 pb-lg-0 px-3 px-lg-5">
                <h4 class="text-secondary mb-3"><i class="fa fa-paw text-secondary mr-3"></i>Adoption</h4>
                <h1 class="display-4 mb-4">Work For <span class="text-primary">Adoption</span> Happy Time</h1>
                <h5 class="text-muted mb-3">we are committed to making the dog and cat adoption process a happy and memorable experience for both pets and their new families.</h5>
                <p class="mb-4"> We work tirelessly to find forever homes for these adorable companions, ensuring their happiness and well-being.</p>
                <ul class="list-inline">
                    <li><h5><i class="fa fa fa-check-square-o text-secondary mr-3"></i>Extensive Adoption Screening Process</h5></li>
                    <li><h5><i class="fa fa fa-check-square-o text-secondary mr-3"></i>Post-Adoption Support and Follow-up</h5></li>
                </ul>
                <a href="adoption.php" class="btn btn-lg btn-primary mt-3 px-4">Learn More</a>
            </div>
            <div class="col-lg-5">
                <div class="row px-3">
                    <div class="col-12 p-0">
                        <img class="img-fluid w-100" src="images/price-3.jpg" alt="">
                    </div>
                    <div class="col-6 p-0">
                        <img class="img-fluid w-100" src="images/bg3.gif" alt="">
                    </div>
                    <div class="col-6 p-0">
                        <img class="img-fluid w-100" src="images/login.jpeg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    <!-- Features Start -->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <img class="img-fluid w-100" src="images/style.png" alt="">
            </div>
            <div class="col-lg-7 py-5 py-lg-0 px-3 px-lg-5">
                <h4 class="text-secondary mb-3">Why Choose Us?</h4>
                <h1 class="display-4 mb-4"><span class="text-primary">Special Care</span> On Pets</h1>
                <p class="mb-4">Dolor lorem lorem ipsum sit et ipsum. Sadip sea amet diam sed ut vero no sit. Et elitr stet sed sit sed kasd. Erat duo eos et erat sed diam duo</p>
                <div class="row py-2">
                    <div class="col-6">
                        <div class="d-flex align-items-center mb-4">
                            <h1 class="flaticon-cat font-weight-normal text-secondary m-0 mr-3"></h1>
                            <h5 class="text-truncate m-0"><i class="fa fa-paw text-secondary mr-3"></i>Best In Industry</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center mb-4">
                            <h1 class="flaticon-doctor font-weight-normal text-secondary m-0 mr-3"></h1>
                            <h5 class="text-truncate m-0"><i class="fa fa-paw text-secondary mr-3"></i>Emergency Services</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <h1 class="flaticon-care font-weight-normal text-secondary m-0 mr-3"></h1>
                            <h5 class="text-truncate m-0"><i class="fa fa-paw text-secondary mr-3"></i>Special Care</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <h1 class="flaticon-dog font-weight-normal text-secondary m-0 mr-3"></h1>
                            <h5 class="text-truncate m-0"><i class="fa fa-paw text-secondary mr-3"></i>Customer Support</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->
    <!-- Team Start -->
    <div class="container mt-5 pt-5 pb-3">
        <div class="d-flex flex-column text-center mb-5">
            <h4 class="text-secondary mb-3">Team Member</h4>
            <h1 class="display-4 m-0">Meet Our <span class="text-primary">Team Member</span></h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="team card position-relative overflow-hidden border-0 mb-4">
                    <img class="card-img-top" height="156" width="275" src="images/worker3.gif" alt="">
                    <div class="card-body text-center p-0">
                        <div class="team-text d-flex flex-column justify-content-center bg-light">
                            <h5>Mollie Ross</h5>
                            <i>Founder & CEO</i>
                        </div>
                        <div class="team-social d-flex align-items-center justify-content-center bg-dark">
                            <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-primary rounded-circle text-center px-0" style="width: 36px; height: 36px;" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team card position-relative overflow-hidden border-0 mb-4">
                    <img class="card-img-top" height="156" width="275" src="images/test3.gif" alt="">
                    <div class="card-body text-center p-0">
                        <div class="team-text d-flex flex-column justify-content-center bg-light">
                            <h5>Jennifer Page</h5>
                            <i>Chef Executive</i>
                        </div>
                        <div class="team-social d-flex align-items-center justify-content-center bg-dark">
                            <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-primary rounded-circle text-center px-0" style="width: 36px; height: 36px;" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team card position-relative overflow-hidden border-0 mb-4">
                    <img class="card-img-top" height="156" width="275" src="images/worker6.gif" alt="">
                    <div class="card-body text-center p-0">
                        <div class="team-text d-flex flex-column justify-content-center bg-light">
                            <h5>Kate Glover</h5>
                            <i>Doctor</i>
                        </div>
                        <div class="team-social d-flex align-items-center justify-content-center bg-dark">
                            <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-primary rounded-circle text-center px-0" style="width: 36px; height: 36px;" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team card position-relative overflow-hidden border-0 mb-4">
                    <img class="card-img-top" height="156" width="275" src="images/worker4.gif" alt="">
                    <div class="card-body text-center p-0">
                        <div class="team-text d-flex flex-column justify-content-center bg-light">
                            <h5>Lilly Fry</h5>
                            <i>Trainer</i>
                        </div>
                        <div class="team-social d-flex align-items-center justify-content-center bg-dark">
                            <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-primary rounded-circle text-center px-0" style="width: 36px; height: 36px;" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->
    <!-- Testimonial Start -->
    <div class="container-fluid bg-light my-5 p-0 py-5">
        <div class="container p-0 py-5">
            <div class="d-flex flex-column text-center mb-5">
                <h4 class="text-secondary mb-3">Testimonial</h4>
                <h1 class="display-4 m-0">Our Client <span class="text-primary">Says</span></h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="bg-white mx-3 p-4">
                    <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
                        <img class="img-fluid" src="images/test1.gif" style="width: 80px; height: 80px;" alt="">
                        <div class="ml-3">
                            <h5>John Smith</h5>
                            <i>Dog Trainer</i>
                        </div>
                    </div>
                    <p class="m-0">"Pawsome Haven Petshop has been my go-to destination for all things pet-related. As a dog trainer, I rely on their top-notch pet products for my clients' furry companions. Their online shopping platform is incredibly user-friendly, and the variety of products available is impressive. I recommend Pawsome Haven to all pet owners looking for convenience and quality."</p>
                </div>
                <div class="bg-white mx-3 p-4">
                    <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
                        <img class="img-fluid" src="images/test3.gif" style="width: 80px; height: 80px;" alt="">
                        <div class="ml-3">
                            <h5>Emily Davis</h5>
                            <i>Animal Rescuer</i>
                        </div>
                    </div>
                    <p class="m-0">"Pawsome Haven's dedication to pet adoption is commendable. As an animal rescuer, I've had the pleasure of working closely with them to find loving homes for countless pets. Their adoption process is efficient and thoughtful, ensuring that every pet finds the perfect family. I'm grateful for their tireless efforts to make a difference in the lives of homeless animals."</p>
                </div>
                <div class="bg-white mx-3 p-4">
                    <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
                        <img class="img-fluid" src="images/test2.gif" style="width: 80px; height: 80px;" alt="">
                        <div class="ml-3">
                            <h5>Michael Johnson</h5>
                            <i>Cat Enthusiast</i>
                        </div>
                    </div>
                    <p class="m-0">"Lost and Found Pets is a game-changer! When my beloved cat went missing, I was devastated. Pawsome Haven's quick response and effective platform helped me reunite with my furry friend in no time. Their compassion and commitment to reuniting lost pets with their families are truly commendable. Thank you, Pawsome Haven!"</p>
                </div>
                <div class="bg-white mx-3 p-4">
                    <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
                        <img class="img-fluid" src="images/test4.gif" style="width: 80px; height: 80px;" alt="">
                        <div class="ml-3">
                            <h5>Laura Turner</h5>
                            <i>Pet Lover and Shopper</i>
                        </div>
                    </div>
                    <p class="m-0">"Pawsome Haven Petshop is a pet owner's paradise. From premium pet food to adorable accessories, they have it all. Their online shopping experience is smooth and hassle-free. I've been a loyal customer for years, and I've never been disappointed. Pawsome Haven is where my pets' happiness and well-being are always guaranteed!"</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
    <!-- Lost and found Start -->
    <div class="container pt-5">
        <div class="d-flex flex-column text-center mb-5">
            <h4 class="text-secondary mb-3">Lost and Found</h4>
            <h1 class="display-4 m-0"><span class="text-primary">Updates</span> From Lost and Found</h1>
        </div>
        <div class="row pb-3">
                <?php 					
						$query_res= mysqli_query($db,"select * from lost_and_found LIMIT 3"); 
                                while($r=mysqli_fetch_array($query_res))
                                {                                       
                                    echo '<div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="card border-0 mb-2">
                                        <img class="card-img-top" src="admin/admin_img/lost_and_found/'.$r['image'].'" alt="">
                                        <div class="card-body bg-light p-4">
                                            <h4 class="card-title text-truncate">'.$r['name'].'</h4>
                                            <div class="d-flex mb-3">
                                                <small class="mr-2"><i class="fa fa-user text-muted"></i> '.$r['type'].'</small>
                                                <small class="mr-2"><i class="fa fa-user text-muted"></i> '.$r['pet_type'].'</small>
                                                <small class="mr-2"><i class="fa fa-folder text-muted"></i> '.$r['lostfound_date'].'</small>
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
    </div>
    <!-- Blog End -->
    <section class="popular">
        <div class="container">
            <div class="title text-xs-center m-b-30">
                <h2>Popular products of the Month</h2>
                <p class="lead">Easiest way to order your favourite product among these top 3 products</p>
            </div>
            <div class="row" >
                <?php 					
						$query_res= mysqli_query($db,"select * from products LIMIT 3"); 
                                while($r=mysqli_fetch_array($query_res))
                                {                                       
                                    echo '  <div class="col-xs-12 col-sm-6 col-md-4 food-item">
                                            <div class="food-item-wrap">
                                                <div class="figure-wrap bg-image" data-image-src="admin/admin_img/products/'.$r['image'].'"></div>
                                                <div class="content">
                                                    <h5><a href="products.php?res_id='.$r['product_category_id'].'">'.$r['product_name'].'</a></h5>
                                                    <div class="product-name">'.$r['description'].'</div>
                                                    <div class="price-btn-block"> <span class="price">Rs '.$r['price'].'</span> <a href="products?product_category_id='.$r['product_category_id'].'" class="btn theme-btn-dash pull-right">Buy Now</a> </div>
                                                </div>
                                                
                                            </div>
                                    </div>';                                      
                                }	
						?>
            </div>
        </div>
    </section>
    <section class="how-it-works">
        <div class="container">
            <div class="text-xs-center">
                <h2>Easy to Order</h2>
                <div class="row how-it-works-solution">
                    <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col1">
                        <div class="how-it-works-wrap">
                            <div class="step step-1">
                                <div class="icon" data-step="1">
                                <img class="img-fluid" src="images/dog.png" style="width: 80px; height: 80px;" alt="">
                                </div>
                                <h3>Choose a category</h3>
                                <p>We"ve got your covered with products from a variety of categories.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col2">
                        <div class="step step-2">
                            <div class="icon" data-step="2">
                            <img class="img-fluid" src="images/product-2.png" style="width: 80px; height: 80px;" alt="">   
                            </div>
                            <h3>Choose a product</h3>
                            <p>We"ve got your covered with products from a variety of categories.</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col3">
                        <div class="step step-3">
                            <div class="icon" data-step="3">
                            <img class="img-fluid" src="images/delivery.png" style="width: 80px; height: 80px;" alt=""> 
                            </div>
                            <h3>Pick up or Delivery</h3>
                            <p>Get your product delivered! And enjoy! </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <p class="pay-info">Cash on Delivery</p>
                </div>
            </div>
        </div>
    </section>
    <?php include "include/footer.php" ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
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