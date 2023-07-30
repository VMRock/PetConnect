<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

if(isset($_POST['submit'] )) 
{
     if(empty($_POST['username']) ||  
		empty($_POST['password'])||
		empty($_POST['cpassword']) ||
		empty($_POST['email']) )
		{
			$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>field Required!</strong>
															</div>';
		}
	else
	{
	
	$check_username= mysqli_query($db, "SELECT username FROM admin where username = '".$_POST['username']."' ");
	$check_email = mysqli_query($db, "SELECT email FROM admin where email = '".$_POST['email']."' ");
		

	
	if($_POST['password'] != $_POST['cpassword']){  
       	
          echo "<script>alert('Password not match');</script>"; 
    }
	elseif(strlen($_POST['password']) < 6)  
	{
      echo "<script>alert('Password Must be >=6');</script>"; 
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
       
	 
	$mql = "INSERT INTO admin(username,password,email) VALUES('".$_POST['username']."','".md5($_POST['password'])."','".$_POST['email']."')";
	mysqli_query($db, $mql);
    echo "<script>alert('Admin user added');</script>"; 
    header("refresh:0.1;url=all_adminUsers.php");
	
		 
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
        <title>All Admin Users</title>
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
                    <?php  
								echo $error;
								echo $success; ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="col-lg-12">
                                    <div class="card card-outline-primary">
                                        <div class="card-header">
                                            <h4 class="m-b-0 text-white">Add Admin Users</h4>
                                        </div>
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <label for="exampleInputEmail1">UserName</label>
                                                <input class="form-control" type="text" name="username" id="example-text-input" required>
                                            </div>                                     
                                            <div class="form-group col-sm-6">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="exampleInputPassword1">Confirm password</label>
                                                <input type="password" class="form-control" name="cpassword" id="exampleInputPassword2" required>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="exampleInputEmail1">Email Address</label>
                                                <input type="text" class="form-control" placeholder="sample@sample.com"  name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <input type="submit" value="Signup" name="submit" class="btn btn-primary" required>
                                            <a href="all_adminUsers.php" class="btn btn-inverse">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="col-lg-12">
                                    <div class="card card-outline-primary">
                                        <div class="card-header">
                                            <h4 class="m-b-0 text-white">All Admin Users</h4>
                                        </div>
                                        <div class="table-responsive m-t-40">
                                            <table id="myTable" class="table table-bordered table-striped table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Username</th>                                                      
                                                        <th>Email</th>
                                                        <th>Reg-Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>                                                   
                                                    <?php
												        $sql="SELECT * FROM admin order by user_id desc";
												        $query=mysqli_query($db,$sql);											
													    if(!mysqli_num_rows($query) > 0 )
														{
															echo '<td colspan="7"><center>No Users</center></td>';
														}
													    else
														{				
															while($rows=mysqli_fetch_array($query))
															{
																echo ' <tr><td>'.$rows['username'].'</td>
																<td>'.$rows['email'].'</td>																																							
																<td>'.$rows['date'].'</td>
																<td><a href="delete.php?adminUser_del='.$rows['user_id'].'" onclick="return confirmDelete();" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
																	<a href="update_adminUsers.php?adminUser_upd='.$rows['user_id'].'" "  class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="fa fa-edit"></i></a>
																</td></tr>';
															}	
														}
											        ?>
                                                    <script>
                                                        function confirmDelete() {
                                                            if (confirm("Are you sure you want to delete?")) {
                                                                return true; 
                                                            } else {
                                                                return false; 
                                                            }
                                                        }
                                                    </script>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <?php include "include/footer.php" ?>
        </div>

                    <script src="js/lib/jquery/jquery.min.js"></script>>
                    <script src="js/lib/bootstrap/js/popper.min.js"></script>
                    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
                    <script src="js/jquery.slimscroll.js"></script>
                    <script src="js/sidebarmenu.js"></script>
                    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
                    <script src="js/custom.min.js"></script>

    </body>
</html>