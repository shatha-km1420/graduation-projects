<?php $page_title = "Edit Project"; ?>
<?php $user_name = "Admin"; ?>
<?php include "include/header.php"; ?>
<?php include_once('include/db_conn.php'); ?>

<?php

$message = "";

function uplouadImage($target_dir, $file) {
	global $message ;
	$target_file = strtolower ($target_dir . basename($file["name"]));
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image

		$check = getimagesize($file["tmp_name"]);
		if($check !== false) {
			//echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			$message .= "File is not an image.";
			$uploadOk = 0;
		}

	// Check if file already exists
	if (file_exists($target_file)) {
		$message .= "Sorry, file already exists.";
		$uploadOk = 0;
	}

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		$message .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$message .= "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($file["tmp_name"], $target_file)) {
			//echo "The file ". basename( $file["name"]). " has been uploaded.";
			return $target_file;
		} else {
			$message .= "Sorry, there was an error uploading your file.";
		}
	} 
}

function uplouadFile($target_dir, $file) {
	global $message;
	$target_file = strtolower ($target_dir . basename($file["name"]));
	$uploadOk = 1;
	$fileType = pathinfo($target_file,PATHINFO_EXTENSION);

	// Check if file already exists
	if (file_exists($target_file)) {
		$message .= "Sorry, file already exists.";
		$uploadOk = 0;
	}

	// Allow certain file formats
	if($fileType != "pdf") {
		$message .= "Sorry, only PDF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$message .= "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($file["tmp_name"], $target_file)) {
			//echo "The file ". basename( $file["name"]). " has been uploaded.";
			return $target_file;
		} else {
			$message .= "Sorry, there was an error uploading your file.";
		}
	} 
}

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

$result = executeQuery("select * from project where id = $id;");

if (!$result)
	header('Location:admin_page.php');

$project = mysqli_fetch_array($result)

?>

	<section class="page-header" id="home">
		<div class="opacity"></div>
			<div class="content">
				<div class="text">
					<h1><br><span>Edit Project</span></h1>         
				</div>
		</div>
	</section>

	<section class="form_content" id="login" style="padding: 20px 0;">	
		<div class="content">
			<h1>Edit Project</h1>
			<hr/> 
			
			<div class="form">
				<form id="edit_project" action="edit_project.php" method="post" enctype="multipart/form-data">
					
					<input type="hidden" id="id" name="id" value="<?php echo $project['id']; ?>">
					<input name="name" id="name" value="<?php echo $project['name']; ?>" />
					<input name="supervisor" id="supervisor" value="<?php echo $project['supervisor']; ?>" />
					
					<textarea id="description" name="description" value="<?php echo $project['description']; ?>"></textarea>
					
					<?php
						if(!empty($message)) {
							echo "<div class=\"message\">" . $message . "</div>";
						}
					?>
					
					<a href="#" onclick="document.getElementById('edit_project').submit()">
						<div class="button">
							<span>Edit</span>
						</div>
					</a> 
				</form>
			</div>
		</div>
	</section>
		
		
<?php include "include/footer.php" ?>