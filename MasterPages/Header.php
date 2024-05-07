<?php

echo '<html>
<head>
<title>Reservior Info Portal</title>

<link rel="stylesheet" type="text/css" href="CSS/style.css" title="style" />
<link rel="stylesheet" type="text/css" href="CSS/control.css" title="style" />
<link href="CSS/js-image-slider.css" rel="stylesheet" type="text/css" />


<script src="Scripts/js-image-slider.js" type="text/javascript"></script>
<script src="Validation/validation.js" type="text/javascript"></script>
</head>

<body>

 <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
        <img src="images/logo.png" style="width:50px; height:50px;"/>
          <!-- class="logo_colour", allows you to change the colour of the text -->
       <marquee>   <h1><a href="Index.aspx">Reservior <span class="logo_colour">Info Portal</span></a></h1>
          <h2>A website provides all reservior informaiton!</h2>
          </marquee>
        </div>
      </div>
	  
	   <div id="menubar">
        <ul id="menu"><!-- put class="selected" in the li tag for the selected page - to highlight which page youre on -->
         <li><a href="Index.php">Home</a></li>
         <li><a href="About.php">About Us</a></li>
		 <li><a href="Contact.php">Contact Us</a></li>
		 <li><a href="Login.php">Login</a></li>
        </ul>
		</div>
		</div>
		
		
		 <div id="site_content">
    
    
    <div id="sliderFrame">
                <div id="slider">
                   <img src="images/Slide Images/1.jpg" alt="Reservior Info Portal" />
                   <img src="images/Slide Images/2.jpg" alt="" />
                   <img src="images/Slide Images/3.jpg" alt="" />
                   <img src="images/Slide Images/5.jpg" alt="" />
                </div>
            </div>
      ';
      
      ?>