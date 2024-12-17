<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);

    // Validate form inputs
    if (empty($username) || empty($email) || empty($password) || empty($role)) {
        echo "All fields are required.";
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Data to save (username|email|hashed_password|role)
    $user_data = "$username|$email|$hashed_password|$role\n";

    // Save to a file
    $file = 'user_data.txt';
    if (file_put_contents($file, $user_data, FILE_APPEND)) {
        echo "Registration successful!";
    } else {
        echo "Error saving data.";
    }
}
?>
