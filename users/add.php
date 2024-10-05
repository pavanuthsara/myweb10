<?php 
session_start(); 

require_once '../inc/connection.php';

//checking if a user is logged in
if(!isset($_SESSION['adminid'])){
    header('Location: ../admin-login.php');
} 

if($_SERVER["REQUEST_METHOD"] == "POST"){ 
    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $add_sql = "INSERT INTO user VALUES ('', '$username', '$name', '$password', '$email')";

    if($connection->query($add_sql)){
        header("Location: add.php?add-employee-message=User added successfully!");
    } else{
        exit('error!');
    }
}

$connection->close();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin - Add user</title>
	<link rel="stylesheet" type="text/css" href="read-plan.css">
</head>

<body>
	<div class="main-container">
            <div class="head">
            <br>
            <h1 style="font-size:3vw">Apartment INC</h1>
            <h5 style="font-size:20px">Find Your Dream Apartment with Ease</h5> <br>
        </div>

            <ul class="nav1">
                <li class="nav1"><a href="../admin.php">Admin dashboard</a></li>
                <li class="nav2"><a href="../logout.php">Log Out</a></li>
            </ul>
            
            
            <div class="form-container">
                <form action="add.php" method="post" id="emp-form">
                    <h3><u>Add new user</u></h3>
                <div class="emp-details">
                    <label for="">Username</label>
                    <input type="text" name="username">
                </div>

                <div class="emp-details">
                    <label for="">Name</label>
                    <input type="text" name="name">
                </div>

                <div class="emp-details">
                    <label for="">Password</label>
                    <input type="text" name="password">
                </div>
                
                <div class="emp-details">
                    <label for="">Email</label>
                    <input type="text" name="email">
                </div>

                <button type="submit" name="submit">Submit</button>
                <br>

                <p>
                    <?php
                    if(isset($_GET['add-employee-message'])){
                        echo $_GET['add-employee-message'];
                    }
                    ?>
                </p>

                </form>

            </div>
        <footer>
            <hr>
            &copy; 2024 Copyright Reserved<br>
            <small>email@ApartmentINC.com</small>
        </footer>
	</div>


</body>
</html>