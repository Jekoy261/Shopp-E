<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"> Home </a></li>
	<li class="breadcrumb-item active"><?= $title; ?></li>
</ol>

<div class="card">
	<div class="card-body">
		<?php echo validation_errors(); ?>

		<?php echo form_open_multipart('categories/create'); ?>
<?php
	if (isset($categories_data)) {
		foreach($categories_data as $category_data):
?>
			<div class="form-group">
				<label> Category name </label>
				<input type="text" name="category_name" value="<?php echo $category_data['category_name']; ?>" class="form-control">
				<span class="text-danger"><?php echo form_error('category_name'); ?></span>
			</div>
			<input type="hidden" name="hidden_id" value="<?php echo $category_data['category_id']; ?>">
			<input type="submit" name="update" value="Update" class="btn btn-success">
<?php
		endforeach;
	} else {
?>
	
			<div class="form-group">
				<label> Category name </label>
				<input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter Category">
			</div>
			<input type="submit" name="insert" value="Submit" class="btn btn-danger" style="background-color: #ff6600; border: 0;">
<?php } ?>
		</form>	
	</div>
</div>
<br>

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th> Category Name </th>
			<th class="text-center"> Action </th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($categories as $category): ?>
			<tr>
				<td><?php echo $category['category_name']; ?></td>
				<td class="text-center">
					<a class="btn btn-success" name="update" href="<?php echo base_url(); ?>Categories/update_data/<?php echo $category['category_id']; ?>"> Edit </a>
					<a class="btn btn-danger" name="delete" href="<?php echo site_url('Categories/del/'.$category['category_id']) ?>" onclick="return confirm('Are you Sure?')"> Delete </a>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>