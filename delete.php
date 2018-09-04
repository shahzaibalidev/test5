<?php include('connection.php'); ?>
<?php

	session_start();

	if(!isset($_SESSION['login_user']) && !isset($_SESSION['user_id'])){
	  header('Location: http://localhost/test5/');
	}else{

	if(isset($_GET['delete_id'])){
		
				$delid = $_GET['delete_id'];
				
				$sql = "DELETE FROM contactus WHERE id = $delid";
				
				$result = $conn->query($sql);
		
	}
		
	header('Location: http://localhost/test5/');
	}
	?>