<?php
require_once('../classes/database.php');

$con = new database();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paparazzi - Ice Cream Shop</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500&family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">

    <style>

    .ice-cream-btn {
    display: inline-block;
    background: linear-gradient(145deg, #ff7b7b, #f76c6c);
    color: white;
    font-weight: bold;
    border: none;
    border-radius: 30px;
    margin-top: 10px;
    padding: 10px 20px;
    font-size: 16px;
    text-decoration: none;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4);
    transition: transform 0.5s, box-shadow 0.2s;
    }
    
    .ice-cream-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        color: white;
    }
    
    .ice-cream-btn:active {
        transform: scale(0.95);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    #best-sellers .container {
        background: linear-gradient(145deg, #fff5f7, #ffe0f0);
        border: 2px solid #ff69b4;
        border-radius: 25px;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        padding: 40px;
        position: relative;
        overflow: hidden;
    }

    #best-sellers .container:before {
        content: 'Best Deals';
        position: absolute;
        top: -20px;
        left: -20px;
        background: #ff69b4;
        color: #fff;
        font-family: 'Cookie', cursive;
        font-size: 3rem;
        transform: rotate(-15deg);
        padding: 10px 30px;
        z-index: 1;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }

    #best-sellers .row {
        z-index: 2;
        position: relative;
    }

    #best-sellers h2 {
        font-family: 'Cookie', cursive;
        color: #ff69b4;
        font-size: 3rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
        z-index: 2;
        position: relative;
    }

    /* Floating Animation for Best Sellers Cards */
#best-sellers .card {
    animation: float 3s ease-in-out infinite; /* Apply animation only to best-sellers cards */
}

@keyframes float {
    0% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-30px); /* Moves the card up */
    }
    100% {
        transform: translateY(0);
    }
}

#menu {
    background: linear-gradient(135deg, #f9e5d9, #c3e7c4, #ffefbb);
    padding: 50px 20px;
    border-radius: 20px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    font-family: 'Raleway', sans-serif;
}

#menu h2 {
    font-size: 3rem;
    color: #ff69b4;
    text-shadow: 2px 2px #fff;
    font-family: 'Roboto Slab', serif; 
    margin-bottom: 20px;
}

#menu h4 {
    color: #ff69b4;
    text-decoration: none;
    font-family: 'Roboto Slab', serif; 
    margin-bottom: 20px;
}

/* Card Styles */
.card {
    background: linear-gradient(145deg, #fbd3e9, #f9c4d2);
    border: none;
    border-radius: 15px;
    transition: transform 0.3s, box-shadow 0.3s;
    font-family: 'Raleway', sans-serif; 
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1); 
}

.card:hover {
    transform: scale(1.05);
    box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.15); 
}

.card-img-top {
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.4);
    height: 300px;
    object-fit: cover;
}

.card-body {
    background-color: #fff;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    padding: 20px;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.4); 
}

.card h5 {
    color: #ff69b4;
    font-family: 'Roboto Slab', serif;
    font-size: 1.5rem;
}

.card p {
    color: #666;
    margin: 0;
}


/* Responsive Adjustments */
@media (max-width: 768px) {
    #menu h2 {
        font-size: 2.5rem;
    }

    .card {
        margin-bottom: 20px;
    }

    .ice-cream-btn {
        font-size: 0.9rem;
    }
}

</style>
</head>
<body>

    <!-- NAVIGATION BAR -->
     <?php include('navbar.php'); ?>

    <!-- Header -->
    <header id="home" class="py-5 text-white text-center" style="background-color: #ffb6c1;">
        <div class="container">
            <h1 class="display-3 fw-bolder" style="font-family: 'Pacifico', cursive; text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);">Welcome to Paparazzi Ice Cream Station</h1>
            <br>
            <p class="lead fw-normal" style="text-shadow: 1px 1px 8px black;">Delicious ice cream made just for you!</p>
        </div>
    </header>

    <!-- Best Sellers Section -->
<section id="best-sellers" class="py-5">
    <div class="container">
        <h2 class="text-center">Best Sellers</h2>
        <div class="row mt-4">
            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="./assets/img/ten-yen.png" class="card-img-top" alt="Ice Cream 1">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bolder" style="color:#ff4c61;">Ten Yen Ice Cream</h5>
                        <small class="badge badge-primary text-dark" style="background: pink;">For Delivery & Pickup</small><br>
                        <p class="card-text fw-bold">₱55.99</p>
                        <a href="product_details.php" class="ice-cream-btn">View</a>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="./assets/img/ice-cream-cone.png" class="card-img-top" alt="Ice Cream 3">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bolder" style="color:#ff4c61;">Ice Cream Cone <br> <span style="color:#ff4c61;">(Flavors of the Month)</span></h5>
                        <small class="badge badge-primary text-dark" style="background: pink;">For Pickup Only</small><br>
                        <p class="card-text fw-bold">₱45.99</p>
                        <a href="product_details.php" class="ice-cream-btn">View</a>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="./assets/img/taiyaki.png" class="card-img-top" alt="Ice Cream 2">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bolder" style="color:#ff4c61;">Taiyaki Fish Ice Cream</h5>
                        <small class="badge badge-primary text-dark" style="background: pink;">For Pickup Only</small><br>
                        <p class="card-text fw-bold">₱60.99</p>
                        <a href="product_details.php" class="ice-cream-btn">View</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Menu Section -->
<section id="menu" class="py-5">
    <div class="container">
        <h2 class="text-center" style="font-family: 'Cookie', cursive; color: #ff69b4;">Our Menu</h2>
        
        <!-- Ice Cream and Cones -->
        <div class="row mt-4" style="margin-bottom: 50px;">
            <div class="col-12">
                <h4 class="text-center fw-bold">Ice Cream and Cones</h4>
                <div class="row d-flex justify-content-center">
                <?php
                        $cones = $con->viewProductsCones();
                        foreach($cones as $cone):
                        $product_type_display = str_replace('_', ' ', $cone['product_type']);
                        $product_type_display = ucwords($product_type_display);
                    ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="<?php echo $cone['img'] ?>" class="card-img-top" alt="Wafer Cone">
                            <div class="card-body text-center">
                                <h5 class="fw-bolder"><?php echo $product_type_display; ?></h5>
                                <small class="badge badge-primary text-dark" style="background: pink;"><?php echo $cone['order_type'] ?></small><br>
                                <p><?php echo $cone['sizes'] ?></p>
                                <p class="fw-bold"><?php echo $cone['prices'] ?></p>
                                <form action="product_details.php" method="POST">
                                    <input type="hidden" name="product_id" value="<?php echo $cone['product_id']; ?>">
                                    <input type="hidden" name="name" value="<?php echo htmlspecialchars($cone['product_type']); ?>">
                                    <input type="hidden" name="sizes" value="<?php echo htmlspecialchars($cone['sizes']); ?>">
                                    <input type="hidden" name="prices" value="<?php echo htmlspecialchars($cone['prices']); ?>">
                                    <input type="hidden" name="description" value="<?php echo htmlspecialchars($cone['description']); ?>">
                                    <input type="hidden" name="order_type" value="<?php echo htmlspecialchars($cone['order_type']); ?>">
                                    <input type="hidden" name="img" value="<?php echo htmlspecialchars($cone['img']); ?>">
                                    <input type="hidden" name="product_type" value="<?php echo htmlspecialchars($cone['icecream_type']); ?>">  <!-- Add this line -->
                                    <button type="submit" class="ice-cream-btn">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                        endforeach;
                    ?>
                    <!-- <div class="col-md-4 mb-4" >
                        <div class="card h-100">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Wafer Cone">
                            <div class="card-body text-center">
                                <h5 class="fw-bolder">Wafer Cone</h5>
                                <small class="badge badge-primary text-dark" style="background: pink;">For Pickup Only</small><br>
                                <p>No Dip / With Dip</p>
                                <p class="fw-bold">₱50.00 - ₱60.00</p>
                                <a href="product_details.php" class="ice-cream-btn">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Sugar Cone">
                            <div class="card-body text-center">
                                <h5 class="fw-bolder">Sugar Cone</h5>
                                <small class="badge badge-primary text-dark" style="background: pink;">For Pickup Only</small><br>
                                <p>No Dip / With Dip</p>
                                <p class="fw-bold">₱55.00 - ₱65.00</p>
                                <a href="product_details.php" class="ice-cream-btn">Add to Cart</a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

        <!-- Floats -->
        <div class="row mt-4" style="margin-bottom: 50px;">
            <div class="col-12">
                <h4 class="text-center fw-bold">Floats</h4>
                <div class="row d-flex justify-content-center">
                    <?php
                        $floats = $con->viewProductsFloats();
                        foreach($floats as $float):
                    ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="<?php echo $float['img'] ?>" class="card-img-top" alt="Float Sizes">
                            <div class="card-body text-center">
                                <small class="badge badge-primary text-dark" style="background: pink;"><?php echo $float['order_type'] ?></small><br>
                                <h5 class="fw-bolder">Flavor</h5>
                                <p><?php echo $float['product_type'] ?></p>
                                <h5 class="fw-bolder">Sizes</h5>
                                <p><?php echo $float['sizes'] ?></p>
                                <p class="fw-bold"><?php echo $float['prices'] ?></p>
                                <!-- Form to send product data -->
                                <form action="product_details.php" method="POST">
                                    <input type="hidden" name="product_id" value="<?php echo $float['product_id']; ?>">
                                    <input type="hidden" name="name" value="<?php echo htmlspecialchars($float['product_type']); ?>">
                                    <input type="hidden" name="sizes" value="<?php echo htmlspecialchars($float['sizes']); ?>">
                                    <input type="hidden" name="prices" value="<?php echo htmlspecialchars($float['prices']); ?>">
                                    <input type="hidden" name="description" value="<?php echo htmlspecialchars($float['description']); ?>">
                                    <input type="hidden" name="order_type" value="<?php echo htmlspecialchars($float['order_type']); ?>">
                                    <input type="hidden" name="img" value="<?php echo htmlspecialchars($float['img']); ?>">
                                    <input type="hidden" name="product_type" value="<?php echo htmlspecialchars($float['icecream_type']); ?>">  <!-- Add this line -->
                                    <button type="submit" class="ice-cream-btn">Add To Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                        endforeach;
                    ?>
                    <!-- <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Float Sizes">
                            <div class="card-body text-center">
                                <small class="badge badge-primary text-dark" style="background: pink;">For Delivery & Pickup</small><br>
                                <h5 class="fw-bolder">Sizes</h5>
                                <p>500ML / 700ML</p>
                                <p class="fw-bold">₱75.00 - ₱100.00</p>
                                <a href="product_details.php" class="ice-cream-btn">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Float Flavors">
                            <div class="card-body text-center">
                                <small class="badge badge-primary text-dark" style="background: pink;">For Delivery & Pickup</small><br>
                                <h5 class="fw-bolder">Flavors</h5>
                                <p>Soda / Chocolate / Milky Float / Coffee / Fruit</p>
                                <p class="fw-bold">₱85.00</p>
                                <a href="product_details.php" class="ice-cream-btn">Add to Cart</a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

        <!-- Ice Cream in Cups -->
        <div class="row mt-4" style="margin-bottom: 50px;">
            <div class="col-12">
                <h4 class="text-center fw-bold">Ice Cream in Cups</h4>
                <div class="row d-flex justify-content-center">
                    <?php
                       
                        $cups = $con->viewProductsCups();
                        foreach($cups as $cup):
                    ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="<?php echo $cup['img'] ?>" class="card-img-top" alt="Cup Sizes">
                            <div class="card-body text-center">
                                <small class="badge badge-primary text-dark" style="background: pink;"><?php echo $cup['order_type'] ?></small><br>
                                <h5 class="fw-bolder">Sizes</h5>
                                <p><?php echo $cup['sizes'] ?></p>
                                <p class="fw-bold"><?php echo $cup['prices'] ?></p>
                                <form action="product_details.php" method="POST">
                                    <input type="hidden" name="product_id" value="<?php echo $cup['product_id']; ?>">
                                    <input type="hidden" name="name" value="<?php echo htmlspecialchars($cup['product_type']); ?>">
                                    <input type="hidden" name="sizes" value="<?php echo htmlspecialchars($cup['sizes']); ?>">
                                    <input type="hidden" name="prices" value="<?php echo htmlspecialchars($cup['prices']); ?>">
                                    <input type="hidden" name="description" value="<?php echo htmlspecialchars($cup['description']); ?>">
                                    <input type="hidden" name="order_type" value="<?php echo htmlspecialchars($cup['order_type']); ?>">
                                    <input type="hidden" name="img" value="<?php echo htmlspecialchars($cup['img']); ?>">
                                    <input type="hidden" name="product_type" value="<?php echo htmlspecialchars($cup['icecream_type']); ?>">  <!-- Add this line -->
                                    <button type="submit" class="ice-cream-btn">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                        endforeach;
                    ?>
                    <!-- <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Cup Sizes">
                            <div class="card-body text-center">
                                <small class="badge badge-primary text-dark" style="background: pink;">For Delivery & Pickup</small><br>
                                <h5 class="fw-bolder">Sizes</h5>
                                <p>240ML / 360ML / 550ML</p>
                                <p class="fw-bold">₱70.00 - ₱120.00</p>
                                <a href="product_details.php" class="ice-cream-btn">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Cup Toppings">
                            <div class="card-body text-center">
                                <small class="badge badge-primary text-dark" style="background: pink;">For Delivery & Pickup</small><br>
                                <h5 class="fw-bolder">Toppings</h5>
                                <p>1 Topping / 2 Toppings / 3 Toppings</p>
                                <p class="fw-bold">₱80.00 - ₱110.00</p>
                                <a href="product_details.php" class="ice-cream-btn">Add to Cart</a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

        <!-- Sugar Bowl -->
        <div class="row mt-4" style="margin-bottom: 50px;">
            <div class="col-12">
                <h4 class="text-center fw-bold">Sugar Bowl</h4>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="No Toppings">
                            <div class="card-body text-center">
                                <small class="badge badge-primary text-dark" style="background: pink;">For Delivery & Pickup</small><br>
                                <h5 class="fw-bolder">No Toppings</h5>
                                <p class="fw-bold">₱60.00</p>
                                <a href="product_details.php" class="ice-cream-btn">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="No Toppings">
                            <div class="card-body text-center">
                                <small class="badge badge-primary text-dark" style="background: pink;">For Delivery & Pickup</small><br>
                                <h5 class="fw-bolder">No Toppings</h5>
                                <p class="fw-bold">₱60.00</p>
                                <a href="product_details.php" class="ice-cream-btn">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Toppings">
                            <div class="card-body text-center">
                                <small class="badge badge-primary text-dark" style="background: pink;">For Delivery & Pickup</small><br>
                                <h5 class="fw-bolder">Toppings</h5>
                                <p>1 Topping / 2 Toppings / 3 Toppings</p>
                                <p class="fw-bold">₱70.00 - ₱100.00</p>
                                <a href="product_details.php" class="ice-cream-btn">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


   <!-- Footer -->
    <?php include('footer.php'); ?>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
