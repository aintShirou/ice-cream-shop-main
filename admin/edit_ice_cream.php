<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Ice Cream - Paparazzi</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        /* Include your existing styles from manage_ice_cream.php */
    </style>
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
                <div class="container-fluid mt-3">

                    <!-- Edit Ice Cream Card -->
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body" style="border-radius: 10px; box-shadow: 1px 1px 5px rgba(0,0,0,0.5);">
                                    <h5 class="card-title text-center">Edit Ice Cream</h5>
                                    <form>
                                        <div class="form-group">
                                            <label for="editProductName">Product Name</label>
                                            <input type="text" class="form-control" id="editProductName" placeholder="Enter product name" value="Vanilla Delight">
                                        </div>
                                        <div class="form-group">
                                            <label for="editQuantity">Quantity</label>
                                            <input type="number" class="form-control" id="editQuantity" placeholder="Enter quantity" value="50">
                                        </div>
                                        <div class="form-group">
                                            <label for="editDescription">Description</label>
                                            <textarea class="form-control" id="editDescription" rows="3" placeholder="Enter description">A creamy vanilla flavored ice cream with a rich, smooth texture.</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="editProductImage">Product Image</label>
                                            <input type="file" class="form-control" id="editProductImage" accept="image/*">
                                            <small class="form-text text-muted">Current Image: VanillaDelight.jpg</small>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block mt-3">Update Product</button>
                                        <a href="manage_ice_cream.php" class="btn btn-secondary btn-block mt-2">Cancel</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

</body>

</html>
