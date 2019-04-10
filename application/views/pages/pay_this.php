<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"> Home </a></li>
	<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Items/my_cart	"> Cart </a></li>
	<li class="breadcrumb-item active"><?= $title; ?></li>
</ol>

<div class="card">
	<?php foreach ($cart_item as $cart): ?>
	<div class="card-header">
		<h4>Cart Id <?php echo $cart['cart_id']; ?></h4>
	</div>

	<div class="card-body">
		<h4>Quantity: <?php echo $cart['item_quantity']; ?></h4>
		<h4>Price: <?php echo $cart['item_price']; ?></h4>

		<?php echo form_open_multipart('Items/pay_only_this'); ?>
			<div class="form-group">
				<input type="hidden" name="cart_id" value="<?php echo $cart['cart_id']; ?>">
				<input type="hidden" name="item_id" value="<?php echo $cart['item_id']; ?>">
				<input type="hidden" name="item_quantity" value="<?php echo $cart['item_quantity']; ?>">
				<input type="hidden" name="item_price" value="<?php echo $cart['item_price']; ?>">
				<input type="number" class="col-4 form-control" placeholder="Enter Amount" name="money">
			</div>
			<div class="form-group">
				<button class="btn btn-danger" name="pay_this" style="background-color: #ff6600; border: 0;"> Pay </button>
			</div>
		<?php echo form_close(); ?>

	</div>

	<div class="card-footer">
		<i>Cart Date: <?php echo $cart['date']; ?></i>
	</div>
	<?php endforeach; ?>
</div>