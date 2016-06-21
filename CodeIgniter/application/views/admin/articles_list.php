<?php include 'admin_header.php'; ?>
	<div class="container" style="margin-top:60px;">
		<h1>Welcome to Admin Dashboard</h1>
		<br>
		<div class="row">
			<div class="col-md-12">
				<?php echo anchor('admin/add_article','Add Article',['class'=>'btn btn-primary pull-right']);?>
			</div>
		</div>
		<br>
		<?php if($feedback = $this->session->flashdata('feedback')): ?>
			<div class="row">
				<div class="col-md-6">
					<div class="alert alert-danger" role="alert"><?= $feedback ?></div>
				</div>
			</div>
		<?php endif; ?>
		<br>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered">
					<thead>
						<th>Sr. No.</th>
						<th>Title</th>
						<th>Action</th>
					</thead>
					<tbody>
					<?php if(count($articles)): ?>
						<?php $count = $this->uri->segment(3,0); ?>
						<?php foreach ($articles as $article): ?>
							<tr>
								<td><?= ++$count ?></td>
								<td><?php echo $article->title; ?></td>
								<td>
									<div class="row">
										<div class="col-md-2">
											<?= anchor("admin/edit_article/{$article->id}","Edit",['class'=>'btn btn-primary']) ?>
										</div>
										<div class="col-md-2">
											<?=
												form_open('admin/delete_article',['class'=>'form_open']),
												form_hidden(['article_id'=>$article->id]),
												form_submit(['name'=>'submit','class'=>'btn btn-danger','value'=>'Delete']),
												form_close(); 
											 ?>
										</div>
									</div>
									<!-- <button class="btn btn-danger">Delete</button> -->
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td colspan="3">No Articles found</td>
						</tr>
					<?php endif; ?>
					</tbody>
				</table>
				<br>
				<?= $this->pagination->create_links()
				?>
			</div>
		</div>
	</div>
<?php include 'admin_footer.php'; ?>