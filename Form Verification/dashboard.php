<?php  

session_start();
require 'db.php';
require 'session_check.php';


?>
		<?php require 'dashboard_parts/header.php' ;?>
       

		<!--**********************************
            Content body start
        ***********************************-->
		  <div class="content-body"> 
			
			<div class="container-fluid"> 
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
								<h3>Welcome To Dashboard! <?=$after_assoc['name']?> </h3>
							</div>
							<div class="card-body">
								<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto, minus necessitatibus? Dolorem aut eius a eum, tempore alias tempora dolor enim rerum ullam minima nulla consequatur in, quod veritatis dolore?</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			</div> 
		 </div>  

		


		<!--**********************************
            Content body end
        ***********************************-->
		<?php require 'dashboard_parts/footer.php' ;?>
		
		

		