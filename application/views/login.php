<!-- Container (About Section) -->
<div id="about" class="container-fluid">
	<div class="row">
		<div class="col-sm-8">
			<span class="glyphicon glyphicon-signal logo"></span>
		</div>
		<div class="col-sm-4 text-center">
			<h2>Login Page</h2><br>
			<form action=<?php echo base_url()."Login/userData";?> method="post">
				<div class="form-group">
					<label for="username">Email address:</label>
					<input type="text" class="form-control" id="username" name="username">
					<div>
						<?php echo form_error('username') ?>
					</div>
				</div>
				<div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" class="form-control" id="pwd" name="pwd">
					<div>
						<?php echo form_error('pwd') ?>
					</div>
				</div>
				
				<button type="submit" class="btn btn-default">Submit</button>
				<div style="padding: 10px;color: red;">
					<?php print_r($res['status'])  ?>
				</div>
				
			</form>  
			
		</div>
		
	</div>
</div>