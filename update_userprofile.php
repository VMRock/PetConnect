<?php
session_start();
include("connection/connect.php");

// Check if the user is logged in
if (empty($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

// Update user profile
if (isset($_POST["update_profile"])) {
    $username = $_POST["username"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
		
	if(strlen($_POST['phone']) < 10 || strlen($_POST['phone']) > 10 )    
	{
      echo "<script>alert('Invalid phone number!');</script>"; 
	}

    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
    {
          echo "<script>alert('Invalid email address please type a valid email!');</script>"; 
    }
	else{
    // Update the user profile in the database
    $user_id = $_SESSION["user_id"];
    $query = "UPDATE users SET username='$username', first_name='$first_name', last_name='$last_name', email='$email', phone='$phone', address='$address' WHERE user_id='$user_id'";
    $result = mysqli_query($db, $query);

    if ($result) {
        // Profile update successful
        
        header("Location: userprofile.php?success=1");
        echo "<script>alert('Profile update successful.');</script>";
        exit();
    } else {
        
    }
}
}


// Retrieve the user's current profile details
$user_id = $_SESSION["user_id"];
$query = "SELECT * FROM users WHERE user_id='$user_id'";
$result = mysqli_query($db, $query);
$userData = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>User Profile</h1>
        <form method="post" action="update_userprofile.php">
            <div class="form-group">
                <label for="first_name">Username:</label>
                <input type="text" class="form-control" name="username" value="<?php echo $userData["username"]; ?>">
            </div>
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" name="first_name" value="<?php echo $userData["first_name"]; ?>">
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" name="last_name" value="<?php echo $userData["last_name"]; ?>">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="<?php echo $userData["email"]; ?>">
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" name="phone" value="<?php echo $userData["phone"]; ?>">
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" name="address"><?php echo $userData["address"]; ?></textarea>
            </div>

            <input type="submit" class="btn btn-primary" name="update_profile" value="Update Profile">
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
