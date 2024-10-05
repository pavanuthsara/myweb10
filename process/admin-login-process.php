<?php
session_start();
require_once '../inc/connection.php';

// Retrieve username and password from POST request
$adminid = $_POST['adminId'];
$password = $_POST['password'];

// Query to check if username and password match
$sql = "SELECT * FROM admin WHERE adminId='$adminid' AND password='$password'";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    // Fetch user details
    $user = $result->fetch_assoc();

    // Store user information in session
    $_SESSION['adminid'] = $user['adminId'];
    $_SESSION['adminName'] = $user['name'];

    // Redirect to welcome page on success
    header("Location: ../admin.php");
} else {
    // Redirect back to login page with error message
    header("Location: ../admin-login.php?message=Invalid admin id or password");
}

//close the connection
$connection->close();
?>
