<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paparazzi - Cart</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Raleway:wght@400;500&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Raleway', sans-serif;
            background: #fbe9e7;
        }
        h1 {
            font-family: 'Pacifico', cursive;
            color: #ff6b81;
            margin-bottom: 30px;
        }
        .table {
            background-color: #fce4ec; 
            border: 1px solid #ff6b81;
        }
        .table th, .table td {
            color: black; 
        }
        .table thead {
            background-color: #ff6b81; 
            color: white;
        }
        .btn-success {
            background-color: #ff6b81; 
            border-color: #ff6b81;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
        }
        .d-flex h3 {
            font-size: 1.5rem;
            color: #f44336; 
        }
        .alert-warning {
            background-color: #ffebee; 
            color: #d32f2f;
        }
        .cart-item-name {
            font-weight: bold;
        }
        .bold-dash {
        display: inline-block;
        width: 16px; 
        height: 5px; 
        background-color: white;
        border-radius: 2px;
    }
    </style>
</head>
<body>

    <!-- NAVIGATION BAR -->
    <?php include('navbar.php'); ?>

    <div class="container my-4">
        <h1 class="text-center">Your Cart</h1>

        <!-- If Cart is Empty -->
        <div id="cart-empty" class="alert alert-warning text-center" style="display: none;">
            Your cart is empty. Please add items to your cart.
        </div>

        <!-- Cart Table -->
        <table class="table table-bordered">
            <thead>
    <tr>
        <th style="color: white; text-align: center">Item Name</th>
        <th style="color: white; text-align: center">Quantity</th>
        <th style="color: white; text-align: center">Price per Item (₱)</th>
        <th style="color: white; text-align: center">Total (₱)</th>
        <th style="color: white; text-align: center;">Remove</th>
    </tr>
        </thead>
        <tbody>
            <tr>
                <td class="cart-item-name">Vanilla Ice Cream</td>
                <td>2</td>
                <td>₱180.00</td>
                <td>₱390.00</td>
                <td class="text-center">
                     <button class="btn btn-danger btn-sm rounded-circle remove-btn">
                         <span class="bold-dash"></span>
                     </button>
                 </td>
            </tr>
            <!-- <tr>
                <td class="cart-item-name">Chocolate Sundae</td>
                <td>1</td>
                <td>₱250.00</td>
                <td>₱50.00</td>
                <td>₱300.00</td>
                <td class="text-center">
                     <button class="btn btn-danger btn-sm rounded-circle remove-btn">
                         <span class="bold-dash"></span>
                     </button>
                 </td>
            </tr>
            <tr>
                <td class="cart-item-name">Strawberry Cone</td>
                <td>3</td>
                <td>₱150.00</td>
                <td>₱20.00</td>
                <td>₱510.00</td>
                <td class="text-center">
                     <button class="btn btn-danger btn-sm rounded-circle remove-btn">
                         <span class="bold-dash"></span>
                     </button>
                 </td>
            </tr> -->
        </tbody>
        </table>

        <div class="d-flex justify-content-between">
            <h3>Total Amount: ₱1200.00</h3>
            <div>
                <label for="payment-method" style="font-weight: bold;">Select Payment Method:</label>
                <br>
                <select id="payment-method" class="form-select" style="width: 200px;">
                    <option value="cod">Cash on Delivery (COD)</option>
                </select>
                <br>
                <label for="order-type" style="font-weight: bold; margin-top: 10px;">Order Type:</label>
                <br>
                <select id="order-type" class="form-select" style="width: 200px;">
                    <option value="delivery">For Delivery</option>
                    <option value="pickup">For Pick Up</option>
                </select>
                <br>
                <!-- Pickup Time Input -->
                <div id="pickup-time-container" style="display: none; margin-top: 10px;">
                    <label for="pickup-time" style="font-weight: bold;">Pickup Time:</label>
                    <input type="time" id="pickup-time" class="form-control" style="width: 200px;">
                </div>
                <br>    
                <div class="d-flex justify-content-end">
                    <button class="btn btn-success mt-2"><i class="bi bi-cart-check"></i> Order Now</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Show or hide the pickup time input field based on the selected order type
        const orderTypeSelect = document.getElementById('order-type');
        const pickupTimeContainer = document.getElementById('pickup-time-container');

        orderTypeSelect.addEventListener('change', function () {
            if (this.value === 'pickup') {
                pickupTimeContainer.style.display = 'block';
            } else {
                pickupTimeContainer.style.display = 'none';
            }
        });
    </script>
</body>
</html>