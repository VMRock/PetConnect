<?php
    // Include the database connection file
    include("connection/connect.php");

    // Start a session and error reporting
    session_start();
    error_reporting(0);
    if (isset($_GET["success"]) && $_GET["success"] == 1) {
        echo "<script>alert('Profile update successful.');</script>";
    }
    // Check if the user is logged in, if not, redirect to the login page
    if (empty($_SESSION["user_id"])) {
        header('location: login.php');
        exit();
    } else {
        // Fetch the user's profile details from the database
        $user_id = mysqli_real_escape_string($db, $_SESSION['user_id']);
        $sql = "SELECT * FROM users WHERE user_id='$user_id'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
    }

    // Update button click handler
    if (isset($_POST["update"])) {
        // Redirect to update_userprofile.php with the user_id as a parameter
        header("Location: update_userprofile.php?user_id=" . urlencode($row['user_id']));
        exit();
    }
    ?>

<script language="javascript" type="text/javascript">
    function f2() 
    {
        window.close();
    }

    function f3() {
        window.print();
    }
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Bootstrap CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 20px;
        }

        .profile-table {
            width: 650px;
            border-collapse: collapse;
            margin: auto;
            margin-top: 50px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .profile-table th {
            background: #ff9900;
            color: white;
            font-weight: bold;
            padding: 12px;
            text-align: left;
            font-size: 14px;
        }

        .profile-table td {
            padding: 12px;
            border-bottom: 1px solid #ccc;
            text-align: left;
            font-size: 14px;
        }

        .profile-table tr:nth-of-type(odd) {
            background: #f2f2f2;
        }

        .profile-heading {
            font-size: 20px;
            font-weight: bold;
            padding: 20px 0;
            text-align: center;
            color: #ff9900;
        }

        .update-button {
            display: block;
            width: 100%;
            max-width: 200px;
            margin: auto;
            margin-top: 20px;
        }

        /* Custom button style */
        .update-button input[type="submit"] {
            background-color: #ff9900;
            border-color: #ff9900;
        }

        .update-button input[type="submit"]:hover {
            background-color: #e68a00;
            border-color: #e68a00;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="profile-heading">
    <?php echo $row['first_name'] . " " . $row['last_name']; ?>'s profile
    </div>
    <table class="profile-table" cellspacing="0" cellpadding="0">
        <tr>
            <td><b>Reg Date:</b></td>
            <td><?php echo htmlentities($row['date']); ?></td>
        </tr>
        <tr>
            <td><b>First Name:</b></td>
            <td><?php echo htmlentities($row['first_name']); ?></td>
        </tr>
        <tr>
            <td><b>Last Name:</b></td>
            <td><?php echo htmlentities($row['last_name']); ?></td>
        </tr>
        <tr>
            <td><b>User Email:</b></td>
            <td><?php echo htmlentities($row['email']); ?></td>
        </tr>
        <tr>
            <td><b>User Phone:</b></td>
            <td><?php echo htmlentities($row['phone']); ?></td>
        </tr>
        <tr>
            <td><b>Address:</b></td>
            <td><?php echo htmlentities($row['address']); ?></td>
        </tr>
        <tr>
            
            <td class="text-right">
                <div class="update-button">
                    <form method="post">
                        <input type="submit" name="update" class="btn btn-primary" value="Update">
                    </form>
                </div>
            </td>
            <td></td>
        </tr>
    </table>

    
</div>

</body>
</html>
