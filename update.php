<!DOCTYPE HTML>
<html>
<head>
  <title> Assignment 4 </title>
  <h1> Update an entry </h1>
</head>

<body>

<form method="post">

  <p>Last Name <input type="text" name="lastname" required><br></p>
  <p>Phone number <input type="text" name="num" required><br></p>
  <h4> Values to update </h4>
  <p>First Name <input type="text" name="firstname"><br></p>
  <p>Address <input type="text" name="address"><br></p>
  <p>Email <input type="text" name="email"><br></p>
  <p>Alternate address  <input type="text" name="altaddress"><br></p></p>
  <p><input type="reset" value="Reset">
  &nbsp&nbsp&nbsp
  <input type="submit" value="Submit" name="submit">
  &nbsp&nbsp&nbsp
  <input type="button" onclick="document.location='index.html'" value="Home"></p>
</form>

<?php
  $servername = "localhost";
  $username = "jpatel129";
  $password = "jpatel129";
  $dbname = "jpatel129";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if($conn->connect_error) {
    die("Connection failed. ".$conn->connect_error);
  }

  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $num = $_POST['num'];
    $email = $_POST['email'];
    $altaddress = $_POST['altaddress'];

    $sql = "SELECT lastname, num FROM AddressBook WHERE lastname='$lastname' AND num='$num'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $sql = "UPDATE AddressBook SET firstname='$firstname', address='$address', email='$email', altaddress='$altaddress' WHERE lastName='$lastname'";
      if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . $conn->error;
      }
    }
    else{
      echo "Record does not exist.";
    }
  }
  $conn->close();
?>

</body>
</html>
