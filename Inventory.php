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
		padding: 12px 20px;
		margin: 8px 0;
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
			Food Truck Inventory
		</title>
	</style>
	</head>
	
	<body>
		
		<form action="processitem.php" method="post">
			<h1>Food Truck Inventory</h1>
			<input type="text" name="item" value="Item | Desc" /> 
			<input type="text" name="qty" value="Qty" style="width:90px" />
			<br/><br/>
			<input type="submit" value="Add" /> <br/><br/>
		</form>
		
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

  ////////////////////////////////////////////////////////////////////////////
  // Retreiving data from a database 
  //get data from table 'item' with 'iid', 'name', 'description', and 'qty' as its columns
  //
  
  $quest = "select * from item order by qty asc";
		  

  $result = $conn->query($quest); //execute the query

  //display the result as an editable form
  if($result->num_rows > 0 ){
	   while($data = $result->fetch_assoc()){//for each a row as an array
	  echo "<form action='filetohandleupdates.php' method=post>";
	  echo "ItemID:<input type=text name='iid' value= '" . $data['iid'] . "' readonly><br/>";
	  echo "Name:<input type=text name='name' value= '" . $data['name'] . "' ><br/>";
	  echo "Description:<input type=text name='description' value='" . $data['description'] . "' ><br/>";
	  echo "Quantity:<input type=text name='qty' value='" . $data['qty'] . "'><br/>";
      echo "<br/><input type=submit>";
	  echo "</form>\n";
  }
  }


   $conn->close(); // close connection
?>
		
		
		
	</body>
</html>