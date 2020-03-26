<!DOCTYPE html>
<html>
<head>
    <title>Graduation Projects Space | <?php if (isset($page_title)) echo $page_title; ?><</title>
	<link rel="shortcut icon" href="img/favicon.ico"> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="./css/style.css" type="text/css" />
	<script type="text/javascript" src="./js/javascript.js"></script>
</head>
<body>

	<div class="container">

		<section class="menu">
			<div class="menu-content">
			<div class="logo">
				<a href="#"><img src="img/logos/logo-dark.png"/></a>
			</div>
				<ul class="user_menu">
					<?php if (isset($user_name) && $user_name == 'Admin') { ?>
						<li><a href="admin_page.php">ADMIN</a></li>
						<li><a href="add_project.php">ADD PROJECT</a></li>
						<li><a href="index.php">LOGOUT</a></li>
					<?php } else { ?>
						<li><a href="login.php">LOGIN</a></li>
					<?php } ?>
				</ul>
				<ul id="menu">
					<li><a href="index.php">HOME</a></li>
					<li><a href="departments.php">DEPARTMENTS</a></li>
					<li><a href="about.php">ABOUT</a></li>
					<li><a href="contact.php">CONTACT</a></li>
				</ul>
			</div>
		</section>