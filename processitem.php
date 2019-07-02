<?php

	echo "You have added... <br/>" ; 
	echo $_POST['item'] . " with quantity " . $_POST['qty']  ;
	
	//Retreiving data from Inventory.php
	$item = $_POST['item'];
	$qty = $_POST['qty'];
	$loc = strpos($item, "|");
	
	echo " location of | " . $loc;
	
	//Splitting $item into $name and $description
	$name = substr($item, 0, $loc);
	$description = substr($item, $loc+1);
	
	//Query for insert statement into item table
	$query = "INSERT INTO Item(name, description, qty) " .
			"values('$name', '$description', '$qty')";
			
	echo "<br/>My Insert Query:<br/>" . $query . "<br/>";
	
	$servername = "localhost";
	$username = "timmyhomehci";
	$password = "hci19";
	$dbname = "timmyhomehci";
	
	echo 'trying to connect to database <br>';
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
	 //
   $result = $conn->query("INSERT INTO Item(name, description, qty) 
			values('$name', '$description', '$qty')");
   if($result === true)
      echo "<br/> A new record is added!";
   else 
      echo "<br/> failed to add a new record<br/>" . $conn->error  . "<br/>";
?>