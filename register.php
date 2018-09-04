<?php include('connection.php'); ?>

<?php
 if($_POST){
          // Checking fields Velus Start.
          if(empty($_POST["username"]) && empty($_POST["email"]) && empty($_POST["password"])){
             echo '<script>alert("please fill all fields.");</script>';
          }elseif (empty($_POST["username"]) && empty($_POST["email"])) {
             echo '<script>alert("please fill Username and Email.");</script>';
          }elseif (empty($_POST["username"]) && empty($_POST["password"])) {
             echo '<script>alert("please fill Username and password.");</script>';
          }elseif (empty($_POST["email"]) && empty($_POST["password"])) {
             echo '<script>alert("please fill Email and Password.");</script>';
          }elseif (empty($_POST["username"])) {
             echo '<script>alert("please fill username.");</script>';
          }elseif (empty($_POST["email"])) {
             echo '<script>alert("please fill Email.");</script>';
          }elseif (empty($_POST["password"])) {
             echo '<script>alert("please fill Password.");</script>';
          }
          // Checking fields Velus End.
          else{

                    $uname = htmlentities($_POST["username"]);
                    $uemail = $_POST["email"];
                    $upassword = $_POST["password"];
                    $date = date("Y-m-d H:i:s");
                    $upassword = md5($upassword);
                    $uemail = filter_var($uemail, FILTER_SANITIZE_EMAIL);
                    // Checking Velus from database Start.
                    $sql = "SELECT * FROM login";
                    $result = $conn->query($sql);
                    $condt = '';
                    while ($row = $result->fetch_assoc()) {
                          
                          if (in_array( $uname, $row)) {
                            echo '<script>alert("'.$uname.' already exists.");</script>';
                            $condt = FALSE;
                            break;
                          }
                          
                          if (in_array( $uemail, $row)) {
                            echo '<script>alert("'.$uemail.' already exists.");</script>';
                            $condt = FALSE;
                            break;
                          }

                          $condt = TRUE;
                    }
                    // Checking Velus from database End.
                    if ($condt) {
                      // insert_into($login, $values);
                        $sql = "INSERT INTO login(username, password, email, reg_date) VALUES('$uname', '$upassword', '$uemail', '$date')";
                        if ($conn->query($sql) === TRUE) {   

                            echo '<script>alert("Registration successful.");</script>';
                        }
                    }
                    $conn->close();
              }
       }

  


?>

<html>
<head>
  <title>Registration</title>
</head>
<body>

<button onclick=window.location.href="http://localhost/test5/">Home</button>
<!-- <input type="button" value="Home" onclick=window.location.href="http://localhost/test5/" />
<input type="button" value="Login" onclick=window.location.href="http://localhost/test5/login.php" /> -->

<br>

<h1>Registration</h1>

<form method="POST" action="">
  Username:<br>
  <input type="text" name="username">
  <br>
  email:<br>
  <input type="text" name="email">
  <br>
  Password:<br>
  <input type="password" name="password" >
  <br><br>
  <input type="submit" value="Submit">
</form>
<br>

</body>
</html>