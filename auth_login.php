<?php
session_start();
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL to fetch user data
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Store user information in session
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['full_name'] = $user['first_name'] . ' ' . $user['last_name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['account_type'] = $user['account_type'];

            if($user['account_type'] == 3) {
                header("Location: customer/index.php");
            }
            exit;
        } else {
            // Incorrect password
            echo "<script>
                alert('Incorrect password. Please try again.');
                window.location.href = 'login.php';
            </script>";
        }
    } else {
        // Email not found
        echo "<script>
            alert('Email not found. Please check your details or sign up.');
            window.location.href = 'login.php';
        </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
