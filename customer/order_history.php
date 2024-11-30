<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paparazzi - Order History</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Raleway:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Raleway', sans-serif;
            background-color: #fff5f8;
        }

        h1 {
            font-family: 'Pacifico', cursive;
            color: #ff6b81;
            text-align: center;
            margin: 20px 0;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        .order-table {
            margin: 20px auto;
            max-width: 90%;
            background-color: #ffe9ee;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(255, 105, 135, 0.2);
            border: 3px solid #ff6b81;
        }

        .table th {
            background-color: #ffccd5;
            color: #ff6b81;
        }

        .table td {
            background-color: #fffdfd;
            color: #555;
        }

        .btn-info {
            background-color: #ff6b81;
            border-color: #ff6b81;
        }

        .btn-info:hover {
            background-color: #ff4c61;
            border-color: #ff4c61;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .cherry-icon {
            font-size: 1.5rem;
            color: #ff6b81;
            margin-right: 5px;
        }

        .nav-tabs .nav-link.active {
            background-color: #ffccd5;
            color: #ff6b81;
        }

        .nav-tabs .nav-link {
            color: #ff6b81;
        }

        .nav-tabs .nav-link:hover {
            background-color: #ffe9ee;
        }
    </style>
</head>
<body>

    <!-- NAVIGATION BAR -->
    <?php include('navbar.php'); ?>

    <!-- Order History Section -->
    <h1>
        <i class="bi bi-basket2-fill cherry-icon"></i>
        Order History
    </h1>

    <!-- Tabs for Pending, Completed, and Cancelled -->
    <div class="container">
        <ul class="nav nav-tabs" id="orderTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab">Pending</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed" type="button" role="tab">Completed</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="cancelled-tab" data-bs-toggle="tab" data-bs-target="#cancelled" type="button" role="tab">Cancelled</button>
            </li>
        </ul>
        <div class="tab-content mt-3" id="orderTabsContent">
            <!-- Pending Orders -->
            <div class="tab-pane fade show active" id="pending" role="tabpanel">
                <div class="table-responsive order-table">
                    <table class="table table-hover table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Address</th>
                                <th>Ice Cream</th>
                                <th>Quantity</th>
                                <th>Add Ons</th>
                                <th>Sizes</th>
                                <th>Price</th>
                                <th>Order Type</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Jane Doe</td>
                                <td>123 Sweet St, Candyville</td>
                                <td>Chocolate Sundae</td>
                                <td>1</td>
                                <td>Sprinkles, Cherry</td>
                                <td>Large</td>
                                <td>$5.99</td>
                                <td>For Delivery</td>
                                <td style="font-weight: bold; color: red;">Pending</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Completed Orders -->
            <div class="tab-pane fade" id="completed" role="tabpanel">
                <div class="table-responsive order-table">
                    <table class="table table-hover table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Address</th>
                                <th>Ice Cream</th>
                                <th>Quantity</th>
                                <th>Add Ons</th>
                                <th>Sizes</th>
                                <th>Price</th>
                                <th>Order Type</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John Doe</td>
                                <td>456 Frosty Rd, Snowtown</td>
                                <td>Vanilla Delight</td>
                                <td>2</td>
                                <td>Caramel Drizzle</td>
                                <td>Medium</td>
                                <td>$10.99</td>
                                <td>For Pickup</td>
                                <td style="font-weight: bold; color: green;">Completed</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Cancelled Orders -->
            <div class="tab-pane fade" id="cancelled" role="tabpanel">
                <div class="table-responsive order-table">
                    <table class="table table-hover table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Address</th>
                                <th>Ice Cream</th>
                                <th>Quantity</th>
                                <th>Add Ons</th>
                                <th>Sizes</th>
                                <th>Price</th>
                                <th>Order Type</th>
                                <th>Status</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Jane Doe</td>
                                <td>123 Sweet St, Candyville</td>
                                <td>Mint Chocolate</td>
                                <td>1</td>
                                <td>Chocolate Chips</td>
                                <td>Small</td>
                                <td>$3.99</td>
                                <td>For Delivery</td>
                                <td style="font-weight: bold; color: gray;">Cancelled</td>
                                <td>Customer changed their mind.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
