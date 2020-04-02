<?php
  $id=$_POST['id'];
  $namee=$_POST['name'];

  $emaile=$_POST['message'];

  $gendere=$_POST['quantity'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "mydb";
  $conn = new mysqli($servername, $username, $password,$dbname)or die("connection error");
  $sql = "UPDATE products SET name='$namee',description='$emaile',quantity='$gendere' WHERE 
  id=$id";
  if ($conn->query($sql) === TRUE) {
    header("Location: http://localhost:8082/lab7/welcome.php");
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  $conn->close();
 ?>