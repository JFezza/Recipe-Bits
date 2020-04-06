<?php

$host = $_POST["host"];
$user = $_POST["user"];
$pass = $_POST["password"];

//remember, for our purposes the DB is the same as the username ...
$dbName = $user;

//build the connection ...
echo "Attempting to connect to DB server: $host ...";
$conn = mysqli_connect($host, $user, $pass, $dbName);

if (!$conn)
	die("Could not connect:".mysqli_connect_error());
else
	echo " connected!<br>";

//try and create the table (if it does not exist) ...
$queryString = "CREATE TABLE IF NOT EXISTS Recipes_T(Recipe_Name varchar(30), Ingredient varchar(30), ".
			   "Quantity int(30), PRIMARY KEY(Recipe_Name, Ingredient) )";
               
$status = mysqli_query($conn, $queryString);

if (!$status)
    die("Error creating table: " . mysqli_error($conn));
    
$queryString = "CREATE TABLE IF NOT EXISTS Inventory_T(Ingredient varchar(30), Quantity int(30), ".
               "PRIMARY KEY(Ingredient) )"; 
    
$status = mysqli_query($conn, $queryString);

if (!$status)
    die("Error creating table: " . mysqli_error($conn));

//close the connection (to be safe)
mysqli_close($conn);

?>