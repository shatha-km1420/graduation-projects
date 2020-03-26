<?php $page_title = "Contact"; ?>
<?php include "include/header.php" ?>
<?php include_once('include/db_conn.php'); ?>

		<section class="page-header" id="home">
			<div class="opacity"></div>
				<div class="content">
					<div class="text">
						<h1><br><span>Contact Us</span></h1>         
					</div>
			</div>
		</section>

	<section class="form_content" id="contact">
		<img src="img/background/contact.jpg"/>     
		
		<div class="content">
			<h1>Contact</h1>
			<hr/> 
			
			<div class="form">
				<form action="#" method="post" enctype="text/plain">
					<input name="your-name" id="your-name" placeholder="YOUR NAME" />
					<input name="your-email" id="your-email" placeholder="YOUR E-MAIL" />
					<textarea id="message" name="message" placeholder="MESSAGE"></textarea>
					<a href="#">
						<div class="button">
							<span>SEND</span>
						</div>
					</a> 
				</form>
			</div>
		</div>
	</section>
  
<?php include "include/footer.php" ?>
