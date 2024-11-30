<?php
require_once('../classes/database.php');

$con = new database();

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    
    // Call the deleteProduct function
    $result = $con->deleteProduct($product_id);

    if ($result) {
        // Return success response
        echo json_encode(['success' => true]);
    } else {
        // Return failure response
        echo json_encode(['success' => false]);
    }
}
?>