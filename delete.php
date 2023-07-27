<?php
include("connection/connect.php");
error_reporting(E_ALL);
session_start();

if (isset($_GET['userorder_del'])) {
    $order_id = $_GET['userorder_del'];

    // Retrieve the order details including quantity and product_id from the product_orders table
    $query = "SELECT quantity, product_name FROM product_orders WHERE order_id = '$order_id'";
    $result = mysqli_query($db, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $quantity = $row['quantity'];
        $product_name = $row['product_name'];

        // Update the product table to add the quantity back
        mysqli_query($db, "UPDATE products SET quantity = quantity + $quantity WHERE product_name = '$product_name'");

        // Delete the order from the product_orders table
        mysqli_query($db, "DELETE FROM product_orders WHERE order_id = '$order_id'");
    }
    header("location:your_orders.php");
}
?>
