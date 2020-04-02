<!DOCTYPE html>
<html>
<head>
	<title></title>
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
<form  method="post" action="2.php">
<fieldset>
	<legend><b>Products</b></legend>
  Name:
  <input type="text" name="name" ><br>
   Description:
   <textarea name="message" rows="10" cols="30"></textarea>
   <br>
   Quantity:
  <input type="number" name="quantity"><br>
   <input type="submit" value="submit">
</fieldset>
</form>

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
    <th>Action</th>
  </tr>
  <?php 
  	while($row = $result->fetch_assoc()) {
   ?>
  <tr>
  	<td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['description']; ?></td>
    <td><?php echo $row['quantity']; ?></td>
    <td>
    	<a href='submit.php?id=<?php echo $row['id']; ?>' style="color: red;padding-right: 40px;">Update</a>
    	<a href='delete.php?id=<?php echo $row['id']; ?>' style="color: green;">Delete</a>
    </td>
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
 <a href='user1.php' style="color: red;padding-right: 40px;"><font size="6">Log Out</font></a>
</html>