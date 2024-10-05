<?php 
session_start(); 
$username = $_SESSION['username'];
$userid = $_SESSION['userid'];
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
        <div class="head"><br>
	    <h1>Shield Plus Insurance</h1>
	    <h5>Best health insurance partner</h5> <br>
        </div>

        <ul class="nav1">
            <li class="nav1"><a href="../user.php">User dashboard</a></li>
            <li class="nav2"><a href="../logout.php">Log Out</a></li>
        </ul>

        <div class="view-employee"> 
            <div><b>Your claim requests</b></div> <br>
                <?php 
                require_once '../inc/connection.php';
                $sql = "SELECT * FROM usercomplaint WHERE userId = '$userId'";
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
                    echo "<tr><td>Complaint ID</td> <td>Complaint Date</td> <td>Complaint Type</td> <td>Description</td><td>Status</td></tr>";
                    while($row=$result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row['complaintId']."</td>";
                        echo "<td>".$row['date']."</td>";
                        echo "<td>".$row['complaintType']."</td>";
                        echo "<td>".$row['description']."</td>";
                        echo "<td>".$row['status']."</td>";
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
                    $userId = $_SESSION['user_id'];
                    $complaintDate = $_POST['complaintDate'];
                    $complaintType=$_POST['complaintType'];
                    $description = $_POST['description'];
                    $status = "Delivered";

                    $update_sql = "UPDATE complaint SET date='$complaintDate', description='$description', complaintType='$complaintType', description='$description', status='$status'
                    WHERE complaintId='$complaintId'";


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
                        User ID : <b><?php echo $_SESSION['user_id']."  "; ?></b> <br>
                        User Name : <b><?php echo "  ".$_SESSION['first_name']; ?></b>
                    </div> <br>

                    <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">

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
                &copy; 2024 Copyright Reserved - Shield Plus Insurance <br>
                <small>email@shieldplus.com</small>
            </footer>

        
</body>
</html>

<?php $connection->close(); ?>