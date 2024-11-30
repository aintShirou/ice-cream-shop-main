<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Manage Sizes - Paparazzi</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .list-group-item img {
            width: 100px;
            height: 100px;
            float: left;
            margin-right: 15px;
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
                <div class="container-fluid mt-5">

                    <!-- Row for Form and Sizes Display -->
                    <div class="row">

                        <!-- Left Side: Add Size Form -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body" style="box-shadow: 1px 1px 5px rgba(0,0,0,0.5); border-radius: 10px;">
                                    <form>
                                        <div class="form-group">
                                            <label for="sizeName">Size</label>
                                            <input type="text" class="form-control" id="sizeName"
                                                placeholder="Enter size name (e.g., Small, Medium, Large)">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="description" rows="3"
                                                placeholder="Enter description for this size"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-block mt-2"
                                            style="background: #FF204E; color: white;">Add Size</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Right Side: Display All Sizes -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body" style="box-shadow: 1px 1px 5px rgba(0,0,0,0.5); border-radius: 10px">
                                    <ul class="list-group" id="size-list">
                                        <!-- Example Size Items -->
                                        <li class="list-group-item">
                                            <strong>Small</strong><br>
                                            <p>Description: Suitable for a single serving.</p>
                                            <a href="edit_size.php" class="btn btn-sm" style="background: green; color: white;">Edit</a>
                                            <button class="btn btn-sm" style="background: red; color: white;">Delete</button>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Medium</strong><br>
                                            <p>Description: Perfect for sharing with one other person.</p>
                                            <a href="edit_size.php" class="btn btn-sm" style="background: green; color: white;">Edit</a>
                                            <button class="btn btn-sm" style="background: red; color: white;">Delete</button>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Large</strong><br>
                                            <p>Description: Ideal for a family of four.</p>
                                            <a href="edit_size.php" class="btn btn-sm" style="background: green; color: white;">Edit</a>
                                            <button class="btn btn-sm" style="background: red; color: white;">Delete</button>
                                        </li>
                                    </ul>
                                    <!-- Pagination controls -->
                                    <nav>
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item active">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">3</a>
                                            </li>
                                        </ul>
                                    </nav>
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
