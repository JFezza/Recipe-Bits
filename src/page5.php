<?php

$host = $_POST["host"];
$user = $_POST["user"];
$pass = $_POST["password"];

//remember, for our purposes the DB is the same as the username ...
$dbName = $user;

$ingredient_Name = $_POST["ingredient_Name"];
$quantity = $_POST["quantity"];

//build the connection ...
echo "Attempting to connect to DB server: $host ...";
$conn = mysqli_connect($host, $user, $pass, $dbName);

if (!$conn)
	die("Could not connect:".mysqli_connect_error());
else
	echo " connected!<br>"; 
 
 //see if an ingredient exists in the inventory table              
 $queryString = "SELECT COUNT(*) ".
 				"FROM Inventory_T ".
 				"WHERE Inventory_T.Ingredient = '" .$ingredient_Name. "'";
 				
$status = mysqli_query($conn, $queryString);

//update existing value of quantity associated with ingredient
if($status >= 1) {  
 	$queryString = "UPDATE Inventory_T ". 
 				   "SET Inventory_T.Quantity = Inventory_T.Quantity + '" .$quantity. "'".
 				   "WHERE Inventory_T.Ingredient = '" .$ingredient_Name. "'";
	$status = mysqli_query($conn, $queryString); 
} 

//insert new ingredient and quantity that does not already exist 
$queryString = "INSERT IGNORE INTO Inventory_T ".
				   "VALUES (\"$ingredient_Name\", $quantity)";
      
$status = mysqli_query($conn, $queryString);     

//close the connection (to be safe)
mysqli_close($conn);

?>