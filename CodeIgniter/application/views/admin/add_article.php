<?php require_once('admin_header.php') ?>

	<div class="container" style="margin-top:60px;">
		<div class="row">
			<div class="col-md-12">
				<h2>Add Your Article</h2>
			</div>
		</div>
		<br>
		<?= form_open('admin/store_article',['class'=>'form-group']); ?>
			<?= form_hidden('user_id',$this->session->userdata('user_id')) ?>
			<div class="row">
				<div class="col-md-8">
					<?= form_input(['class'=>'form-control','placeholder'=>'Enter Title','name'=>'title','value'=>set_value('title')]); ?>
				</div>
				<div class="col-md-4">
					<?php echo form_error('title',"<p class='text-danger'>",'</p>'); ?>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-8">
					<?= form_textarea(['placeholder'=>'Enter Article','class'=>'form-control','name'=>'body','value'=>set_value('body')]); ?>
				</div>
				<div class="col-md-4">
					<?php echo form_error('body',"<p class='text-danger'>",'</p>'); ?>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-2">
					<?= form_submit(['name'=>'submit','value'=>'Add','class'=>'btn btn-primary']) ?>
				</div>
				<div class="col-md-2">
					<?= form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-danger']) ?>
				</div>
			</div>
	</div>
<?php require_once('admin_footer.php') ?>