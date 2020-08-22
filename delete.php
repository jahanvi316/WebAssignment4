<!DOCTYPE HTML>
<html>
<head>
  <title> Assignment 4 </title>
  <h1> Delete an entry</h1>
</head>

<body>
<form method="post">
  <p>Last Name <input type="text" size=30 name="lastname" required><br></p>
  <p>Phone number <input type="text" size=30 name="num" required><br></p>
  <input type="reset" value="Reset">
  <br/>
  <input type="submit" value="Submit">
  <br/>
  <input type="button" onclick="document.location='index.html'" value="Home">
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
    $lastname = $_POST['lastname'];
    $num = $_POST['num'];

    $sql = "SELECT lastname, num FROM AddressBook WHERE lastname='$lastname' AND num='$num'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $sql = "DELETE FROM AddressBook WHERE lastname='$lastname' AND num='$num'";
      if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . $conn->error;
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
