<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/home"> Dashboard </a></li>
	<li class="breadcrumb-item active"><?= $title; ?></li>
</ol>
<p>Date: <em><span id="date_time"></span></em></p>

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<td class="text-center"> Item Id </td>
			<td class="text-center"> Item Quantity </td>
			<td class="text-center"> Item Price </td>
			<td class="text-center"> Date Paid </td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($solds as $sold): ?>
		<tr>
			<td class="text-center"><?php echo $sold['item_id']; ?></td>
			<td class="text-center"><?php echo $sold['item_quantity']; ?></td>
			<td class="text-center"><?php echo "₱ " . $sold['item_price']; ?></td>
			<td class="text-center"><?php echo $sold['date_paid']; ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="4">Total Income: <b><?php echo "₱ " . $total_price_sold; ?></b></td>
		</tr>
	</tfoot>
</table>
	