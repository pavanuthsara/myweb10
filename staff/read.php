<?php 
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>
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
            <li class="nav1"><a href="../user.php">Admin dashboard</a></li>
            <li class="nav2"><a href="../logout.php">Log Out</a></li>
        </ul>

        <div class="view-employee"> 
            <div><b>Staff details</b></div> <br>
                <?php 
                require_once '../inc/connection.php';
                $sql = "SELECT * FROM staff";
                $result = $connection->query($sql);
                
                if(!$result){
                    die("Invalid query or no results found!");
                }else{ 
                    echo "<style>
                    table, th,td{
                        padding: 5px 15px;
                        border: 1px solid black;
                        border-collapse: collapse;
                    }
                    
                    .edit-button{
                        text-decoration: none;
                        display: inline-block;
                        background-color: #0ed58f;
                        color:black;
                        padding: 10px;
                        cursor: pointer;
                        border-radius: 5px;
                    }
                    
                    .delete-button{
                        text-decoration: none;
                        display: inline-block;
                        background-color: #ca0939;
                        color:white;
                        padding: 10px;
                        cursor: pointer;
                        border-radius: 5px;
                    }
                    .center-table{
                        display: flex;
                        box-sizing: border-box;
                        justify-content: center;
                        align-items: center;
                        padding:10px;
                    }
                    </style>";
                    echo '<div class="center-table">';
                    echo "<table>";
                    echo "<tr><td>Staff Id</td> <td>Username</td> <td>Name</td> <td>Position</td></tr>";
                    while($row=$result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row['sid']."</td>";
                        echo "<td>".$row['staffUserName']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['position']."</td>";
                        echo "</tr>";
                    }
                    echo "</table>"; 
                    echo '</div>';
                } 
                //$connection->close();
                ?>
                <hr>
            </div>

            <?php

                require_once '../inc/connection.php';

                //checking if a user is logged in 

                if(!isset($_SESSION['username'])){
                    header("Location: sign-in.php");
                } 

                if($_SERVER["REQUEST_METHOD"] == "POST"){

                    
                    $aid = $_POST['aid'];
                    $bid = $_POST['bid'];

                    $update_sql = "UPDATE booking SET aid='$aid'
                    WHERE bookingId='$bid'";

                    if($connection->query($update_sql)){
                        header("Location: read.php?add-employee-message=Booking updated successfully!");
                    } else{
                        header("Location: delete.php?add-employee-message=Error in query execution!");
                    } 
                }

                

            ?>

            <div class="form-container">
                <form action="read.php" method="post" id="emp-form" enctype="multipart/form-data">
                    <h3><u>Update booking details - form</u></h3>
                    <!--<p><small>[Add payment details according to your payment slip]</small></p>-->

                <div class="emp-details">
                    <label for="">Booking ID</label> <br>
                    <input type="text" name="bid">
                </div>

                <div class="emp-details">
                    <label for="">Apartment ID</label> <br>
                    <input type="text" name="aid">
                </div>

                <div class="emp_details">
                    <p>This data is submitted according to</p> 
                    User ID : <b><?php echo $_SESSION['userid']."  "; ?></b> <br>
                    User Name : <b><?php echo "  ".$_SESSION['username']; ?></b>
                </div> <br>

                <button type="submit" name="submit">Submit update</button>
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
</body>
</html>