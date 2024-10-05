<?php 
session_start(); 

require_once '../inc/connection.php';

//checking if a user is logged in
if(!isset($_SESSION['username'])){
    header("Location: sign-in.php");
} 

if($_SERVER["REQUEST_METHOD"] == "POST"){

    
    $complaintId = $_POST['complaintId'];

    $delete_sql = "DELETE FROM usercomplaint WHERE cid='$complaintId'";


    if($connection->query($delete_sql)){
        echo "<script>alert('Successfully deleted')</script>";
        // header("Location: complaint-delete.php");
    } else{
        exit("error!");
    }   

}

$connection->close();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User - Delete claim request</title>
	<link rel="stylesheet" type="text/css" href="complaint-delete.css">
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
                <form action="complaint-delete.php" method="post" id="emp-form">
                    <h3><u>Delete complaint</u></h3>
                <div class="emp-details">
                    <label for="">Enter complaint  ID</label>
                    <input type="text" name="complaintId">
                </div>
            
                <button type="submit" name="submit">Submit</button>
                <br>

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