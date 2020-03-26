<?php $page_title = "Add Project"; ?>
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
	if (isset($_POST['department_id']) && isset($_POST['name']) && isset($_POST['supervisor']) && isset($_FILES["image"]["name"]) && isset($_FILES["file"]["name"])) {
		conndb();

		$department_id = mysqli_real_escape_string($conn, $_POST['department_id']);
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$supervisor = mysqli_real_escape_string($conn, $_POST['supervisor']);
		$description = "";
		$book_cover = "";
		
		$target_dir = "img/projects/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		if ($_FILES["image"]["tmp_name"] != "") {
			$image_name = uplouadImage($target_dir, $_FILES["image"]);
		}
		
		$target_dir = "files/projects/";
		$target_file = $target_dir . basename($_FILES["file"]["name"]);
		if ($_FILES["file"]["tmp_name"] != "") {
			$file_name = uplouadFile($target_dir, $_FILES["file"]);
		}
		$message = $message . "hhhh.";
		if (!empty($image_name) && !empty($file_name)) {
			if (isset($_POST['description']))
				$description = $_POST['description'];

			$query = "insert into project (department_id, name, supervisor, description, image, file) values ('$department_id', '$name', '$supervisor', '$description', '$image_name', '$file_name');";
			$result = executeQuery($query);
			
			$id = mysqli_insert_id ($conn);
			
			if(!$result)
				$message .= "Error while executing query.<br/>Mysql Error: " . mysqli_error($conn);
			else {
				$message .= "The project has been added.";
			}
			
			closedb();
		} else {
			$message = $message . "You must upload project image and file.";
		}
	} else {
		$message .= "Please fill all required fileds.";
	}
}
?>

	<section class="page-header" id="home">
		<div class="opacity"></div>
			<div class="content">
				<div class="text">
					<h1><br><span>Add Project</span></h1>         
				</div>
		</div>
	</section>

	<section class="form_content" id="login" style="padding: 20px 0;">	
		<div class="content">
			<h1>Add Project</h1>
			<hr/> 
			
			<div class="form">
				<form id="add_project" action="add_project.php" method="post" enctype="multipart/form-data">
				
					<select class="text-field" name="department_id" id="department_id"  placeholder="Project Supervisor">
						<option selected value="<Choose Department>">Choose Department</option>
						<?php 
							$departments = executeQuery("SELECT * FROM department;");
							while ($department = mysqli_fetch_array($departments)) 
							{
								$name = $department['code'] . " " . $designer['name'] . " ";
								echo "<option value=\"" . $department['id'] . "|" . $name . "\">" . $name . "</option>";
							}
							
							closedb();
						?>
					</select>
					
					<input name="name" id="name" placeholder="Project Name" />
					<input name="supervisor" id="supervisor" placeholder="Project Supervisor" />

					<label class="field-label" for="image">Image</label>
					<input type="file" name="image" id="image" />
					
					<label class="field-label" for="file">File</label>
					<input type="file" name="file" id="file" />
					
					<textarea id="description" name="description" placeholder="Description"></textarea>
					
					<?php
						if(!empty($message)) {
							echo "<div class=\"message\">" . $message . "</div>";
						}
					?>
					
					<a href="#" onclick="validateProjectForm(); document.getElementById('add_project').submit()">
						<div class="button">
							<span>Add</span>
						</div>
					</a> 
				</form>
			</div>
		</div>
	</section>
		
		
<?php include "include/footer.php" ?>