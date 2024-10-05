<?php 
session_start(); 

require_once '../inc/connection.php';

//checking if a user is logged in 

if(!isset($_SESSION['username'])){
    header("Location: sign-in.php");
} 

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $userId = $_SESSION['userid'];
    $complaint = $_POST['complaint'];

    $add_sql = "INSERT INTO usercomplaint VALUES (0, '$userId', '$complaint')";

    if($connection->query($add_sql)){
        echo "<script>alert('complaint added successfully')</script>";
    } else {
        exit ("error!");
    }

}

$connection->close();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User - Add complaint</title>
	<link rel="stylesheet" type="text/css" href="complaint-add.css">
</head>

<body>
	<div class="main-container">
            <div class="head"><br>
                <h1>Shield Plus Insurance</h1>
                <h5>Best health insurance partner</h5> <br>
            </div>

            <ul class="nav1">
                <li class="nav1"><a href="../user.php">User dashboard</a></li>
                <li class="nav2"><a href="../logout.php">Log Out</a></li>
            </ul>
            
            
            <div class="form-container">
                <form action="complaint-add.php" method="post" id="emp-form">
                        <h3><u>Add a complaint - form</u></h3>
                   

                    <div class="emp-details">
                        <label for="">Add complaint</label> 
                        <input type="text" name="complaint">
                    </div>

                    <div class="emp_details">
                        <p>This data is submitted according to</p> 
                        Username : <b><?php echo $_SESSION['username']."  "; ?></b> <br>
                        userId : <b><?php echo $_SESSION['userid']."  "; ?></b> <br>
                    </div> <br>

                    <button type="submit" name="submit">Submit complaint</button>
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