<!DOCTYPE html>
<html>
<head>
    <style>
table, th, td {
  border: 1px solid black;
  background-color: #f1f1c1 ;
}
th, td {
  padding: 15px;
}
th{
  background-color: green;
}
</style>
</head>
<body>

</body>
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

$sql = "select * from products";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

?>
<table style="width:100%">
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Description</th>
    <th>Quantity</th>
  </tr>
  <?php 
  	while($row = $result->fetch_assoc()) {
   ?>
  <tr>
  	<td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['description']; ?></td>
    <td><?php echo $row['quantity']; ?></td>
  </tr>
  <?php } ?>
</table>
<?php } 
else{
	echo "no data found";
}
?>
<?php 
	$conn->close();
 ?>

 <br>
 <br>
 <a href='user.php' style="color: red;padding-right: 40px;"><font size="6">Log in HomePage</font></a>
 </html>
