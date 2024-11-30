<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
require 'connection.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email exists, generate new password
        $newPassword = bin2hex(random_bytes(8));

        // Update the password in the database
        $updateQuery = "UPDATE users SET password = ? WHERE email = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("ss", password_hash($newPassword, PASSWORD_DEFAULT), $email);
        $updateStmt->execute();

        // Send the new password via email
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kennetics1@gmail.com';
            $mail->Password = 'bcvn mqgw jxlf gmin'; // Use app password for Gmail
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            //Recipients
            $mail->setFrom('kennetics1@gmail.com', 'Paparazzi Ice Cream Station');
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Your New Password';
            $mail->Body = 'Your new password is: <b>' . $newPassword . '</b>';

            $mail->send();

            // On success, show alert and redirect to login.php
            echo "<script>alert('A new password has been sent to your email address.'); window.location.href = 'login.php';</script>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        // Email does not exist, show alert
        echo "<script>alert('The email address does not exist in our system.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Forgot Password - Sweet Treats Ice Cream Shop</title>
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

    <!-- Forgot Password Form -->
    <div class="login-form-container">
        <h1 class="text-center">Forgot Your Password?</h1>
        <br>
        <form action="forgot_password.php" method="POST">
            <!-- Email input -->
            <div class="form-outline">
                <label class="form-label" for="email">Enter your email address</label>
                <input type="email" id="email" name="email" class="form-control" required />
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary">Reset Password</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
