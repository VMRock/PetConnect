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
    <title>About || Petconnect+ - Group5</title>
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
                    <a href="Pet.php" class="nav-item nav-link">Product</a>
                    <a href="services.php" class="nav-item nav-link active">About</a>
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

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded" src="images/about.jpeg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="border-start border-5 border-primary ps-5 mb-5">
                        <h6 class="text-primary text-uppercase">About Us</h6>
                        <h1 class="display-5 text-uppercase mb-0">We Keep Your Pets Happy All Time</h1>
                    </div>
                    <h4 class="text-body mb-4">Our dedicated team goes the extra mile to ensure your pets are well-cared for and content, bringing smiles to their faces every day.</h4>
                    <div class="bg-light p-4">
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <h1 class="flaticon-house font-weight-normal text-secondary m-0 mr-3"></h1>
                                    <h5 class="text-truncate m-0">Mission</h5>
                                </div>
                                <p class="m-0">Pawsome Haven's mission is to rescue, rehabilitate, and rehome homeless animals, while educating the community about responsible pet ownership. They advocate for animal welfare and engage the community through adoption events and workshops. Additionally, they provide resources for reuniting lost pets with their owners.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <h1 class="flaticon-house font-weight-normal text-secondary m-0 mr-3"></h1>
                                    <h5 class="text-truncate m-0">Vision</h5>
                                </div>
                                <p class="m-0">Pawsome Haven's vision is to create a world where every animal is cherished, protected, and living in a loving and safe environment. They aspire to be a leading force in animal welfare by promoting compassion, responsible pet ownership, and a strong bond between humans and animals.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Start -->
    <div class="container-fluid bg-light pt-5 pb-4">
        <div class="container py-5">
            <div class="d-flex flex-column text-center mb-5">
                <h1 class="display-4 m-0">Human-to-Pet <span class="text-primary">Translation</span></h1>
            </div>
        </div>
    </div>
    <!-- End -->


    <!-- Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="bg-primary py-5 px-4 px-sm-5">
                        
                            <div class="form-group">
                                <h4 class="text-secondary mb-3">Enter your message:</h4>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control border-0 p-4 datetimepicker-input" id="humanText" rows="4" cols="50"></textarea>
                            </div>
                            <div class="form-group">
                                <select class="custom-select border-0 px-4" id="petSelection" style="height: 47px;">
                                    <option selected>Select A Pet</option>
                                    <option value="dog">Dog</option>
                                    <option value="cat">Cat</option>
                                </select>
                            </div>
                            <div>
                                <button class="btn btn-dark btn-block border-0 py-3" onclick="translateToPet()" type="submit">Translate to Pet Language</button>
                            </div>
                    </div>
                    <script>
                        var soundEffects = {
                     'a': {
                         'dog': ['woof', 'bark'],
                         'cat': ['meow', 'purr']
                     },
                     'b': {
                         'dog': ['growl', 'howl'],
                         'cat': ['hiss', 'meow']
                     },
                     'c': {
                         'dog': ['whine', 'yelp'],
                         'cat': ['chirp', 'purr']
                     },
                     'd': {
                         'dog': ['bark', 'snarl'],
                         'cat': ['snarl', 'mew']
                     },
                     'e': {
                         'dog': ['yap', 'bark'],
                         'cat': ['hiss', 'meow']
                     },
                     'f': {
                         'dog': ['bark', 'growl'],
                         'cat': ['purr', 'meow']
                     },
                     'g': {
                         'dog': ['bark', 'whine'],
                         'cat': ['hiss', 'purr']
                     },
                     'h': {
                         'dog': ['bark', 'howl'],
                         'cat': ['meow', 'growl']
                     },
                     'i': {
                         'dog': ['bark', 'yip'],
                         'cat': ['hiss', 'meow']
                     },
                     'j': {
                         'dog': ['bark', 'bawl'],
                         'cat': ['purr', 'meow']
                     },
                     'k': {
                         'dog': ['bark', 'yelp'],
                         'cat': ['hiss', 'purr']
                     },
                     'l': {
                         'dog': ['bark', 'whimper'],
                         'cat': ['meow', 'growl']
                     },
                     'm': {
                         'dog': ['bark', 'howl'],
                         'cat': ['hiss', 'meow']
                     },
                     'n': {
                         'dog': ['bark', 'snarl'],
                         'cat': ['purr', 'meow']
                     },
                     'o': {
                         'dog': ['woof', 'bark'],
                         'cat': ['hiss', 'meow']
                     },
                     'p': {
                         'dog': ['growl', 'bark'],
                         'cat': ['purr', 'meow']
                     },
                     'q': {
                         'dog': ['bark', 'yelp'],
                         'cat': ['hiss', 'meow']
                     },
                     'r': {
                         'dog': ['bark', 'snarl'],
                         'cat': ['purr', 'meow']
                     },
                     's': {
                         'dog': ['bark', 'whine'],
                         'cat': ['hiss', 'meow']
                     },
                     't': {
                         'dog': ['bark', 'howl'],
                         'cat': ['purr', 'meow']
                     },
                     'u': {
                         'dog': ['bark', 'yap'],
                         'cat': ['hiss', 'meow']
                     },
                     'v': {
                         'dog': ['bark', 'growl'],
                         'cat': ['purr', 'meow']
                     },
                     'w': {
                         'dog': ['woof', 'bark'],
                         'cat': ['hiss', 'meow']
                     },
                     'x': {
                         'dog': ['bark', 'yelp'],
                         'cat': ['hiss', 'meow']
                     },
                     'y': {
                         'dog': ['bark', 'howl'],
                         'cat': ['purr', 'meow']
                     },
                     'z': {
                         'dog': ['bark', 'growl'],
                         'cat': ['hiss', 'meow']
                     }
                    };
                        function translateToPet() {
                            var humanText = document.getElementById("humanText").value.toLowerCase();
                            var petSelection = document.getElementById("petSelection").value;
                            var translatedText = '';
                    
                            for (var i = 0; i < humanText.length; i++) {
                                var character = humanText.charAt(i);
                                var soundOptions = soundEffects[character];
                                if (soundOptions) {
                                    var petSoundOptions = soundOptions[petSelection];
                                    if (petSoundOptions) {
                                        var randomIndex = Math.floor(Math.random() * petSoundOptions.length);
                                        var randomSound = petSoundOptions[randomIndex];
                                        translatedText += randomSound + ' ';
                                    }
                                }
                            }
                    
                            speak(translatedText.trim(), petSelection);
                        }
                    
                        function speak(message, petSelection) {
                            var utterance = new SpeechSynthesisUtterance();
                            utterance.volume = 0;
                            utterance.rate = 0.8;
                            utterance.pitch = 0.5;
                            utterance.text = message;
                    
                            utterance.onstart = function () {
                                if (petSelection === 'dog') {
                                    playDogSound();
                                } else if (petSelection === 'cat') {
                                    playCatSound();
                                }
                            };
                    
                            utterance.onend = function () {
                                if (petSelection === 'dog') {
                                    stopDogSound();
                                } else if (petSelection === 'cat') {
                                    stopCatSound();
                                }
                            };
                    
                            speechSynthesis.speak(utterance);
                        }
                    
                        var audioElements = [];
                    
                        function playDogSound() {
                            var dogSounds = ['audio/dog-bark.mp3', 'audio/dog-bark2.mp3', 'audio/dog-bark3.mp3'];
                            playPetSound(dogSounds);
                        }
                    
                        function stopDogSound() {
                            stopPetSound();
                        }
                    
                        function playCatSound() {
                            var catSounds = ['audio/cat-bark4.mp3', 'audio/cat-bark5.mp3', 'audio/cat-bark6.mp3'];
                            playPetSound(catSounds);
                        }
                    
                        function stopCatSound() {
                            stopPetSound();
                        }
                    
                        function playPetSound(sounds) {
                            var randomIndex = Math.floor(Math.random() * sounds.length);
                            var audioElement = new Audio(sounds[randomIndex]);
                            audioElement.loop = true;
                            audioElements.push(audioElement);
                            audioElement.play();
                        }
                    
                        function stopPetSound() {
                            audioElements.forEach(function (element) {
                                element.pause();
                                element.currentTime = 0;
                            });
                            audioElements = [];
                        }
                    </script>
                </div>
                <div class="col-lg-7 py-5 py-lg-0 px-3 px-lg-5">
                    <h4 class="text-secondary mb-3">Pet Services</h4>
                    <div class="row py-2">
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <h1 class="flaticon-food font-weight-normal text-secondary m-0 mr-3"></h1>
                                    <h5 class="text-truncate m-0">Pet Supplies</h5>
                                </div>
                                <p>Everything Your Pet Needs in One Place: Explore our wide selection of high-quality pet products, including food, treats, toys, beds, and accessories. From the essentials to the latest trends, we have everything to keep your pets entertained, healthy, and comfortable.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <h1 class="flaticon-food font-weight-normal text-secondary m-0 mr-3"></h1>
                                    <h5 class="text-truncate m-0">Adoption Services</h5>
                                </div>
                                <p>Find Your Perfect Companion: Discover a wide range of adorable and loving animals waiting to find their forever homes. Our adoption process ensures a seamless and responsible match between you and your new furry friend.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <h1 class="flaticon-food font-weight-normal text-secondary m-0 mr-3"></h1>
                                    <h5 class="text-truncate m-0">Lost and Found</h5>
                                </div>
                                <p class="m-0">Reuniting Families and Pets: If your pet goes missing, we're here to help. Report your lost pet and let our dedicated team utilize our network and resources to aid in reuniting you with your furry companion.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <h1 class="flaticon-food font-weight-normal text-secondary m-0 mr-3"></h1>
                                    <h5 class="text-truncate m-0">Community Events</h5>
                                </div>
                                <p class="m-0">Join Us in Making a Difference: Participate in our adoption events, fundraisers, and educational workshops. Together, we can create a compassionate community that advocates for the welfare and well-being of animals.</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  End -->

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