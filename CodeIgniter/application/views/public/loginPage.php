<?php include('header.php'); ?>
<head>
	<style>
		@media (max-width: 768px) {

		  [class*="col-"]{
		      margin-bottom: 15px;
		  }

		}
	</style>
</head>

<div class="container" style="margin-top:60px;">
	<div class="row">
		<div class="col-md-12">
			<h1>Welcome! Please Login to continue!</h1>
		</div>
	</div>
	<br>
	<?php echo form_open('login/public_login',['class'=>'form-group']); ?>
	<div class="row">
		<div class="col-md-4">
			<?php echo form_input(['class'=>'form-control','placeholder'=>'Username','name'=>'username','value'=>set_value('username')]); ?>
		</div>
		<div class="col-md-8">
			<?php echo form_error('username',"<p class='text-danger'>",'</p>'); ?>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-4">
			<?php echo form_password(['class'=>'form-control','placeholder'=>'Password','name'=>'password','value'=>set_value('password')]);?>
		</div>
		<div class="col-md-8">
			<?php echo form_error('password',"<p class='text-danger'>",'</p>'); ?>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-2">
			<?php echo form_submit(['name'=>'submit','value'=>'Login','class'=>'btn btn-primary']) ?>
		</div>
		<div class="col-md-2">
			<?php echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-primary']) ?>
		</div>
	</div>
	<br>
	<?php if($error = $this->session->flashdata('login_failed')): ?>
		<div class="row">
			<div class="col-md-6">
				<div class="alert alert-danger" role="alert"><?= $error ?></div>
			</div>
		</div>
	<?php endif; ?>
	<!-- <br>
	<div class="row">
		<div class="col-md-12">
			
		</div>
	</div> -->
</div>

<?php include('footer.php'); ?>