<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pending Orders</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                          <div class="col-lg-6">
                              <div class="card shadow" style="background-color: #fce4ec; border-color: #f8bbd0;">
                                  <div class="card-header text-center" style="background-color: #f8bbd0; color: #880e4f;">
                                      <h5 class="m-0 font-weight-bold">Add New Order</h5>
                                  </div>
                                  <div class="card-body">
                                      <form action="process_add_order.php" method="POST">
                                          <div class="mb-3">
                                              <label for="full_name" class="form-label" style="color: #880e4f;">Full Name</label>
                                              <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter full name" required>
                                          </div>
                                          <div class="mb-3">
                                              <label for="delivery_address" class="form-label" style="color: #880e4f;">Delivery Address</label>
                                              <input type="text" class="form-control" id="delivery_address" name="delivery_address" placeholder="Enter delivery address" required>
                                          </div>
                                          <div class="mb-3">
                                              <label for="product" class="form-label" style="color: #880e4f;">Product</label>
                                              <input type="text" class="form-control" id="product" name="product" placeholder="Enter product name" required>
                                          </div>
                                          <div class="mb-3">
                                              <label for="price" class="form-label" style="color: #880e4f;">Price</label>
                                              <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Enter price" required>
                                          </div>
                                          <div class="mb-3">
                                              <label for="order_type" class="form-label" style="color: #880e4f;">Order Type</label>
                                              <select class="form-control" id="order_type" name="order_type" required>
                                                  <option value="For Delivery">For Delivery</option>
                                                  <option value="For Pickup">For Pickup</option>
                                              </select>
                                          </div>
                                          <div class="mb-3">
                                              <label for="pickup_time" class="form-label" style="color: #880e4f;">Pickup Time (if applicable)</label>
                                              <input type="datetime-local" class="form-control" id="pickup_time" name="pickup_time">
                                          </div>
                                          <div class="mb-3">
                                              <label for="status" class="form-label" style="color: #880e4f;">Status</label>
                                              <select class="form-control" id="status" name="status" required>
                                                  <option value="Pending">Pending</option>
                                                  <option value="Processing">Processing</option>
                                                  <option value="Completed">Completed</option>
                                                  <option value="Cancelled">Cancelled</option>
                                              </select>
                                          </div>
                                          <div class="text-center">
                                              <button type="submit" class="btn" style="background-color: #f8bbd0; color: #880e4f;">Add Order</button>
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

    <!-- Custom scripts for all pages -->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>
