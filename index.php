<?php include('connection.php'); ?>
<?php include('header2.php'); ?>


	<h1>Contact Us DATA</h1>
	<?php
	if(isset($_SESSION['login_user']) && isset($_SESSION['user_id'])){
	  echo	'<h2><form><input type="button" value="Logout" onclick=window.location.href="http://localhost/test5/logout.php" /></form></h2>';
	}else{

		echo	'<h2><form><input type="button" value="Register" onclick=window.location.href="http://localhost/test5/register.php" /></form><form><input type="button" value="Login" onclick=window.location.href="http://localhost/test5/login.php" /></form></h2>';
	}
	?>
	<table class="data-table">
		<caption class="title">Users DATA</caption>
		<thead>
			<tr>
				<th>NO</th>
				<?php 
				if(isset($_SESSION['login_user']) && isset($_SESSION['user_id'])){
				echo '<th>ID</th>';}
				?>
				<th>First name</th>
				<th>Last name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Message</th>
				<th>Submit Date</th>
				<?php 
				if(isset($_SESSION['login_user']) && isset($_SESSION['user_id'])){
				echo '<th>Edit</th>
				<th>Delete</th>';}
				?>
			</tr>
		</thead>
		<tbody>
		<?php
		$no 	= 1;
		$sql = 'SELECT * FROM contactus';
		
		$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()){
					echo '<tr>
					<td>'.$no.'</td>';

					if(isset($_SESSION['login_user']) && isset($_SESSION['user_id'])){
					echo '<td>'.$row['id'].'</td>';}
					
				echo '<td>'.$row['firstname'].'</td>
					<td>'.$row['lastname'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.$row['phone'].'</td>
					<td>'.$row['message'].'</td>
					<td>'. date('F d, Y', strtotime($row['submit_date'])) . '</td>';
					

					if(isset($_SESSION['login_user']) && isset($_SESSION['user_id'])){
					
							echo '<td><form><input type="button" value="Edit" onclick=window.location.href="edit.php?edit_id='.$row['id'].'" /></form></td>
								<td><form><input type="button" value="Delete" onclick=window.location.href="delete.php?delete_id='.$row['id'].'" /></form></td>';
				}
				echo '</tr>';
			$no++;
		}
	}
	?>
		</tbody>
		
	</table>
</body>
</html>