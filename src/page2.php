<?php

$host = $_POST["host"];
$user = $_POST["user"];
$pass = $_POST["password"];

//remember, for our purposes the DB is the same as the username ...
$dbName = $user;

$recipe_Name = $_POST["recipe_Name"];
$ingredient_Name = $_POST["ingredient_Name"];
$quantity = $_POST["quantity"];

//build the connection ...
echo "Attempting to connect to DB server: $host ...";
$conn = mysqli_connect($host, $user, $pass, $dbName);

if (!$conn)
	die("Could not connect:".mysqli_connect_error());
else
	echo " connected!<br>";
	
//insert a recipe name, ingredient, and its quantity into recipes table
$queryString = "INSERT INTO Recipes_T ".
	           "VALUES (\"$recipe_Name\", \"$ingredient_Name\", $quantity)";

$status = mysqli_query($conn, $queryString);

if (!$status)
    die("Error performing insertion: " . mysqli_error($conn));

//close the connection (to be safe)
mysqli_close($conn);

?>