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

  // This receives orders with ready status and updates with status of completed

  
  $oid = $_POST['oid'];
	
  $quest = 'UPDATE orders SET status = 2 WHERE oid = '.$oid;
	echo $quest;	
	$update = $conn->query($quest); //execute the query
			
	if($update === true)
      echo "<br/> A record is updated!";
   else 
      echo "<br/> failed to update record<br/>" . $conn->error  . "<br/>";
		 

   $conn->close(); // close connection
?>