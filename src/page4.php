<?php

$host = $_POST["host"];
$user = $_POST["user"];
$pass = $_POST["password"];

//remember, for our purposes the DB is the same as the username ...
$dbName = $user;

$recipe_Name = $_POST["recipe_Name"];

//build the connection ...
echo "Attempting to connect to DB server: $host ...";
$conn = mysqli_connect($host, $user, $pass, $dbName);

if (!$conn)
	die("Could not connect:".mysqli_connect_error());
else
	echo " connected!<br>";

//update inventory when ingredients from a specified recipe are bought
$queryString = "UPDATE Inventory_T, Recipes_T ".
			   "SET Inventory_T.Quantity = Inventory_T.Quantity - Recipes_T.Quantity ".
			   "WHERE Recipes_T.Recipe_Name = '" .$recipe_Name. "' ".
			   "AND Recipes_T.Ingredient = Inventory_T.Ingredient ".
			   "AND Inventory_T.Quantity >= Recipes_T.Quantity"; 
			  
$status = mysqli_query($conn, $queryString);

//print out warning if inventory cannot be updated 
if (!$status) 
    die("Failure of purchase, inventory not changed.");

//close the connection (to be safe)
mysqli_close($conn);

?>