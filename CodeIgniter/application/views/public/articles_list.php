<?php include('header.php'); ?>
<div style="margin-top:60px;" class="container">
	<h1>All Articles</h1>
	<hr>
	<table class="table table-bordered">
		<thead>
			<tr>
				<td>Sr. No.</td>
				<td>Article Title</td>
				<td>Published On</td>
			</tr>
		</thead>
		<tbody>
		<?php if(count($articles)): ?>
			<?php $count = $this->uri->segment(3,0); ?>
			<?php foreach($articles as $article): ?>
			<tr>
				<td><?= ++$count; ?></td>
				<td><?= $article->title; ?></td>
				<td><?= "Date"; ?></td>
			</tr>
			<?php endforeach; ?>
		<?php else: ?>
			<tr>
				<td colspan="3">No articles found.</td>
			</tr>
		<?php endif; ?>
		</tbody>
	</table>
	<br>
	<?= $this->pagination->create_links(); ?>
</div>
<?php include('footer.php'); ?>