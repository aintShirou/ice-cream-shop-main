<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Login - Sweet Treats Ice Cream Shop</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css" />
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS for Ice Cream Shop theme -->
    <style>
        /* Custom Ice Cream Shop theme */
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #f9e5d9, #c3e7c4, #ffefbb);
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
            margin-bottom: 20px;
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

        .form-check-input {
            border-radius: 50%;
        }

        .login-form-container {
            border-radius: 15px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
            margin: 0 15px;
            background: #ffffff; 
            padding: 30px;
            width: 100%;
            max-width: 500px;
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

    <!-- Login Form -->
    <div class="login-form-container">
        <h1 class="text-center">Login to Paparazzi</h1>
        <br>
        <div class="col text-center">
          Don't have an account? <a href="signup.php" class="forgot-password-link" style="color: blue;">Sign Up</a>
        </div>
        <br>
        <form action="auth_login.php" method="POST">
            <!-- Email input -->
            <div class="form-outline">
                <label class="form-label" for="email">Email address</label>
                <input type="email" id="email" name="email" class="form-control" required />
            </div>

            <!-- Password input -->
            <div class="form-outline">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required />
            </div>

            <!-- Remember me checkbox and Forgot password link -->
            <div class="row mb-4">
                <div class="col d-flex justify-content-start">
                    <div class="form-check">
                        <a href="forgot_password.php" class="forgot-password-link" style="color: blue;">Forgot password?</a>
                    </div>
                </div>        
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary">Sign in</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
