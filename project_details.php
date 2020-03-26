<?php $page_title = "Projects"; ?>
<?php include "include/header.php" ?>
<?php include_once('include/db_conn.php'); ?>

		<section class="page-header" id="home">
			<div class="opacity"></div>
				<div class="content">
					<div class="text">
						<h1><br><span>projects</span></h1>         
					</div>
			</div>
		</section>

		<?php
		if (isset($_REQUEST['id'])) {
			$id = $_REQUEST['id'];
			$result = executeQuery("select * from project where id = $id;");
			
			if ($result) {
				$r =  mysqli_fetch_array($result);
		?>
		
		 <section class="page-content" id="page-content">
			<h2 class="title"><?php echo $r['name']; ?></h2><hr>
			<img src="<?php echo $r['image']; ?>" alt="<?php echo $r['name']; ?>" />
			
			<h3 class="title">Supervisor</h3>
			<p>
				<?php echo $r['supervisor']; ?>
			</p>
			
			<h3 class="title">Description</h3>
			<p>
				<?php echo $r['description']; ?>
			</p>
			
			<h3 class="title">Download</h3>
			<p>
				<a href="<?php echo $r['file']; ?>"> Project Document </a>
			</p>
		</section>
		
		<?php

			}
		}
		?>


<?php include "include/footer.php" ?>
