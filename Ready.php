<!DOCTYPE html>
<html>
	<head>
	<style>
		body {
		background-color: #ffda6b;
		text-align: center;
		font-size:20px;
		}
		
		
		input[type=text] {
		border: 2px solid black;
		border-radius: 3px;
		 width: 20%;
		padding: 8px 12px;
		margin: 6px 0;
		box-sizing: border-box;
		 font-size:15px;
		}
		
		input[type=button], input[type=submit], input[type=reset] {
		 border: 2px solid black;
		 border-radius:4px;
		 padding: 12px 15px;
		 background-color: #F1C77A;
		 }
		 
		 
		<title>
			Food Truck Open Orders
		</title>
	</style>
	</head>
	
	<body>
		<h1>Food Truck Ready Orders</h1></br></br>
		<?php
/*
  An illustration of extracting data from database for update
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

	 // Display orders from orders table who are in the ready status
  
  $quest = "select * from orders where status=1 order by oid asc";
		  

  $result = $conn->query($quest); //execute the query


  if($result->num_rows > 0 ){
	   while($data = $result->fetch_assoc()){//for each a row as an array
	  echo "<form action='filetohandlereadyorders.php' method=post>";
	  echo "Order ID:<input type=text name='oid' value= '" . $data['oid'] . "'readonly><br/>";
	  echo "Status:<input type=text name='status' value= '" . $data['status'] . "'readonly><br/>";
	  echo "Location:<input type=text name='location' value='" . $data['location'] . "'readonly><br/>";
	  echo "Customer Name:<input type=text name='cname' value='" . $data['cname'] . "'readonly><br/>";
      echo "<br/><input type=submit value=Done>";
	  echo "</form>\n";
  }
  }


   $conn->close(); // close connection
?>
		
		
		
	</body>
</html>