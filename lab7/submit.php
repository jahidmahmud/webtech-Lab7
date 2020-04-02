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

	$sql = "select * from products where id=$idk";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

 ?>
<form method="post" action="3.php">
<fieldset>
	<legend><b>Products</b></legend>
  Name:
  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
  <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
   Description:
   <textarea name="message" rows="10" cols="30"> <?php echo $row['description']; ?></textarea>
   <br>
   Quantity:
  <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>"><br>
   <input type="submit" value="submit">
</fieldset>
</form>

 <?php
	}
}
$conn->close();
 ?>
