<?php 
session_start(); 

require_once '../inc/connection.php';

//checking if a user is logged in 
if(!isset($_SESSION['username'])){
    header("Location: sign-in.php");
} 

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $aname = $_POST['name'];
    $address = $_POST['address'];
    $homes = $_POST['homes'];
    $userid = $_SESSION['userid'];

    $add_sql = "INSERT INTO apartment VALUES (0, '$aname', '$address', '$homes', '$userid')";

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
	<title>User - Add payment</title>
	<link rel="stylesheet" type="text/css" href="style-claim.css">
</head>

<body>
	<div class="main-container">
            <div class="head">
                <br>
                <h1 style="font-size:3vw">Apartment INC</h1>
                <h5 style="font-size:20px">Find Your Dream Apartment with Ease</h5> <br>
            </div>

            <ul class="nav1">
                <li class="nav1"><a href="../user.php">User dashboard</a></li>
                <li class="nav2"><a href="../logout.php">Log Out</a></li>
            </ul>
            
            
            <div class="form-container">
                <form action="create.php" method="post" id="emp-form" enctype="multipart/form-data">
                    <h3><u>Add your apartment - form</u></h3>
                    <!--<p><small>[Add payment details according to your payment slip]</small></p>-->
                

                <div class="emp-details">
                    <label for="">Apartment name</label> <br>
                    <input type="text" name="name">
                </div>

                <div class="emp-details">
                    <label for="">Apartment address</label> <br>
                    <input type="text" name="address">
                </div>

                <div class="emp-details">
                    <label for="">No of available homes</label> <br>
                    <input type="text" name="homes">
                </div>

                <div class="emp_details">
                    <p>This data is submitted according to</p> 
                    Username : <b><?php echo $_SESSION['username']."  "; ?></b> <br>
                    User Id : <b><?php echo "  ".$_SESSION['userid']; ?></b> 
                </div> <br>

                <button type="submit" name="submit">Submit claim request</button>
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