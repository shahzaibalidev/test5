<?php include('connection.php'); ?>
<?php include('header.php'); ?>

<?php
	session_start();

	if(!isset($_SESSION['login_user']) && !isset($_SESSION['user_id'])){
	  header('Location: http://localhost/test5/');
	}


	if($_GET){

			$editid = $_GET["edit_id"];
			$sql = "SELECT * FROM contactus WHERE id = '$editid'";
			$result = $conn->query($sql);

			if ($result->row["id"] = $editid) {
				$row = $result->fetch_assoc();
				$vfname = $row["firstname"];
				$vlname = $row["lastname"];
				$vemail = $row["email"];
				$vphone = $row["phone"];
				$vmessage = $row["message"];
			} 
		
	}

if($_POST){

			$ufname = htmlentities($_POST["first-name"]);
			$ulname = htmlentities($_POST["last-name"]);
			$uemail = htmlentities($_POST["email"]);
			$uphone = htmlentities($_POST["phone"]);
			$umessage = htmlentities($_POST["message"]);		
			//$umessage = mysqli_real_escape_string($conn, $umessage);

			$sql = "UPDATE contactus SET firstname='$ufname', lastname='$ulname', email='$uemail', phone='$uphone', message='$umessage' WHERE id = '$editid'";
			
			
			if ($conn->query($sql) === TRUE) {
   				 header('Location: http://localhost/test5/');
			} else {
   					 echo "Error updating record: " . $conn->error;
				}

				$conn->close();

		}		
?>

	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method="POST">
				<span class="contact100-form-title">
					Edit Form
				</span>

				<label class="label-input100" for="first-name">Your Name *</label>
				<div class="wrap-input100 rs1 validate-input">
					<input id="first-name" class="input100" type="text" name="first-name" placeholder="First name" value="<?php echo $vfname; ?>">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 rs1 validate-input">
					<input class="input100" type="text" name="last-name" placeholder="Last name" value="<?php echo $vlname; ?>">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="email">Email Address *</label>
				<div class="wrap-input100 validate-input">
					<input id="email" class="input100" type="text" name="email" placeholder="Eg. example@email.com" value="<?php echo $vemail; ?>">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="phone">Phone Number</label>
				<div class="wrap-input100">
					<input id="phone" class="input100" type="text" name="phone" placeholder="Eg. +1 800 000000" value="<?php echo $vphone; ?>">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="message">Message *</label>
				<div class="wrap-input100 validate-input">
					<textarea id="message" class="input100" name="message" placeholder="Please enter your comments..."><?php echo $vmessage; ?></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							Submit
							<i class="zmdi zmdi-arrow-right m-l-8"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>

<?php include('footer.php'); ?>