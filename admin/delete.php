<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

if (isset($_GET['contact_del'])) {
    mysqli_query($db,"DELETE FROM contact WHERE contact_id = '".$_GET['contact_del']."'");
header("location:all_contact.php"); 
  }

  if (isset($_GET['volunteer_del'])) {
    mysqli_query($db,"DELETE FROM volunteer WHERE volunteer_id = '".$_GET['volunteer_del']."'");
header("location:all_volunteer.php"); 
  }

if (isset($_GET['cat_del'])) {
    mysqli_query($db,"DELETE FROM pet_category WHERE category_id = '".$_GET['cat_del']."'");
header("location:add_pcategory.php"); 
  }
  
if (isset($_GET['product_del'])) {
    mysqli_query($db,"DELETE FROM products WHERE product_id = '".$_GET['product_del']."'");
header("location:all_products.php");  
  }

  if (isset($_GET['pet_del'])) {
    mysqli_query($db,"DELETE FROM pets WHERE pet_id = '".$_GET['pet_del']."'");
header("location:all_pets.php");  
  }

if (isset($_GET['product_category_del'])) {
    mysqli_query($db,"DELETE FROM product_category WHERE product_category_id = '".$_GET['product_category_del']."'");
header("location:all_product_category.php"); 
  }

if (isset($_GET['lostandfound_del'])) {
    mysqli_query($db,"DELETE FROM lost_and_found WHERE lostfound_id = '".$_GET['lostandfound_del']."'");
header("location:all_lostandfound.php"); 
  }

if (isset($_GET['user_del'])) {
    mysqli_query($db,"DELETE FROM users WHERE user_id = '".$_GET['user_del']."'");
    header("location:all_users.php");  
  }
  if (isset($_GET['adminUser_del'])) {
    mysqli_query($db,"DELETE FROM admin WHERE user_id = '".$_GET['adminUser_del']."'");
    header("location:all_adminUsers.php");  
  }
  
  if (isset($_GET['order_del'])) {
    mysqli_query($db,"DELETE FROM product_orders WHERE order_id = '".$_GET['order_del']."'");
    header("location:all_orders.php");  
  }
?>
