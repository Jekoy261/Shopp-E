<h4><?=$title; ?></h4>

<div class="form-group">
	<button class="btn btn-danger" style="background-color: #ff6600; border: 0;"> Pay Now </button>
</div>
<?=$data_success; ?>
<table class="table table-bordered table-hover">
	<thead>
		<tr> 
			<th class="text-center"> Item Id</th>
			<th class="text-center"> Item Quantity </th>
			<th class="text-center"> Item Price </th>
			<th class="text-center"> Action </th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($items as $item): ?>
		<tr>
			<td class="text-center"><?php echo $item['item_id']; ?></td>
			<td><?php echo $item['item_quantity']; ?></td>
			<td><?php echo $item['item_price']; ?></td>
			<td class="text-center">
				<a class="btn btn-danger" style="background-color: #ff6600; border: 0px;" name="pay_this" href="<?php echo base_url(); ?>Items/pay_this/?cart_id=<?php echo $item['cart_id']; ?>"> Pay </a>
				<a class="btn btn-danger" name="delete" href="<?php echo base_url(); ?>Items/delete_in_cart/?cart_id=<?php echo $item['cart_id']; ?>" onclick="return confirm('Are you Sure?')"><span class="ni ni-fat-remove"></span> </a>
			</td>
		</tr>
		<?php endforeach;?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="4"> Total: <b><?php echo "₱ " . $sum; ?></b></td>
		</tr>
	</tfoot>
</table>