<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"> Home </a></li>
	<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>categories"> Categories</a></li>
	<li class="breadcrumb-item active"><?=$title; ?></li>
</ol>

<?php foreach($items as $item): ?>
	<div class="card">
		<div class="card-header">
			<h3><?php echo $item['item_name']?></h3>	
		</div>
	</div>
<?php endforeach; ?>