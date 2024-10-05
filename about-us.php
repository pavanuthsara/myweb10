<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home - Shield Plus</title>
	<link rel="stylesheet" type="text/css" href="./css/about-us.css">
    <style>
        img {     
            display: block;
            margin-top;
            margin-left: auto;
            margin-right: auto;
        }

        /* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
}

/* About Container */
.about-container {
    width: 70%;
    margin: 50px auto;
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

/* Heading */
h1 {
    color: #333;
}

/* Paragraph Styles */
p {
    font-size: 18px;
    line-height: 1.6;
    margin: 20px 0;
}

/* Hidden Content */
.hidden {
    display: none;
}

/* Button Styles */
button {
    background-color: #3A6D8C;
    color: white;
    border: none;
    padding: 15px 30px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 8px;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #6A9AB0 ;
}

    </style>
</head>

<body>
	<div class="main-container">

        <?php include_once('inc/header1-1.php'); ?>

        <img src="img/aboutus.jpg" width="800px" height="500px">

        <div class="section">
        <!--<img src="health_image.jpg" width="100%" height="400px">-->
        <h1 id = "overview ">Overview</h1>

        <div class="about-container">
        <h1>About Us</h1>
        <p id="about-intro">
            Welcome to the Online Apartment Sales System, your trusted platform for finding and purchasing the perfect apartment. 
            Whether you're a first-time buyer or a seasoned investor, we provide a user-friendly experience to connect you with the best real estate options.
        </p>

        <p id="more-info" class="hidden">
            Our mission is to revolutionize the way you buy apartments by offering transparency, ease, and expert advice throughout the process.
            With a growing database of properties and a dedicated support team, we ensure that every buyer has a smooth and efficient experience. 
            Founded in 2020, we’ve already helped thousands of customers find their dream homes. We continue to grow, offering new features and enhancing customer satisfaction.
        </p>

        <button id="readMoreBtn">Read More</button>
    </div>

    


        <p class = "header"><B>Headline:</p></B></p>
        <P>Your Trusted Partner in Finding the Perfect Apartment</p>
            <ol>
                <p>Transparency: We provide complete details and honest pricing for all listings.</p>
                <p>Expertise: Our team of real estate professionals is here to guide you through every step of the buying process.</p>
                <p>Customer Focus: We prioritize your needs and ensure a personalized, stress-free experience.</p> 
            </ol>

            
        <p class = "header"><B>Subheading:</B></p>
        <P>With years of experience in the real estate market, we aim to simplify the process of finding, buying, and owning your dream apartment.</p>
           
        <p class = "header"><B>Our Mission:</B></p>
        <P>To provide a seamless apartment purchasing experience by offering a comprehensive range of verified listings and exceptional customer service.</p>
        
        <p class = "header"><B>Our Vision:</B></p>
        <P>To be the leading online platform for apartment sales, connecting buyers and sellers with trust, transparency, and professionalism.</p>
        <br>

	</div>
    
    <footer>
            <hr>
            &copy; 2024 Copyright Reserved<br>
            <small>email@ApartmentINC.com</small>
    </footer>

    <script src="./javascript/about.js"></script>
</body>
</html>