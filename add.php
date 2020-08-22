<!DOCTYPE HTML>
<html>
<head>
  <title> Assignment 4 </title>
  <h1> Add an entry </h1>
</head>

<body>

<form method="post">
  <h2>First Name: </h2> <input type="text" name="firstname" required>
  <br/>
  <h2>Last Name: </h2> <input type="text" name="lastname" required>
  <br/>
  <h2>Address: </h3> <input type="text" name="address">
  <br/>
  <h2>Phone number: <input type="text" name="num" required></h2>
  <br/>
  <h2>Email: <input type="text" name="email"></h2>
  <br/>
  <h2>Alternate Address: <input type="text" name="altaddress"></h2>
  <br/>
  <input type="reset" value="Reset">
  <input type="submit" value="Submit" name="submit">
  <input type="button" onclick="document.location='index.html'" value="Home">
</form>

<?php
  $servername = "localhost";
  $username = "jpatel129";
  $password = "jpatel129";
  $dbname = "jpatel129";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
  }

  $sql = "CREATE TABLE AddressBook (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50),
    lastname VARCHAR(50) NOT NULL,
    address VARCHAR(50),
    num VARCHAR(12) NOT NULL,
    email varchar(50),
    altaddress varchar(12)
  )";

  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $num = $_POST['num'];
    $email = $_POST['email'];
    $altaddress = $_POST['altaddress'];

    $sql = "INSERT INTO AddressBook(firstname, lastname, address, num, email, altaddress)
    VALUES('$fname','$lname','$address','$pNum','$email','$altaddress')";

    if($conn->query($sql) === TRUE){
      echo "New record created successfully.";
    }else{
      echo "Error: ". $sql . "<br>". $conn->error;
    }
    $conn->close();
  }
?>

</body>
</html>
