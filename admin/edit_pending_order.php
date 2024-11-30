<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Pending Order</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include('sidebar.php'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Navbar -->
            <?php include('navbar.php'); ?>

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow" style="background-color: #fce4ec; border-color: #f8bbd0;">
                <div class="card-header text-center" style="background-color: #f8bbd0; color: #880e4f;">
                    <h5 class="m-0 font-weight-bold">Edit Pending Order</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="fullName" class="form-label" style="color: #880e4f;">Full Name</label>
                            <input type="text" class="form-control" id="fullName" placeholder="Enter full name" value="John Doe">
                        </div>

                        <div class="mb-3">
                            <label for="deliveryAddress" class="form-label" style="color: #880e4f;">Delivery Address</label>
                            <input type="text" class="form-control" id="deliveryAddress" placeholder="Enter delivery address" value="123 Main St">
                        </div>

                        <div class="mb-3">
                            <label for="product" class="form-label" style="color: #880e4f;">Product</label>
                            <input type="text" class="form-control" id="product" placeholder="Enter product" value="Vanilla Ice Cream">
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label" style="color: #880e4f;">Price</label>
                            <input type="text" class="form-control" id="price" placeholder="Enter price" value="₱55.00">
                        </div>

                        <div class="mb-3">
                            <label for="orderType" class="form-label" style="color: #880e4f;">Order Type</label>
                            <select class="form-control" id="orderType">
                                <option selected>For Delivery</option>
                                <option>For Pickup</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="pickupTime" class="form-label" style="color: #880e4f;">Pickup Time</label>
                            <input type="text" class="form-control" id="pickupTime" value="N/A" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label" style="color: #880e4f;">Status</label>
                            <select class="form-control" id="status">
                                <option selected>Pending</option>
                                <option>Completed</option>
                                <option>Cancelled</option>
                            </select>
                        </div>

                        <div class="mb-3" id="cancelMessageGroup" style="display: none;">
                            <label for="cancelMessage" class="form-label" style="color: #880e4f;">Cancellation Message</label>
                            <textarea class="form-control" id="cancelMessage" rows="3" placeholder="Enter reason for cancellation"></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn" style="background-color: #f8bbd0; color: #880e4f;">Save Changes</button>
                            <a href="pending_orders.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

                <!-- End of Page Content -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Script to update pickup time based on order type -->
    <script>
        document.getElementById('orderType').addEventListener('change', function () {
            const pickupTimeInput = document.getElementById('pickupTime');
            if (this.value === 'For Pickup') {
                pickupTimeInput.value = '3:00 PM'; // Example pickup time
            } else {
                pickupTimeInput.value = 'N/A';
            }
        });

        // Show or hide the cancellation message input based on selected status
        document.getElementById('status').addEventListener('change', function () {
            const cancelMessageGroup = document.getElementById('cancelMessageGroup');
            if (this.value === 'Cancelled') {
                cancelMessageGroup.style.display = 'block';
            } else {
                cancelMessageGroup.style.display = 'none';
            }
        });
    </script>
</body>

</html>
