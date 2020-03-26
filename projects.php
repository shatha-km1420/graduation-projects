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
	

    <section class="projects" id="projects">


    <div class="projects-margin">
	
		<?php
		if (isset($_REQUEST['d']) && $_REQUEST['d'] >= 1 && $_REQUEST['d'] <= 3) {
			$id = $_REQUEST['d'];
			$result = executeQuery("select * from project where department_id = $id;");
			
			if ($id == 1)
				echo '<h1>IT projects</h1>';
			else if ($id == 2)
				echo '<h1>CS projects</h1>';
			else
				echo '<h1>CE projects</h1>';
		}
		else {
			$result = executeQuery("select * from project;");
			echo '<h1>projects</h1>';
		}
		?>

      <hr/> 

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
      
   </div>   
         
   </section>

<?php include "include/footer.php" ?>
