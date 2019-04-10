<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"> Home </a></li>
	<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>items/add_item"> Items </a></li>
	<li class="breadcrumb-item active"><?= $title; ?></li>
</ol>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart('Items/update_item'); ?>
	<input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
	<div class="form-group">
    	<label> Item Name </label>
    	<input type="text" class="form-control" name="item_name" value="<?php echo $item['item_name']; ?>">
  	</div>
  	<div class="form-group">
  		<label> Item Description </label>
  		<input type="text" class="form-control" name="item_description" value="<?php echo $item['item_description']; ?>">
  	</div>

  	<div class="form-group">
    	<label>Categories</label>
    	<select name="category_id" class="form-control">
      		<?php foreach($categories as $category): ?>
        		<option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
      		<?php endforeach; ?>  
    	</select>
  	</div>

  	<div class="form-group">
  		<label> Quantity </label>
  		<input type="number" name="item_quantity" class="form-control" value="<?php echo $item['item_quantity']; ?>">
  	</div>
  	
  	<div class="form-group">
  		<label> Price </label>
  		<input type="number" name="item_price" class="form-control" value="<?php echo $item['item_price']; ?>">
  	</div>

  	<button type="submit" class="btn btn-danger" style="background-color: #ff6600; border: 0;">Submit</button>
</form>
<br>