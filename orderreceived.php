<?php
	//This code manipulates data received from Menu.html
	$location = $_POST['location'];
	$cname = $_POST['cname'];
	echo $location;
	echo $cname;
	//Insert statement into orders table with $location and $cname
	$query = "INSERT INTO orders(location, cname) " .
			"values('$location', '$cname')";
			
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
   $result = $conn->query("INSERT INTO orders(location, cname) 
			values('$location', '$cname')");
	// last auto_increment value saved
	$oid = mysqli_insert_id($conn);
   if($result === true)
      echo "<br/> A new record is added!";
   else 
      echo "<br/> failed to add a new record<br/>" . $conn->error  . "<br/>";
  
  
 // loop for menufood array from Menu.html where checked boxes are split into $iid and $cost
 $menufood = $_POST['menufood'];
foreach($_POST['menufood'] as $selected){


	echo "<br/>";
	echo $selected;
	echo "<br/>";
	$loc = strpos($selected, "|");
	$iid = (int)substr($selected, 0, $loc);
	$cost = (double)substr($selected, $loc+1);
	echo $iid;
	echo $cost;
	echo "<br/>";
	// insert query with oid,iid,cost to order_items table
	$quest = "INSERT INTO order_items(oid, iid, cost) " .
			"values('$oid', '$iid', '$cost')";
	$insert = $conn->query($quest); //execute the query
			
	if($insert === true)
      echo "<br/> A record is added!";
   else 
      echo "<br/> failed to insert record<br/>" . $conn->error  . "<br/>";



}

?>

