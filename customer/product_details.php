<?php


require_once('../classes/database.php');

$con = new database();

// Fetch product data from POST
$product_id = $_POST['product_id'] ?? null;
$product_name = $_POST['name'] ?? 'Unknown Product';
$product_sizes = $_POST['sizes'] ?? 'No Sizes Available';
$product_prices = $_POST['prices'] ?? 'No Prices Available';
$order_type = $_POST['order_type'] ?? 'For Pickup Only';
$product_img = $_POST['img'] ?? './assets/img/default.png';
$description = $_POST['description'];
$product_type = $_POST['product_type'];


if(isset($_POST['add'])){
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $order_type = $_POST['order_type'];
    $quantity = $_POST['inputQuantity'] ?? 1; 


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
    $con->addToCart($product_id, $final_product_name, $quantity, $price, $total);
    
    // Redirect to cart page
    header("Location: cart.php");
    exit;
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paparazzi - Ice Cream Shop</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500&family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
      
      body{
        background: linear-gradient(135deg, #f9e5d9, #c3e7c4, #ffefbb);
      }
      
      .btn {
          border-radius: 50px;
          padding: 8px 15px;
          font-size: 1rem;
          transition: all 0.3s ease-in-out;
      }

      /* No Dip button */
      .product-btn {
          background: darkblue;
          color: white;
      }

      .product-btn:hover {
          background: blue;
          color: white;
      }

      /* Ice Cream Theme Header */
      h1.display-5.fw-bolder {
          font-family: 'Pacifico', cursive;
          color: #FF6F61;
      }

      h2.fw-bolder {
          font-family: 'Cookie', cursive;
          color: #FF6F61;
      }

      /* Product Description */
      p.lead {
          font-family: 'Roboto Slab', serif;
          color: #555;
      }

      /* Card Design */
      .card {
          border: 1px solid #FFB6C1;
          border-radius: 15px;
          box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
          transition: transform 0.3s ease-in-out;
      }

      .card:hover {
          transform: scale(1.05);
      }

      .card-img-top {
          border-radius: 15px 15px 0 0;
          object-fit: cover;
      }

     
      .bg-light {
          background-color: #FFF0F5;
      }

    
      #inputQuantity {
          font-size: 1.2rem;
          padding: 5px 10px;
          border-radius: 5px;
          border: 1px solid #FFB6C1;
          max-width: 60px;
      }
  
      .checkbox-label, .radio-label {
          font-size: 1rem;
          color: black;
          margin-right: 20px;
      }

      .checkbox-input, .radio-input {
          margin-right: 10px;
      }
    </style>
</head>
<body>

    <!-- NAVIGATION BAR -->
    <?php include('navbar.php'); ?>

    <!-- Product section-->
    <section class="py-5">
    <form method="POST">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <!-- Dynamically populate product image -->
            <div class="col-md-6">
                <img class="card-img-top mb-5 mb-md-0" src="<?php echo htmlspecialchars($product_img); ?>" alt="Product Image" />
            </div>
            <div class="col-md-6">
                <!-- Dynamically populate product details -->
                <h1 class="display-5 fw-bolder"><?php echo htmlspecialchars($product_name); ?></h1>
                <small class="badge badge-primary text-dark"><?php echo htmlspecialchars($order_type); ?></small><br>

                <!-- Prices -->
                <strong>Prices</strong>
                <div class="mb-5 mt-1">
                    <p><?php echo htmlspecialchars($product_prices); ?></p>
                </div>

                <p class="lead"><?php echo htmlspecialchars($description); ?></p>

                <!-- Show options based on product type -->
                <?php if ($product_type == 'Cones'): ?>
                    <!-- Ice Cream Cone Options -->
                    <strong>Cone Type</strong>
                    <div class="mb-5 mt-1">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="cone_type" value="Wafer Cone" data-price="2.50" />
                            Wafer Cone
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="cone_type" value="Sugar Cone" />
                            Sugar Cone
                        </label>
                    </div>

                    <strong>Dip</strong>
                    <div class="mb-5 mt-1">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="dip" value="With Dip" />
                            With Dip
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="dip" value="No Dip" />
                            No Dip
                        </label>
                    </div>
                <?php elseif ($product_type == 'Floats'): ?>
                    <!-- Float Size Options -->
                    <strong>Size</strong>
                    <div class="mb-5 mt-1">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="size" value="500ml" />
                            500ml
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="size" value="700ml" />
                            700ml
                        </label>
                    </div>
                <?php elseif ($product_type == 'Ice Cream in Cup'): ?>
                    <!-- Ice Cream Cup Options -->
                    <strong>Size</strong>
                    <div class="mb-5 mt-1">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="size" value="240ml" />
                            240ml
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="size" value="360ml" />
                            360ml
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="size" value="550ml" />
                            550ml
                        </label>
                    </div>

                    <strong>Toppings</strong>
                    <div class="mb-5 mt-1">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="topping" value="None" />
                            No Topping
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="topping" value="Topping 1" />
                            Topping 1
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="topping" value="Topping 2" />
                            Topping 2
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="topping" value="Topping 3" />
                            Topping 3
                        </label>
                    </div>
                <?php elseif ($product_type == 'Sugar Bowl'): ?>
                    <!-- Sugar Bowl Options -->
                    <strong>Toppings</strong>
                    <div class="mb-5 mt-1">
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="topping" value="None" />
                            No Topping
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="topping" value="Topping 1" />
                            Topping 1
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="topping" value="Topping 2" />
                            Topping 2
                        </label>
                        <label class="radio-label">
                            <input type="radio" class="radio-input" name="topping" value="Topping 3" />
                            Topping 3
                        </label>
                    </div>
                <?php endif; ?>

                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product_id); ?>">
                <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product_name); ?>">
                <input type="hidden" name="product_img" value="<?php echo htmlspecialchars($product_img); ?>">
                <input type="hidden" name="order_type" value="<?php echo htmlspecialchars($order_type); ?>"></div>

                <!-- Quantity input -->
                <div class="d-flex" style="flex-direction: column;">
                    <input class="form-control text-center me-3" id="inputQuantity" name="inputQuantity"type="number" value="1" style="max-width: 3rem; border: 1px solid black;" />
                    <br>
                    <button class="btn product-btn flex-shrink-0" type="submit" name="add">
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                    </button>
                </div>
            </div>
        </div>
    </div>
    </form>
</section>




    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
