<?php 
session_start(); 

require_once '../inc/connection.php';

//checking if a user is logged in 

if(!isset($_SESSION['username'])){
    header("Location: sign-in.php");
} 

if($_SERVER["REQUEST_METHOD"] == "POST"){

    
    $aid = $_POST['aid'];
    $paymentDate = $_POST['paymentDate'];
    $userid = $_SESSION['userid'];

    $add_sql = "INSERT INTO booking(userId, aid) VALUES ('$userid', '$aid')";
    // $select_sql = "SELECT * FROM annualFee WHERE feeID='$feeId'";
    // $check_sql = mysqli_query($connection, $select_sql);

    $errors = '';

    // if($check_sql->num_rows > 0){
    //     echo "<script src='script.js'></script>";
    // }else{
    //     if($connection->query($add_sql)){
    //         echo "<script src='add-af-success.js'></script>";
    //     } else{
    //         echo "<script src='add-af-error.js'></script>";
    //         header("Location: add-af.php");
    //     }
    // }

    if($connection->query($add_sql)){
        echo "<script src='add-af-success.js'></script>";
    } else{
        echo "<script src='add-af-error.js'></script>";
        header("Location: add-af.php");
    }

    // echo $errors;
}

$connection->close();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User - Add payment</title>
	<link rel="stylesheet" type="text/css" href="style-af.css">
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
                <form action="add-af.php" method="post" id="emp-form">
                    <h3><u>Add booking</u></h3>
                <div class="emp-details">
                    <label for="">Apartment ID</label>
                    <input type="text" name="aid" >
                </div>


                <div class="emp-details">
                    <label for="">Booking Date</label>
                    <input type="date" name="paymentDate">
                </div>

                <div class="emp_details">
                    This data is submitted according to
                    Username : <b><?php echo "  ".$_SESSION['username']; ?></b>
                </div> <br>

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