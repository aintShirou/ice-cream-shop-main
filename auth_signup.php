<?php
require 'connection.php'; 
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function generateRandomPassword($length = 12) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
    return substr(str_shuffle($chars), 0, $length);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $account_type = 3;

    $randomPassword = generateRandomPassword();
    $hashedPassword = password_hash($randomPassword, PASSWORD_DEFAULT);

    // Prepare the SQL statement
    $sql = "INSERT INTO users (first_name, last_name, contact, address, email, password, account_type) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $firstName, $lastName, $contact, $address, $email, $hashedPassword, $account_type);

    if ($stmt->execute()) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kennetics1@gmail.com'; 
            $mail->Password = 'bcvn mqgw jxlf gmin';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('kennetics1@gmail.com', 'Paparazzi Ice Cream Station');
            $mail->addAddress($email, "$firstName $lastName");

            $mail->isHTML(true);
            $mail->Subject = 'Welcome to Paparazzi Ice Cream Station!';
            $mail->Body = "
                <h1>Welcome, $firstName!</h1>
                <p>Thank you for signing up. Here are your login details:</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Password:</strong> $randomPassword</p>
                <p>Please change your password after logging in for security reasons.</p>
            ";

            $mail->send();

            // Alert and redirect using JavaScript
            echo "<script>
                alert('Signup successful! Please check your email for your password.');
                window.location.href = 'login.php';
            </script>";
        } catch (Exception $e) {
            echo "<script>
                alert('Signup successful, but the email could not be sent. Error: {$mail->ErrorInfo}');
                window.location.href = 'login.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Error: " . $stmt->error . "');
            window.location.href = 'signup.php'; // Redirect back to signup on error
        </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
