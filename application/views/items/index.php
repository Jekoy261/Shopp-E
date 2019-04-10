<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"> Home </a></li>
	<li class="breadcrumb-item active"><?=$title; ?></li>
</ol>
<?php 
/**<label> By Category </label>
<div class="input-group mb-3">

  	<select name="category_id" class="col-4 form-control">
		<option value=""> Select Category </option>
			<?php foreach($categories as $category): ?> 
				<option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
			<?php endforeach; ?>
	</select>
  	<div class="input-group-append">
    	<button class="btn btn-outline-secondary" type="button">Button</button>
  	</div>
</div>**/
?>

<?php foreach($items as $item): ?>
	<div class="card">
		<div class="card-header">
			<h3><?php echo $item['item_name']?></h3>	
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-3">
					<img style="height: 100%; width: 100%;" src="<?php echo base_url(); ?>assets/images/items/<?php echo $item['post_image']; ?>" alt="Card image">	
				</div>
				<div class="col-md-9">
					 <p class="card-text"><?php echo "₱" .$item['item_price']; ?></p>
					<a class="btn btn-danger" style="background-color: #ff6600; color: #fff; border: 0;" href="<?php echo base_url('/items/'.$item['item_slug']); ?>"> View Item </a>
				</div>
			</div>		
		</div>
		<div class="card-footer text-muted">
			<?php echo "posted: " . $item['created_at']; ?>
		</div>
	</div>
	<br>
<?php endforeach; ?>