<?php
include("connection.php");


$ID = $_GET['ID'];

echo $ID;


$sql = "UPDATE gisutd SET STATUS = 1 WHERE ID = $ID ";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

header("Location: http://localhost/GIS/index.php");

$conn->close();
?>