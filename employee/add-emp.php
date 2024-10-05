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
    $position = $_POST['position'];

    $add_sql = "INSERT INTO staff VALUES ('', '$username', '$name', '$position')";

    if($connection->query($add_sql)){
        header("Location: add-emp.php?add-employee-message=Staff member entered successfully!");
    } else{
        header("Location: add-emp.php?add-employee-message=Error");
    }
}

$connection->close();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin - Add staff</title>
	<link rel="stylesheet" type="text/css" href="add-emp.css">
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
                <form action="add-emp.php" method="post" id="emp-form">
                    <h3><u>Add new staff member</u></h3>

                <div class="emp-details">
                    <label for="">Username</label>
                    <input type="text" name="username">
                </div>

                <div class="emp-details">
                    <label for="">Name</label>
                    <input type="text" name="name">
                </div>

                <div class="emp-details">
                <label for="job-title">Position </label>
                <select name="position" id="job-title" id="">
                    <option value="Accountant">Accountant</option>
                    <option value="Manager">Manager</option>
                    <option value="Sales Agent">Sales Agent</option>
                    <option value="Marketing Executive">Marketing Executive</option>
                    <option value="Security">Security</option>
                    <option value="Data Analyst">Data Analyst</option>
                    <option value="IT Specialist">IT specialist</option>
                </select>
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
            &copy; 2024 Copyright Reserved - Shield Plus Insurance <br>
            <small>email@shieldplus.com</small>
        </footer>
	</div>


</body>
</html>