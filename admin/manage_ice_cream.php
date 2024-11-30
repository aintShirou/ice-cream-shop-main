<?php
require_once('../classes/database.php');

$con = new database();

if (isset($_POST['add'])) {

    $errors = [];
    $successMessage = null; 
    $product_name = $_POST['productName'];
    $description = $_POST['description'];
    $order_type = $_POST['order_type'];
    $ice_cream = $_POST['ice_cream'];

    $pricing_details = [];


    if ($ice_cream === 'wafer_cone') {
        $wafer_no_dip = $_POST['wafer_no_dip'] ?? null;
        $wafer_with_dip = $_POST['wafer_with_dip'] ?? null;
        $sugar_no_dip = $_POST['sugar_no_dip'] ?? null;
        $sugar_with_dip = $_POST['sugar_with_dip'] ?? null;

        if ($wafer_no_dip) {
            $pricing_details[] = ['type' => 'wafer_cone', 'name' => 'No Dip', 'price' => $wafer_no_dip];
        }
        if ($wafer_with_dip) {
            $pricing_details[] = ['type' => 'wafer_cone', 'name' => 'With Dip', 'price' => $wafer_with_dip];
        }
        if ($sugar_no_dip) {
            $pricing_details[] = ['type' => 'sugar_cone', 'name' => 'No Dip', 'price' => $sugar_no_dip];
        }
        if ($sugar_with_dip) {
            $pricing_details[] = ['type' => 'sugar_cone', 'name' => 'With Dip', 'price' => $sugar_with_dip];
        }
    } elseif ($ice_cream === 'floats') {
        $types = ['soda', 'chocolate', 'milky', 'coffee', 'fruit'];
        foreach ($types as $type) {
            $small = $_POST[$type . '_float_500ml'] ?? null;
            $large = $_POST[$type . '_float_750ml'] ?? null;
            if ($small) {
                $pricing_details[] = ['type' => 'floats', 'name' => ucfirst($type) . ' Float (500ml)', 'price' => $small];
            }
            if ($large) {
                $pricing_details[] = ['type' => 'floats', 'name' => ucfirst($type) . ' Float (750ml)', 'price' => $large];
            }
        }
    } elseif ($ice_cream === 'cups') {
        $toppings = ['no_topping', 'one_topping', 'two_toppings', 'three_toppings'];
        $sizes = ['240ml', '360ml', '550ml'];
        foreach ($toppings as $topping) {
            foreach ($sizes as $size) {
                $price = $_POST[$topping . '_' . $size] ?? null;
                if ($price) {
                    $pricing_details[] = ['type' => 'cups', 'name' => ucfirst(str_replace('_', ' ', $topping)) . " ($size)", 'price' => $price];
                }
            }
        }
    } elseif ($ice_cream === 'sugar_bowl') {
        $no_toppings_price = $_POST['sugar_bowl_no_topping'] ?? null;
        if ($no_toppings_price) {
            $pricing_details[] = ['type' => 'sugar_bowl', 'name' => 'No Topping', 'price' => $no_toppings_price];
        }

        for ($i = 1; $i <= 3; $i++) {
            $price = $_POST['sugar_bowl_' . $i . '_topping'] ?? null;
            if ($price) {
                $pricing_details[] = ['type' => 'sugar_bowl', 'name' => "$i Topping(s)", 'price' => $price];
            }
        }
    }

    if (isset($_FILES['productImage'])) {
        $product_img = $_FILES['productImage'];

        if (!empty($product_img['name']) && $product_img['error'] === UPLOAD_ERR_OK) {
            $target_dir = "../uploads/";
            $original_file_name = basename($product_img["name"]);
            $new_file_name = uniqid() . '_' . $original_file_name;
            $target_file = $target_dir . $new_file_name;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $uploadOk = 1;
            $errors = [];

            $check = getimagesize($product_img["tmp_name"]);
            if ($check === false) {
                $errors[] = "File is not an image.";
                $uploadOk = 0;
            }

            if ($product_img["size"] > 500000) {
                $errors[] = "File is too large.";
                $uploadOk = 0;
            }

            if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                $errors[] = "Only JPG, JPEG, PNG, and GIF files are allowed.";
                $uploadOk = 0;
            }

            if ($uploadOk == 1 && move_uploaded_file($product_img["tmp_name"], $target_file)) {
                $product_image_path = $target_file;

                if (!empty($product_name)) {
                    $product_id = $con->insertProducts($product_name, $description, $order_type, $ice_cream, $product_image_path, $pricing_details);

                    if ($product_id) {
                        $successMessage = "Product added successfully!";
                    } else {
                        $errors[] = "Failed to add product to the database.";
                    }
                } else {
                    $errors[] = "Product name is missing.";
                }
            } else {
                $errors[] = "Failed to upload the image.";
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ice Cream - Paparazzi</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f9e1d1; 
            font-family: 'Roboto', sans-serif;
        }

        .card {
            border-radius: 15px; 
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); 
            border: none; 
            margin-bottom: 20px; 
        }

        .card-title {
            font-family: 'Open Sans', sans-serif;
            font-size: 1.5rem;
            color: #ff6f61;
            font-weight: 600;
        }

        .btn-primary {
            background-color: #ff6f61; 
            border-color: #ff6f61;
            padding: 12px 20px; 
            border-radius: 5px; 
            font-weight: 600;
            transition: all 0.3s ease-in-out; 
        }

        .btn-primary:hover {
            background-color: #ff4b3a;
            border-color: #ff4b3a;
            transform: scale(1.05); 
        }

        .list-group-item {
            background-color: #ffffff;
            border: 1px solid #ff6f61;
            margin-bottom: 15px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .list-group-item strong {
            font-family: 'Roboto', sans-serif;
            font-size: 1.2rem;
        }

        /* Style for the input fields */
        .form-control {
            border-radius: 10px;
            padding: 15px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
        }

        .form-control:focus {
            border-color: black;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        }


        .container-fluid {
            padding: 30px;
        }

        /* Responsive adjustments for smaller devices */
        @media (max-width: 768px) {
            .card {
                margin-bottom: 15px;
            }

            .btn-primary {
                width: 100%;
            }

            .col-md-6 {
                margin-bottom: 20px;
            }
        }


        .hidden { 
            display: none; 
        }

        .form-group { 
            margin-bottom: 1rem; 
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('sidebar.php'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

         <!--NAVBAR-->
         <?php include ('navbar.php'); ?>

            <!-- Main Content -->
            <div id="content">
                
                <!-- Begin Page Content -->
                <div class="container-fluid mt-3">

                    <!-- Row for Form and Ice Cream Display -->
                    <div class="row">
                        
                        <!-- Left Side: Add Product Form -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body" style="border-radius: 10px; box-shadow: 1px 1px 5px rgba(0,0,0,0.5);">
                                <form method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="productName">Product Name</label>
                                            <input type="text" class="form-control" id="productName" placeholder="Enter product name" name="productName" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="description" rows="3" placeholder="Enter description" name="description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Order Type</label>
                                            <select name="order_type" required>
                                                <option>For Delivery Only</option>
                                                <option>For Pickup Only</option>
                                                <option>For Delivery & Pickup</option>
                                            </select>
                                            
                                            <label>Ice Cream Type</label>
                                            <select name="ice_cream" id="iceCreamType" onchange="handleIceCreamChange()">
                                                <option value="">Select an option</option>
                                                <option value="wafer_cone">Cones</option>
                                                <option value="floats">Floats</option>
                                                <option value="cups">Ice Cream in Cup</option>
                                                <option value="sugar_bowl">Sugar Bowl</option>
                                            </select>
                                        </div>
                                            <!-- Wafer Cone Form -->
                                            <div id="waferOptions" class="hidden">
                                                <h3>Cone Pricing</h3>
                                                <div class="form-group">
                                                    <label>Wafer Cone - No Dip</label>
                                                    <input type="number" name="wafer_no_dip" id="waferNoDipPrice" placeholder="Enter price for Wafer Cone (No Dip)">
                                                </div>
                                                <div class="form-group">
                                                    <label>Wafer Cone - With Dip</label>
                                                    <input type="number" name="wafer_with_dip" id="waferWithDipPrice" placeholder="Enter price for Wafer Cone (With Dip)">
                                                </div>

                                                <h3>Sugar Cone Pricing</h3>
                                                <div class="form-group">
                                                    <label>Sugar Cone - No Dip</label>
                                                    <input type="number" name="sugar_no_dip" id="sugarNoDipPrice" placeholder="Enter price for Sugar Cone (No Dip)">
                                                </div>
                                                <div class="form-group">
                                                    <label>Sugar Cone - With Dip</label>
                                                    <input type="number" name="sugar_with_dip" id="sugarWithDipPrice" placeholder="Enter price for Sugar Cone (With Dip)">
                                                </div>
                                            </div>

                                            <div id="floatsOptions" class="hidden">
                                                <h3>Floats Pricing</h3>
                                                <div class="form-group">
                                                    <label>Soda Float</label>
                                                    <input type="number" name="soda_float_500ml" placeholder="Soda Float (500ml)">
                                                    <input type="number" name="soda_float_750ml" placeholder="Soda Float (750ml)">
                                                </div>
                                                <div class="form-group">
                                                    <label>Chocolate Float</label>
                                                    <input type="number" name="chocolate_float_500ml" placeholder="Chocolate Float (500ml)">
                                                    <input type="number" name="chocolate_float_750ml" placeholder="Chocolate Float (750ml)">
                                                </div>
                                                <div class="form-group">
                                                    <label>Milky Float</label>
                                                    <input type="number" name="milky_float_500ml" placeholder="Milky Float (500ml)">
                                                    <input type="number" name="milky_float_750ml" placeholder="Milky Float (750ml)">
                                                </div>
                                                <div class="form-group">
                                                    <label>Coffee Float</label>
                                                    <input type="number" name="coffee_float_500ml" placeholder="Coffee Float (500ml)">
                                                    <input type="number" name="coffee_float_750ml" placeholder="Coffee Float (750ml)">
                                                </div>
                                                <div class="form-group">
                                                    <label>Fruit Float</label>
                                                    <input type="number" name="fruit_float_500ml" placeholder="Fruit Float (500ml)">
                                                    <input type="number" name="fruit_float_750ml" placeholder="Fruit Float (750ml)">
                                                </div>
                                            </div>

                                            <!-- Ice Cream in Cup Form -->
                                            <div id="cupOptions" class="hidden">
                                                <h3>Ice Cream Cup Pricing</h3>
                                                <div class="form-group">
                                                    <label>No Toppings</label>
                                                    <input type="number" name="no_topping_240ml" placeholder="No Topping (240ml)">
                                                    <input type="number" name="no_topping_360ml" placeholder="No Topping (360ml)">
                                                    <input type="number" name="no_topping_550ml" placeholder="No Topping (550ml)">
                                                </div>
                                                <div class="form-group">
                                                    <label>1 Topping</label>
                                                    <input type="number" name="one_topping_240ml" placeholder="1 Topping (240ml)">
                                                    <input type="number" name="one_topping_360ml" placeholder="1 Topping (360ml)">
                                                    <input type="number" name="one_topping_550ml" placeholder="1 Topping (550ml)">
                                                </div>
                                                <div class="form-group">
                                                    <label>2 Toppings</label>
                                                    <input type="number" name="two_toppings_240ml" placeholder="2 Toppings (240ml)">
                                                    <input type="number" name="two_toppings_360ml" placeholder="2 Toppings (360ml)">
                                                    <input type="number" name="two_toppings_550ml" placeholder="2 Toppings (550ml)">
                                                </div>
                                                <div class="form-group">
                                                    <label>3 Toppings</label>
                                                    <input type="number" name="three_toppings_240ml" placeholder="3 Toppings (240ml)">
                                                    <input type="number" name="three_toppings_360ml" placeholder="3 Toppings (360ml)">
                                                    <input type="number" name="three_toppings_550ml" placeholder="3 Toppings (550ml)">
                                                </div>
                                            </div>

                                            <!-- Chilled Taho Form -->
                                            <div id="tahoOptions" class="hidden">
                                                <h3>Chilled Taho Pricing</h3>
                                                <div class="form-group">
                                                    <label>1 Topping</label>
                                                    <input type="number" name="taho_1_topping_360ml" placeholder="1 Topping (360ml)">
                                                    <input type="number" name="taho_1_topping_500ml" placeholder="1 Topping (500ml)">
                                                </div>
                                                <div class="form-group">
                                                    <label>2 Toppings</label>
                                                    <input type="number" name="taho_2_toppings_360ml" placeholder="2 Toppings (360ml)">
                                                    <input type="number" name="taho_2_toppings_500ml" placeholder="2 Toppings (500ml)">
                                                </div>
                                                <div class="form-group">
                                                    <label>3 Toppings</label>
                                                    <input type="number" name="taho_3_toppings_360ml" placeholder="3 Toppings (360ml)">
                                                    <input type="number" name="taho_3_toppings_500ml" placeholder="3 Toppings (500ml)">
                                                </div>
                                            </div>

                                            <!-- Sugar Bowl Form -->
                                            <div id="sugarBowlOptions" class="hidden">
                                                <h3>Sugar Bowl Pricing</h3>
                                                <div class="form-group">
                                                    <label>No Toppings</label>
                                                    <input type="number" name="sugar_bowl_no_topping" placeholder="No Toppings" >
                                                </div>
                                                <div class="form-group">
                                                    <label>1 Topping</label>
                                                    <input type="number" name="sugar_bowl_1_topping" placeholder="1 Topping">
                                                </div>
                                                <div class="form-group">
                                                    <label>2 Toppings</label>
                                                    <input type="number" name="sugar_bowl_2_topping" placeholder="2 Toppings">
                                                </div>
                                                <div class="form-group">
                                                    <label>3 Toppings</label>
                                                    <input type="number" name="sugar_bowl_3_topping" placeholder="3 Toppings">
                                                </div>
                                            </div>

                                        <!-- Image Upload Section -->
                                        <div class="form-group" style="margin-bottom: 28px;">
                                            <label for="productImage">Product Image</label>
                                            <input type="file" class="form-control" id="productImage" accept="image/*" name="productImage" style="padding-bottom: 40px;"> 
                                        </div>
                                        <button type="submit" class="btn btn-block mt-2" style="background: #FF204E; color: white;" name="add">Add Product</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Right Side: Display All Ice Cream Products -->
                           <div class="col-md-6">
                               <div class="card">
                                   <div class="card-body" style="border-radius: 10px; box-shadow: 1px 1px 5px rgba(0,0,0,0.5);">
                                       <ul class="list-group" id="product-list">
                                           <!-- Example of a product item with Image, Edit and Delete buttons -->
                                            <?php
                                                $ice_cream = $con->viewProducts();
                                                foreach($ice_cream as $row):
                                            ?>
                                           <li class="list-group-item" style="background: #FFF2D7; color: black; border: none; box-shadow: 1px 1px 5px rgba(0,0,0,0.5);">
                                               <img src="<?php echo $row['img'] ?>" alt="Vanilla Delight" style="width: 100px; height: 100px;background-colorborder-radius: 5px; float: left; margin-right: 15px;">
                                               <strong><?php echo $row['name'] ?></strong><br>
                                               <small class="badge badge-primary"><?php echo $row['order_type'] ?></small><br>
                                               <p><?php echo $row['description'] ?></p>
                                               <a href="edit_ice_cream.php" class="btn btn-sm" style="background: green; color: white;" onclick="editProduct(1)">Edit</a>
                                               <form method="POST">
                                               <input type="hidden" name="product_id" value="<?php echo $row['product_id'] ?>">
                                               <button type="button" class="btn btn-sm" style="background: red; color: white;"onclick="confirmDelete(<?php echo $row['product_id']; ?>)">Delete</button>
                                               </form>
                                           </li>
                                            <?php
                                                endforeach;
                                            ?>
                                           
                                           <!-- <li class="list-group-item" style="background: #543310; color: white; border: none; box-shadow: 1px 1px 5px rgba(0,0,0,0.5);">
                                               <img src="https://via.placeholder.com/100" alt="Chocolate Fudge" style="width: 100px; height: 100px;border-radius: 5px; float: left; margin-right: 15px;">
                                               <strong>Chocolate Fudge</strong><br>
                                               <small class="badge badge-primary">For Pickup Only</small><br>
                                               <p>Description: A rich chocolate ice cream with gooey fudge swirls.</p>
                                               <a href="edit_ice_cream.php" class="btn btn-sm" style="background: green; color: white;" onclick="editProduct(2)">Edit</a>
                                               <button class="btn btn-sm" style="background: red; color: white;" onclick="deleteProduct(2)">Delete</button>
                                           </li>
                                           <li class="list-group-item" style="background: #FF204E; color: white; border: none; box-shadow: 1px 1px 5px rgba(0,0,0,0.5);">
                                               <img src="https://via.placeholder.com/100" alt="Strawberry Swirl" style="width: 100px; height: 100px;border-radius: 5px; float: left; margin-right: 15px;">
                                               <strong>Strawberry Swirl</strong><br>
                                               <small class="badge badge-primary">For Pickup Only</small><br>
                                               <p>Description: A sweet strawberry ice cream with a touch of vanilla.</p>
                                               <a href="edit_ice_cream.php" class="btn btn-sm" style="background: green; color: white;" onclick="editProduct(3)">Edit</a>
                                               <button class="btn btn-sm" style="background: red; color: white;" onclick="deleteProduct(3)">Delete</button>
                                           </li>
                                           <li class="list-group-item" style="background: #F09319; color: white; border: none; box-shadow: 1px 1px 5px rgba(0,0,0,0.5);">
                                               <img src="https://via.placeholder.com/100" alt="Mango Tango" style="width: 100px; height: 100px;border-radius: 5px; float: left; margin-right: 15px;">
                                               <strong>Mango Tango</strong><br>
                                               <small class="badge badge-primary">For Pickup Only</small><br>
                                               <p>Description: A tropical mango flavored ice cream.</p>
                                               <a href="edit_ice_cream.php" class="btn btn-sm" style="background: green; color: white;" onclick="editProduct(4)">Edit</a>
                                               <button class="btn btn-sm" style="background: red; color: white;" onclick="deleteProduct(4)">Delete</button>
                                           </li>
                                           <li class="list-group-item" style="background: #3D5300; color: white; border: none; box-shadow: 1px 1px 5px rgba(0,0,0,0.5);">
                                               <img src="https://via.placeholder.com/100" alt="Pistachio Dream" style="width: 100px; height: 100px;border-radius: 5px; float: left; margin-right: 15px;">
                                               <strong>Pistachio Dream</strong><br>
                                               <small class="badge badge-primary">For Pickup Only</small><br>
                                               <p>Description: A creamy pistachio ice cream with roasted nuts.</p>
                                               <a href="edit_ice_cream.php" class="btn btn-sm" style="background: green; color: white;" onclick="editProduct(5)">Edit</a>
                                               <button class="btn btn-sm" style="background: red; color: white;" onclick="deleteProduct(5)">Delete</button>
                                           </li>
                                           <li class="list-group-item" style="background: #6A9C89; color: white; border: none; box-shadow: 1px 1px 5px rgba(0,0,0,0.5);">
                                               <img src="https://via.placeholder.com/100" alt="Mint Chocolate Chip" style="width: 100px; height: 100px;border-radius: 5px; float: left; margin-right: 15px;">
                                               <strong>Mint Chocolate Chip</strong><br>
                                               <small class="badge badge-primary">For Delivery & Pickup</small><br>
                                               <p>Description: A cool mint ice cream with chocolate chips.</p>
                                               <a href="edit_ice_cream.php" class="btn btn-sm" style="background: green; color: white;" onclick="editProduct(6)">Edit</a>
                                               <button class="btn btn-sm" style="background: red; color: white;" onclick="deleteProduct(6)">Delete</button>
                                           </li> -->
                                       </ul>
                           
                                       <!-- Pagination -->
                                       <nav>
                                           <ul class="pagination justify-content-center">
                                               <li class="page-item" id="prev-page">
                                                   <a class="page-link" href="#" aria-label="Previous">
                                                       <span aria-hidden="true">&laquo;</span>
                                                   </a>
                                               </li>
                                               <li class="page-item active" id="page-1">
                                                   <a class="page-link" href="#">1</a>
                                               </li>
                                               <li class="page-item" id="page-2">
                                                   <a class="page-link" href="#">2</a>
                                               </li>
                                               <li class="page-item" id="page-3">
                                                   <a class="page-link" href="#">3</a>
                                               </li>
                                               <li class="page-item" id="next-page">
                                                   <a class="page-link" href="#" aria-label="Next">
                                                       <span aria-hidden="true">&raquo;</span>
                                                   </a>
                                               </li>
                                           </ul>
                                       </nav>
                                   </div>
                               </div>
                           </div>
                    </div>
                </div>
                <!-- End Page Content -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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

    <!-- JavaScript to handle pagination -->
<script>
    // Get all product items and pagination buttons
    const productItems = document.querySelectorAll('#product-list .list-group-item');
    const paginationItems = document.querySelectorAll('.pagination .page-item');
    
    const itemsPerPage = 2;
    let currentPage = 1;
    const totalPages = Math.ceil(productItems.length / itemsPerPage);

    function showPage(page) {
        // Hide all product items
        productItems.forEach(item => item.style.display = 'none');
        
        // Show product items for the current page
        const startIndex = (page - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;
        const itemsToShow = Array.from(productItems).slice(startIndex, endIndex);
        itemsToShow.forEach(item => item.style.display = 'block');

        // Update active page
        paginationItems.forEach(item => item.classList.remove('active'));
        document.getElementById(`page-${page}`).classList.add('active');

        // Disable/enable previous/next buttons
        document.getElementById('prev-page').classList.toggle('disabled', page === 1);
        document.getElementById('next-page').classList.toggle('disabled', page === totalPages);
    }

    // Add event listeners to pagination buttons
    document.getElementById('prev-page').addEventListener('click', function() {
        if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
        }
    });

    document.getElementById('next-page').addEventListener('click', function() {
        if (currentPage < totalPages) {
            currentPage++;
            showPage(currentPage);
        }
    });

    paginationItems.forEach(item => {
        item.addEventListener('click', function() {
            const page = parseInt(this.id.split('-')[1]);
            currentPage = page;
            showPage(page);
        });
    });

    // Initially show page 1
    showPage(1);
</script>

<script>
        function handleIceCreamChange() {
    // Hide all option sections initially
    const sections = document.querySelectorAll('.hidden');
    sections.forEach(section => section.style.display = 'none');

    // Get the selected value from the dropdown
    const selectedValue = document.getElementById('iceCreamType').value;

    // Map the selected value to the corresponding section ID
    const sectionMap = {
        'wafer_cone': 'waferOptions',
        'floats': 'floatsOptions',
        'cups': 'cupOptions',
        'sugar_bowl': 'sugarBowlOptions'
    };

    // Show the section corresponding to the selected value
    const sectionId = sectionMap[selectedValue];
    if (sectionId) {
        const section = document.getElementById(sectionId);
        if (section) {
            section.style.display = 'block';
        }
    }
}
</script>

<script>
        const errors = <?php echo json_encode($errors); ?>;
        const successMessage = <?php echo json_encode($successMessage); ?>;


        document.addEventListener("DOMContentLoaded", () => {
            if (successMessage) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: successMessage
                }).then(() => {
                 window.location.href = 'manage_ice_cream.php'; 
                });
            }

            if (errors.length > 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    html: errors.join('<br>') 
                });
            }
        });
    </script>

<script>
    function confirmDelete(product_id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Send AJAX request to delete the product
                deleteProduct(product_id);
            }
        });
    }

    function deleteProduct(product_id) {
        // Perform AJAX request to delete the product
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "delete_product.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onload = function() {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: 'The product has been deleted.',
                    }).then(() => {
                        // Reload the page after successful deletion
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to delete the product.',
                    });
                }
            }
        };

        xhr.send("product_id=" + product_id);
    }
</script>

</body>

</html>
