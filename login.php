<?php $page_title = "Login"; ?>
<?php include "include/header.php" ?>
<?php include_once('include/db_conn.php'); ?>

<?php
$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['username']) && isset($_POST['password'])) {
		conndb();

		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		
		$password=  md5($password);
		
		$query = "select * from user where username='$username' and password='$password' ";
		$result = executeQuery($query);
		
		closedb();

		if($result && mysqli_num_rows($result) > 0){
			$user = mysqli_fetch_array($result);
			header('Location:admin_page.php');
			exit;
		} else {
			$message = "Username or password is wrong";
		}
	} else {
		$message = "Please fill all required fileds.";
	}
}
?>

		<section class="page-header" id="home">
			<div class="opacity"></div>
				<div class="content">
					<div class="text">
						<h1><br><span>Login</span></h1>         
					</div>
			</div>
		</section>

	<section class="form_content" id="login" style="padding: 20px 0;">	
		<div class="content">
			<h1>Login</h1>
			<hr/> 
			
			<div class="form">
				<form id="login-form" action="login.php" method="post" enctype="multipart/form-data">
					<input name="username" id="username" placeholder="Username" />
					<input type="password" name="password" id="password" placeholder="Password" />
					
					<?php
						if(!empty($message)) {
							echo "<div class=\"message\">" . $message . "</div>";
						}
					?>
					
					<a href="#" onclick="document.getElementById('login-form').submit()">
						<div class="button">
							<span>Login</span>
						</div>
					</a> 
				</form>
			</div>
		</div>
	</section>
  
<?php include "include/footer.php" ?>
