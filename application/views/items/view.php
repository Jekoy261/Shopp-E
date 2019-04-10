<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"> Home </a></li>
	<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>items"> Items </a></li>
	<li class="breadcrumb-item active"><?php echo $items['item_name']; ?></li>
</ol>

<div class="card">
	<div class="card-header">
		<h2><?php echo $items['item_name']; ?></h2>	
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-4">
				<img height="100%" width="100%" src="<?php echo base_url() ?>assets/images/items/<?php echo $items['post_image']; ?>">		
			</div>

			<div class="col-md-8">
				<?php echo form_open_multipart('Items/add_to_cart'); ?>
					<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>">
					<input type="hidden" name="item_id" value="<?php echo $items['item_id']; ?>">
					<input type="hidden" name="item_price" value="<?php echo $items['item_price']; ?>">
					<p class="card-text"><?php echo $items['item_description']; ?></p>
					<hr>
					<p class="card-text"><?php echo " Stocks <b>" . $items['item_quantity'] . "</b>"; ?></p>
					<p class="card-text"><?php echo " 	₱" .$items['item_price']; ?></p>
					
					<div class="input-group mb-3">
					  	<div class="input-group-prepend">
					    	<span class="input-group-text" id="basic-addon1">Quantity </span>
					  	</div>
					  	<input type="text" class="col-2 form-control text-center" name="item_quantity" value="1">
					</div>
					
					<div class="form-group">
						<input type="submit" class="btn btn-danger" style="background-color: #ff6600; border: 0;" name="add_to_cart" value="Add to Cart">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>