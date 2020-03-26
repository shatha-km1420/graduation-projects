<?php $page_title = "Home"; ?>
<?php include "include/header.php" ?>
<?php include_once('include/db_conn.php'); ?>

		<section class="page-header" id="home">
			<div class="opacity"></div>
				<div class="content">
					<div class="text">
						<h1>Welcome to<br/>
						<span>Graduation Projects Space</span></h1>         
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
  
	<div class="clear"></div>
	
	<section class="projects" id="projects">


    <div class="projects-margin">
    
      <h1>projects</h1>
      <hr/> 
	  
		<?php
			$result = executeQuery("select * from project;");
		?>
		
		<ul class="grid">
		
		<?php while ($result && $r = mysqli_fetch_array($result)) {?>
		
		 <li>
            <a href="project_details.php?id=<?php echo $r['id']; ?>">
              <img src="<?php echo $r['image']; ?>" alt="<?php echo $r['name']; ?>" />
                <div class="text">
                  <p><?php echo $r['name']; ?></p>
              </div>
            </a>
          </li>
		
		<?php } ?>
    
        </ul>
		<div class="clear"></div>
   
		<a href="projects.php"><div class="read-more">more projects</div></a>
   
   </div>   
         
   </section>
	 
	 <div class="clear"></div>

	<section class="form_content" id="contact">
		<img src="img/background/contact.jpg"/>     
		
		<div class="content">
			<h1>contact</h1>
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
