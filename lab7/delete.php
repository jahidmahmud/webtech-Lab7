<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
echo "Connected successfully";
}
$idk=$_GET['id'];
$sql = "DELETE FROM products WHERE id=$idk";
if ($conn->query($sql) === TRUE) {
    header("Location: http://localhost:8082/lab7/welcome.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>