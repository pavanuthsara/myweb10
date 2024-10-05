<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact Us - Shield Plus</title>
	<link rel="stylesheet" type="text/css" href="./css/contact-us.css">
    
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        /* FAQ Container */
        .faq-container {
            width: 80%;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* FAQ Heading */
        h1 {
            text-align: center;
            color: #333;
        }

        /* FAQ Items */
        .faq-item {
            margin: 20px 0;
        }

        .faq-question {
            background-color: #3A6D8C;
            color: white;
            padding: 15px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            font-size: 18px;
            margin: 0;
        }

        .faq-question:hover {
            background-color: #6A9AB0;
        }

        /* Hidden Answer */
        .hidden {
            display: none;
        }

        .faq-answer {
            padding: 10px;
            background-color: #f1f1f1;
            border-left: 4px solid #25D366;
            margin-top: 5px;
            font-size: 16px;
        }

    </style>
    
</head>

<body>
<div class="main-container">

	<?php include_once('inc/header1-1.php'); ?>

    <div class="faq-container">
        <h1>Frequently Asked Questions</h1>
        
        <div class="faq-item">
            <h3 class="faq-question" id="question1">What is the process for buying an apartment?</h3>
            <p class="faq-answer hidden" id="answer1">To buy an apartment, browse available listings, contact the seller through the platform, and arrange a viewing. Once you're ready, make an offer and complete the necessary paperwork through our legal team.</p>
        </div>

        <div class="faq-item">
            <h3 class="faq-question" id="question2">Do I need to pay any fees?</h3>
            <p class="faq-answer hidden" id="answer2">Yes, a small service fee is charged upon the completion of the sale. There are no hidden charges during the process.</p>
        </div>

        <div class="faq-item">
            <h3 class="faq-question" id="question3">How can I contact customer support?</h3>
            <p class="faq-answer hidden" id="answer3">You can contact customer support through the "Contact Us" page or directly via WhatsApp, which is available 24/7.</p>
        </div>

    </div>

    
	


</div>
<script src="./javascript/faq.js"></script>


</body>
</html>