<?php
	require("db.php");
	
	//connect to DB
	
	
	$connection=mysqli_connect ('localhost', $username, $password);
	if (!$connection) {
	  die('Not connected : ' . mysqli_error());
	}
	//echo 'Connected... ' . mysqli_get_host_info($link) . "\n";
	// Set the active MySQL database
	$db_selected = mysqli_select_db( $connection, $database);
	if (!$db_selected) {
	  die ('Can\'t use db : ' . mysqli_error());
	}

	 
	$eventID = $_GET["eid"];
	$eventID = mysql_real_escape_string( $eventID);
	
	$query = "SELECT * FROM `events` WHERE id = $eventID";
	
	
	file_put_contents("/home/btoro93/log.txt", '/n', FILE_APPEND);
	file_put_contents("/home/btoro93/log.txt", $query, FILE_APPEND);


	$result = mysqli_query($connection, $query);
	if (!$result) {
	  die('Invalid query: ' . mysqli_error());
	}
	
	$row = @mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>
<title>Meal Prep Event</title>
<style>
	* {
			box-sizing: border-box;
	}
	

	.img-container {
			float: center;
			width: 33.33%;
			padding: 10px;
	}
	
	.clearfix::after {
			content: "";
			clear: both;
			display: table;
	}

        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
         #map {
            height: 100%;
            
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        .center {
text-align: center;
    border: 3px solid green;
}

/* Customize the label (the container) */
.container {
  display: block;
  position: relative;
  padding-left: 50%;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 12px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 45%;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

.slidecontainer {
    width: 100%; /* Width of the outside container */
}

/* The slider itself */
.slider {
    -webkit-appearance: none;  /* Override default CSS styles */
    appearance: none;
    width: 50%; /* Full-width */
    height: 25px; /* Specified height */
    background: #d3d3d3; /* Grey background */
    outline: none; /* Remove outline */
    opacity: 0.7; /* Set transparency (for mouse-over effects on hover) */
    -webkit-transition: .2s; /* 0.2 seconds transition on hover */
    transition: opacity .2s;
    
}

/* Mouse-over effects */
.slider:hover {
    opacity: 1; /* Fully shown on mouse-over */
}

/* The slider handle (use -webkit- (Chrome, Opera, Safari, Edge) and -moz- (Firefox) to override default look) */ 
.slider::-webkit-slider-thumb {
    -webkit-appearance: none; /* Override default look */
    appearance: none;
    width: 25px; /* Set a specific slider handle width */
    height: 25px; /* Slider handle height */
    background: #2196F3; /* Green background */
    cursor: pointer; /* Cursor on hover */
}

.slider::-moz-range-thumb {
    width: 25px; /* Set a specific slider handle width */
    height: 25px; /* Slider handle height */
    background: #2196F3; /* Green background */
    cursor: pointer; /* Cursor on hover */
}

    </style>
    

<div>
	<h4><b>PORTFOLIO</b></h4>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<!-- Header -->
<header class="w3-display-container w3-content w3-center" style="max-width:1500px" >
<div style="text-align:center">
  <div class="w3-display-container w3-padding-large w3-border w3-wide w3-center">
    <h3  ">Meal Prep Event</h3>
	</div>
</div>

<div class="w3-display-container w3-padding-large"  style="text-align:left">
    <h5><b>Host Name:</b></h5>
        <h5><?phpecho $row['host'];?></h5>
    <h5><b>Address:</b></h5>
        <h5><?phpecho $row['address'];?></h5>
    <h5><b>City:</b></h5>
        <h5><?phpecho $row['city'];?></h5>
    <h5><b>Zipcode:</b></h5>
        <h5><?phpecho $row['zip'];?></h5>
    <h5><b>Description:</b></h5>
        <h5><?phpecho $row['Description'];?></h5>
    <h5><b>Email:</b></h5>
        <h5><?phpecho $row['email'];?></h5>
    <h5><b>Phone:</b></h5>
        <h5><?phpecho $row['phone'];?></h5>
		<p>
        <span class="w3-tag w3-blue">Celiac</span>
        <span class="w3-tag w3-blue">Diabetes</span>
        <span class="w3-tag w3-blue">Candida</span>
        <span class="w3-tag w3-blue">Cardio</span>
        <span class="w3-tag w3-blue">Vegetarian</span>
		</p>
	<button id="return" type="button" value="Go!">Return</button>
</div>
</html>