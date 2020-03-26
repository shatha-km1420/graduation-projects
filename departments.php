<?php $page_title = "Departments"; ?>
<?php include "include/header.php" ?>
<?php include_once('include/db_conn.php'); ?>

		<section class="page-header" id="home">
			<div class="opacity"></div>
				<div class="content">
					<div class="text">
						<h1><br><span>Departments</span></h1>         
					</div>
			</div>
		</section>

		<section class="departments" id="departments">
			<h2 class="title">College of Computers and Information Technology</h2>
			<hr/>
			
			<div class="column-one" onclick="window.location.href='projects.php?d=1'">
				<div class="circle-one"></div>
					<h2>IT</h2>
					<p>Information Technology</p>
			</div>
			
			<div class="column-two" onclick="window.location.href='projects.php?d=2'">
				<div class="circle-two"></div>
					<h2>CS</h2>
					<p>Computer Science</p>
			</div>

			<div class="column-three" onclick="window.location.href='projects.php?d=3'">
				<div class="circle-three"></div>
				<h2>CE</h2>
				<p>Computer Engineering</p>
			</div>  
		</section>
  
<?php include "include/footer.php" ?>
