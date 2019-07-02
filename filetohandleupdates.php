<?php
/*
  An illustration of using data to update database
*/

  $servername = "localhost";
  $username = "timmyhomehci"; //put in the appropriate values
  $password = "hci19";
  $dbname = "timmyhomehci";//database you want to use
 
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 


  // data received from Inventory.php and assigned to appropriate variables
  $iid = $_POST['iid'];
  $name = $_POST['name'];
  $description = $_POST['description'];
  $qty = $_POST['qty'];
	
	//update query to item table  with name, description, qty, and iid
  $quest = 'UPDATE item SET name = "'.$name.'", description = "'.$description.'", qty = "'.$qty.'" WHERE iid = '.$iid;
	echo $quest;	
	$update = $conn->query($quest); //execute the query
			
	if($update === true)
      echo "<br/> A record is updated!";
   else 
      echo "<br/> failed to update record<br/>" . $conn->error  . "<br/>";
		 

   $conn->close(); // close connection
?>