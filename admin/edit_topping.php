<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Topping - Paparazzi</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fc;
        }

        .card {
            box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        .btn-update {
            background-color: #FF204E;
            color: white;
        }

        .btn-update:hover {
            background-color: #cc1a3d;
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
          <?php include('navbar.php'); ?>

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid mt-5">

                    <!-- Row for Edit Topping Form -->
                    <div class="row justify-content-center">

                        <!-- Edit Topping Form -->
                        <div class="container mt-2">
                               <div class="row justify-content-center">
                                   <div class="col-md-6">
                                       <div class="card p-4">
                                           <h4 class="text-center mb-4">Edit Topping</h4>
                                           <form>
                                               <div class="mb-3">
                                                   <label for="toppingName" class="form-label">Topping Name</label>
                                                   <input type="text" class="form-control" id="toppingName" placeholder="Enter topping name">
                                               </div>
                                               <div class="mb-3">
                                                   <label for="description" class="form-label">Description</label>
                                                   <textarea class="form-control" id="description" rows="3"
                                                       placeholder="Enter description for the topping"></textarea>
                                               </div>
                                               <div class="mb-3">
                                                   <label for="toppingImage" class="form-label">Topping Image</label>
                                                   <input type="file" class="form-control" id="toppingImage" accept="image/*">
                                                   <small class="text-muted">Leave blank to keep the current image.</small>
                                               </div>
                                               <button type="submit" class="btn btn-update btn-block">Update Topping</button>
                                           </form>
                                       </div>
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
</body>

</html>
