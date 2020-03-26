<?php $page_title = "Delete Project"; ?>
<?php $user_name = "Admin"; ?>
<?php include "include/header.php"; ?>
<?php include_once('include/db_conn.php'); ?>

<?php

$message = "";

?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	global $message ;
	if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['supervisor'])) {
		conndb();

		$id = mysqli_real_escape_string($conn, $_POST['id']);
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$supervisor = mysqli_real_escape_string($conn, $_POST['supervisor']);
		$description = "";
		$book_cover = "";

		if (isset($_POST['description']))
			$description = $_POST['description'];

		$query = "update project set name = '$name', supervisor = '$supervisor', description = '$description' where id = '$id';";
		
		$result = executeQuery($query);

		if(!$result)
			$message .= "Error while executing query.<br/>Mysql Error: " . mysqli_error($conn);
		else {
			$message .= "The project has been updated.";
		}
		
		closedb();

	} else {
		$message .= "Please fill all required fileds.";
	}
}
?>


<?php
if (!isset($_REQUEST['id'])) {
	header('Location:admin_page.php');
}


$id = $_REQUEST['id'];

$result = executeQuery("delete from project where id = $id;");

if(!$result)
	$message .= "Error while executing query.<br/>Mysql Error: " . mysqli_error($conn);
else {
	$message .= "The project has been deleted.";
}

?>

	<section class="page-header" id="home">
		<div class="opacity"></div>
			<div class="content">
				<div class="text">
					<h1><br><span>Delete Project</span></h1>         
				</div>
		</div>
	</section>

	<section class="form_content" id="login" style="padding: 20px 0;">	
		<div class="content">
			<h1>Delete Project</h1>
			<hr/> 
			
			<div class="form">
				<?php
						if(!empty($message)) {
							echo "<div class=\"message\">" . $message . "</div>";
						}
					?>
			</div>
		</div>
	</section>
		
		
<?php include "include/footer.php" ?>