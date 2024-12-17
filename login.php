<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Check if user data file exists
    $file = 'user_data.txt';
    if (!file_exists($file)) {
        echo "No users are registered yet.";
        exit;
    }

    // Read the file line by line
    $users = file($file, FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        list($stored_username, $stored_email, $stored_password, $stored_role) = explode("|", $user);

        // Match username and verify password
        if ($stored_username === $username && password_verify($password, $stored_password)) {
            // Store session data
            $_SESSION['username'] = $stored_username;
            $_SESSION['email'] = $stored_email;
            $_SESSION['role'] = $stored_role;

            // Redirect based on role
            if ($stored_role === 'admin') {
                header("Location: admin.html");
                exit();
            } elseif ($stored_role === 'buyer') {
                header("Location: buyer.html");
                exit();
            } elseif ($stored_role === 'seller') {
                header("Location: seller.html");
                exit();
            } else {
                echo "Invalid role.";
                exit;
            }
        }
    }

    echo "Invalid username or password.";
}
?>
