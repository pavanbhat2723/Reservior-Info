<?php

echo '<html>
<head>
<title>Reservior Info Portal</title>

<link rel="stylesheet" type="text/css" href="../CSS/style.css" title="style" />
<link rel="stylesheet" type="text/css" href="../CSS/control.css" title="style" />

<script src="../Validation/validation.js" type="text/javascript"></script>
</head>

<body>

 <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="Index.aspx">Reservior <span class="logo_colour">Info Portal</span></a></h1>
          <h2>Website provides all reservior informaiton!</h2>
        </div>
      </div>
	  
	   <div id="menubar">
        <ul id="menu"><!-- put class="selected" in the li tag for the selected page - to highlight which page youre on -->
        <li><a href="EngineerWaterTimeTable.php">Time Table</a></li>
         <li><a href="EngineerWaterLevelList.php">Level</a></li>
         <li><a href="EngineerChannelList.php">Channel</a></li>
         <li><a href="EngineerInfo.php">Info</a></li>
		 <li><a href="ChangePassword.php">Password</a></li>
		 <li><a href="../Logout.php">Log Out</a></li>
        </ul>
		</div>
		</div>
		
		
		 <div id="site_content">

      ';
      
      ?>