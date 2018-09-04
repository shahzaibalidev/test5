<?php include('connection.php'); ?>
<?php

  session_start();

  if($_POST){
    
  $username = $_POST["username"];
  $password = $_POST["password"];
  $password = md5($password);

  $sql = "SELECT * FROM login WHERE username = '$username' and password = '$password'";
  
  $result = $conn->query($sql);
  $nrow = $result->fetch_assoc();
    $userid = $nrow["user_id"];

  if ($result->num_rows != 0) {
    

    $_SESSION['login_user'] = $username;
    $_SESSION['user_id'] = $userid;

    if(isset($_SESSION['login_user']) && isset($_SESSION['user_id'])){
      header('Location: http://localhost/test5/');
    }

  } else {
    echo "Password not valid";
  }
  $conn->close();
  }
  

?>

<html>
<body>

<form><input type="button" value="Home" onclick=window.location.href="http://localhost/test5/" /></form> 
<form><input type="button" value="Register" onclick=window.location.href="http://localhost/test5/register.php" /></form> 

<br>

<h1>Login</h1>

<form method="POST">
  Username:<br>
  <input type="text" name="username">
  <br>
  Password:<br>
  <input type="password" name="password" >
  <br><br>
  <input type="submit" value="Submit">
</form> 
<br>

</body>
</html>
