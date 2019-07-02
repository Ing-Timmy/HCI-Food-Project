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
		<h1>Food Truck Day Sales</h1></br></br></br></br>
		
		<?php

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

 
  ?>
  
  <?php
	// Counting the number of completed orders
		$sql = "SELECT oid FROM orders where status = 2";
		$result = $conn->query($sql);
		$num_rows = mysqli_num_rows($result);
		echo "Total Sales: " .$num_rows;
	?>
		
	</br></br></br></br>
	
	
	<h2>Ready Orders</h2>
  
	<?php
	// Display ready orders
  $quest = "select * from orders where status=1 order by oid asc";
		  

  $result = $conn->query($quest); //execute the query

  if($result->num_rows > 0 ){
	   while($data = $result->fetch_assoc()){//for each a row as an array
	  echo "<form>";
	  echo "Order ID:<input type=text name='oid' value= '" . $data['oid'] . "'readonly><br/>";
	  echo "Status:<input type=text name='status' value= '" . $data['status'] . "'readonly><br/>";
	  echo "Location:<input type=text name='location' value='" . $data['location'] . "'readonly><br/>";
	  echo "Customer Name:<input type=text name='cname' value='" . $data['cname'] . "'readonly><br/><br/><br/><br/>";
	  echo "</form>\n";
  }
  }
  
  ?>
  
  </br></br></br></br></br></br></br></br>
  
  <h2>Completed Orders</h2>
  
  <?php
  //Display completed orders
   $quest = "select * from orders where status=2 order by oid asc";
		  

  $result = $conn->query($quest); //execute the query


  if($result->num_rows > 0 ){
	   while($data = $result->fetch_assoc()){//for each a row as an array
	  echo "<form>";
	  echo "Order ID:<input type=text name='oid' value= '" . $data['oid'] . "'readonly><br/>";
	  echo "Status:<input type=text name='status' value= '" . $data['status'] . "'readonly><br/>";
	  echo "Location:<input type=text name='location' value='" . $data['location'] . "'readonly><br/>";
	  echo "Customer Name:<input type=text name='cname' value='" . $data['cname'] . "'readonly><br/><br/><br/><br/>";
	  echo "</form>\n";
  }
  }



   $conn->close(); // close connection
?>