<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>

<?php 
	//check if a user is logged in
	if(!isset($_SESSION['username'])){
		header("Location: sign-in.php");
	} 
?> 


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User - Apartment INC</title>
	<link rel="stylesheet" type="text/css" href="./css/user.css">
</head>

<body>
	<div class="main-container">
		
			<div class="head">
				<br>
				<h1 style="font-size:3vw">Apartment INC</h1>
				<h5 style="font-size:20px">Find Your Dream Apartment with Ease</h5> <br>
			</div>

		<ul class="nav1">
			<li class="nav1"><a href="home.php">Home</a></li>
			<li class="nav1"><a href="about-us.php">About Us</a></li>
			<li class="nav1"><a href="contact-us.php">Contact Us</a></li>
			<li class="nav1"><a href="">FAQ</a></li>
			<li class="nav2"><a href="logout.php">Log out</a></li> <!-- redirect to home page after log out -->

		</ul>

		<h4>Hello, Welcome to Apartment INC</h4>

		<div class="user-details details">
			<!--
			<div class="profile-pic">
				<p>add profile pic here</p>
			</div> -->

			<div class="user-details-content">
				<p>Username : <?php echo $_SESSION['username'];?></p>
				<p>Name : <?php echo $_SESSION['name'];?></p> 
			</div>
			
		</div>

	
		<div class="manage-employee details">
            <h4 class="title">Buy/Book apartment - for Buyers</h4>
			<hr>
            <div class="employee-buttons">
			<a href="book-ap/create.php" target="_blank" class="button-one">Add Booking</a>
            <a href="book-ap/read.php" target="_blank" class="button-one">Read & Update Previous bookings</a>
            <a href="book-ap/delete.php" target="_blank" class="button-one">Delete booking </a>
        	</div>
		</div>

		<div class="manage-employee details">
            <h4 class="title">Add a complaint - [for Sellers and Buyers]</h4>
			<hr>
            <div class="employee-buttons">
			<a href="complaint-crud/complaint-add.php"  class="button-one">Add a complaint</a>
            <a href="complaint-crud/complaint-read.php"  class="button-one">Read & Update Previous previous complaint</a>
            <a href="complaint-crud/complaint-delete.php"  class="button-one">Delete complaint</a>
        	</div>
		</div>

		<div class="manage-employee details">
            <h4 class="title">Sell your apartment - for Sellers</h4>
			<hr>
            <div class="employee-buttons">
			<a href="sell-apartment/create.php" class="button-one">Add apartment details</a>
            <a href="sell-apartment/read.php" class="button-one">Read & Update apartment details</a>
            <a href="sell-apartment/delete.php" class="button-one">Delete your apartments</a>
        	</div>
		</div>
		

        <?php require_once('inc/footer.php') ?>
	</div>

</body>
</html>