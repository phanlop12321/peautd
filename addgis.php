<html>
<body>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "peadb";


$WBS = $_GET['WBS'];
$NAME = $_GET['NAME'];
$FILE = $_GET['FILE'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}




$sql = "INSERT INTO gisutd (WBS, NAME, FILE)
VALUES ('$WBS', '$NAME', '$FILE')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
header("Location: http://localhost/GIS/index.php");

$conn->close();
?>



</body>
</html>