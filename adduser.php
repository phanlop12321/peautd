<?php

$servername = "localhost";
$username = "peautdco_PEAUTD";
$password = "CcMfVet8)d#U";
$dbname = "peautdco_GISPEAUTD";


$Username = $_POST['Username'];
$Password = md5($_POST['Password']);
$Department = $_POST['Department'];
$section = $_POST['section'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO user (Username, Password, Userlevel,Depratment)
VALUES ('$Username', '$Password', '$section', '$Department')";

if ($conn->query($sql) === TRUE) {
  echo "<script>";
                        echo "alert(\" เพิ่มข้อมูลเรียบร้อย\");"; 
                        Header("Location: addmin.php");
                    echo "</script>";

} else {
  echo "Error updating record: " . $conn->error;
}




$conn->close();
?>