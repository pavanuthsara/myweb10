<?php 
session_start(); 
$username = $_SESSION['username'];
$userid = $_SESSION['userid']
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User - claim requests details</title>
	<link rel="stylesheet" type="text/css" href="complaint-add.css">
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

        <div class="view-employee"> 
            <div><b>Your complaints</b></div> <br>
                <?php 
                require_once '../inc/connection.php';
                $sql = "SELECT * FROM usercomplaint WHERE userId = '$userid'";
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
                    echo "<tr><th>Complaint ID</th> <th>User Id</th> <th>Complaint</th> </tr>";
                    while($row=$result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row['cid']."</td>";
                        echo "<td>".$row['userId']."</td>";
                        echo "<td>".$row['complaint']."</td>";
                        echo "</tr>";
                    }
                    echo "</table>"; 
                    echo '</div>';
                } 
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

                    
                    $complaintId = $_POST['complaintId'];
                    $userId = $_SESSION['userid'];
                    $complaint = $_POST['complaint'];

                    $update_sql = "UPDATE usercomplaint SET  complaint='$complaint'
                    WHERE cid='$complaintId' and userId='$userId'";

                    if($connection->query($update_sql)){
                        //header("Location: read-af.php?add-employee-message=Employee entered successfully!");
                        echo "successfully updated!";
                        header("Location: complaint-read.php");
                    } else{
                        exit("error!");
                    }
                }

                

            ?>

            <div class="form-container">
            <form action="complaint-read.php" method="post" id="emp-form">
                    <h3><u>Update a complaint - form</u></h3>

                    <div class="emp-details">
                        <label for="">Complaint ID</label> 
                        <input type="text" name="complaintId">
                    </div>

                    <div class="emp-details">
                        <label for="">Complaint</label> 
                        <input type="text" name="complaint">
                    </div>

                    <div class="emp_details">
                        <p>This data is submitted according to;</p> 
                        Username: <b><?php echo $_SESSION['username']."  " ?></b> <br>
                    </div> <br>
                    <button type="submit" name="submit" >Update complaint</button>

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

        
</body>
</html>

<?php $connection->close(); ?>