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

  ////////////////////////////////////////////////////////////////////////////
  // Retreiving data from a database 
  //get data from table 'contact' with 'name', 'age', and 'id' as its columns
  // where 'id' is an auto increment field
  //

  
  $oid = $_POST['oid'];
	
  $quest = 'UPDATE orders SET status = 1 WHERE oid = '.$oid;
	echo $quest;	
	$update = $conn->query($quest); //execute the query
			
	if($update === true)
      echo "<br/> A record is updated!";
   else 
      echo "<br/> failed to update record<br/>" . $conn->error  . "<br/>";
		 

   $conn->close(); // close connection
?>