<html>
<body>

<h1>HTML Forms</h1>

<form method="POST">
  Name:<br>
  <input type="text" name="name">
  <br>
  Email:<br>
  <input type="text" name="email" >
  <br><br>
  <input type="submit" value="Submit">
</form> 
<br>

<?php
	
	if($_POST){
	$uname = $_POST["name"];
	$uemail = $_POST["email"];
	
	$conn = new mysqli("localhost", "root", "", "mydb");
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "CREATE TABLE contactus (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
phone VARCHAR(50),
message VARCHAR(200),
submit_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

	
	$conn->close();
	}
	

?>
</body>
</html>
