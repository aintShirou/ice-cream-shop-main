<?php

require_once('../classes/database.php');

$con = new database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Capture data from POST request
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_img = $_POST['product_img'];
        $order_type = $_POST['order_type'];
        $quantity = $_POST['inputQuantity'] ?? 1; // Default quantity to 1 if not set

        // Determine the final product name based on selected options
        $final_product_name = $product_name;
        if (!empty($_POST['cone_type'])) {
            $final_product_name .= " (" . htmlspecialchars($_POST['cone_type']) . ")";
        }
        if (!empty($_POST['dip'])) {
            $final_product_name .= " with " . htmlspecialchars($_POST['dip']);
        }
        if (!empty($_POST['size'])) {
            $final_product_name .= " (" . htmlspecialchars($_POST['size']) . ")";
        }
        if (!empty($_POST['topping'])) {
            $final_product_name .= " with " . htmlspecialchars($_POST['topping']);
        }

        // Call the method to add to cart
        $con->addToCart($product_id, $final_product_name, $product_img, $order_type, $quantity);
        
        // Redirect to cart page
        header("Location: cart.php");
        exit;
    } catch (PDOException $e) {
        // Handle errors
        echo "Error: " . $e->getMessage();
    }
}
?>
