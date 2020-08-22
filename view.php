<!DOCTYPE HTML>
<html>
<head>
  <title> Assignment 4 </title>
  <h1> View all entry </h1>
</head>

<body>

<?php
  $servername = "localhost";
  $username = "jpatel129";
  $password = "jpatel129";
  $dbname = "jpatel129";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT firstname, lastname, address, num, altaddress, email FROM AddressBook";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    echo "<table>";
    echo "<tr>";
    echo "<th> First Name </th>";
    echo "<th> Last Name </th>";
    echo "<th> Address </th>";
    echo "<th> Phone Number </th>";
    echo "<th> Alt. Address </th>";
    echo "<th> Email </th>";
    echo "</tr>";

    while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["firstname"].
            "</td><td>".$row["lastname"].
            "</td><td>".$row["address"].
            "</td><td>".$row["num"].
            "</td><td>".$row["altaddress"].
            "</td><td>".$row["email"].
            "</td></tr>";
    }

    echo "</table>";

  } else {
    echo "0 results";
  }
  $conn->close();
?>

<form method="post">
  <p><input type="button" onclick="document.location='index.html'" value="Home"></p>
</form>
</body>
</html>
