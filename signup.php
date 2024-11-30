<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Sign Up - Paparazzi Ice Cream Station</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css" />
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS for Ice Cream Shop theme -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #f9e5d9, #c3e7c4, #ffefbb); /* Soft pastel gradient */
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h1, h2 {
            font-family: 'Pacifico', cursive;
            color: #ff6f61;
        }

        .form-control {
            border-radius: 50px;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #f1c6a4; 
        }

        .form-outline {
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #ff9a8b; 
            border-radius: 50px;
            font-size: 1.2rem;
            padding: 10px 20px;
            border: none;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #ff6f61; 
        }

        .form-check-label {
            color: #ff9a8b; 
        }

        .signup-form-container {
            border-radius: 15px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
            margin: 0 15px;
            background: #ffffff; 
            padding: 20px;
            width: 100%;
            max-width: 800px;
        }

        .forgot-password-link {
            color: #ff9a8b; 
        }

        .forgot-password-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Sign Up Form -->
    <div class="signup-form-container">
        <h1 class="text-center">Sign Up</h1>
        <br>
        <div class="col text-center">
            Already have an account? <a href="login.php" class="forgot-password-link" style="color: blue;">Login</a>
        </div>
        <br>
        <form action="auth_signup.php" method="POST">
            <div class="row">
                <!-- First Name input -->
                <div class="col-md-6">
                    <div class="form-outline">
                        <label class="form-label" for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" class="form-control" required />
                    </div>
                </div>

                <!-- Last Name input -->
                <div class="col-md-6">
                    <div class="form-outline">
                        <label class="form-label" for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" class="form-control" required />
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Contact input -->
                <div class="col-md-6">
                    <div class="form-outline">
                        <label class="form-label" for="contact">Contact No.</label>
                        <input type="number" id="contact" name="contact" class="form-control" required />
                    </div>
                </div>

                <!-- Address input -->
                <div class="col-md-6">
                    <div class="form-outline">
                        <label class="form-label" for="address">Address</label>
                        <input type="text" id="address" name="address" class="form-control" required />
                    </div>
                </div>
            </div>

            <!-- Email input -->
            <div class="form-outline">
                <label class="form-label" for="email">Email address</label>
                <input type="email" id="email" name="email" class="form-control" required />
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
