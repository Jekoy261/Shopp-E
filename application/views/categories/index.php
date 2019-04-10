<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"> Home </a></li>
	<li class="breadcrumb-item active"><?=$title; ?></li>
</ol>

<ul class="list-group">
	<?php foreach($categories as $category): ?>
		<li class="list-group-item">
			<a href="<?php echo base_url(); ?>Items/select_items_by_category/?category_id=<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></li>
	<?php endforeach; ?>	
</ul>