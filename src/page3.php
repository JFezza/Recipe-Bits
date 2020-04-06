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

//select a specified recipe's ingredients and quantity 
$queryString = "SELECT Recipe_Name, Ingredient, Quantity ".
               "FROM Recipes_T ".
               "WHERE Recipes_T.Recipe_Name = \"$recipe_Name\"";

$status = mysqli_query($conn, $queryString);

if (!$status)
    die("Error running query: " . mysqli_error($conn));

echo "<table border=1>";
//create table headers 
echo "<tr> <th>Recipe</th> <th>Ingredients</th> <th>Quantity</th> </tr>";

//create table rows 
while($row = mysqli_fetch_assoc($status)) {
        echo "<tr> <td>".$row["Recipe_Name"]."</td>". 
                  "<td>".$row["Ingredient"]."</td>". 
                  "<td>".$row["Quantity"]."</td> </tr>";
}

echo "</table>";

//close the connection (to be safe)
mysqli_close($conn);

?>