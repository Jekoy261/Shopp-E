<div class="row">
	<div class="col-8">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"> Home </a></li>
			<li class="breadcrumb-item active"><?= $title; ?></li>
		</ol>
	</div>
	<div class="col-4">
		<div class="input-group mb-3">
		  	<div class="input-group-prepend">
		    	<span class="input-group-text" id="basic-addon1">Search </span>
		  	</div>

		  	<input type="text" name="search_text" id="search_text" class="form-control form-control-lg" placeholder="Item Name">
		</div>
	</div>
</div>

<div class="row">
	<div class="col-4">
		<div class="card">
			<div class="card-body">

			<?php echo form_open_multipart('items/add_item'); ?>
				<div class="form-group">
					<label> Item name </label>
					<input type="text" class="form-control" name="item_name" placeholder="Enter Item">
					<span class="text-danger"><?php echo form_error('item_name'); ?></span>
				</div>
				<div class="form-group">
					<label> Item Description </label>
					<input type="text" class="form-control" name="item_description" placeholder="Enter Item Description">
					<span class="text-danger"><?php echo form_error('item_description'); ?></span>
				</div>
				<div class="form-group">
					<label> Item Image </label>
					<input type="file" class="form-control" required="" name="userfile" size="20">
					<span class="text-danger"><?php echo form_error('userfile'); ?></span>
				</div>

				<div class="form-group">
					<label> Select Category </label>
					<select name="category_id" class="form-control">
						<option value=""> Select Category </option>
						<?php foreach($categories as $category): ?> 
							<option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
						<?php endforeach; ?>
					</select>
					<span class="text-danger"><?php echo form_error('category_id'); ?></span>
				</div>
				<div class="form-group">
					<label> Item Quantity </label>
					<input type="number" class="form-control" name="item_quantity" placeholder="Enter Item Quantity">
					<span class="text-danger"><?php echo form_error('item_quantity'); ?></span>
				</div>
				<div class="form-group">
					<label> Item Price </label>
					<input type="number" class="form-control" name="item_price" placeholder="Enter Item Price">
					<span class="text-danger"><?php echo form_error('item_price'); ?></span>
				</div>
				<button type="submit" class="btn btn-danger" style="background-color: #ff6600; border: 0;"> Submit </button>
			</form>
			</div>
		</div>
	</div>

	<div class="col-8">
		<div class="row">
			<div class="col-8">
				<label class="text-success"><?=$success; ?></label>
			</div>
			<div class="col-4">
				<label class="text-danger pull-left"></label>
			</div>
		</div>
		
		<div id="result"></div>
	</div>
</div>

<br>

<script type="text/javascript">
	$(document).ready(function(){

		load_data();

		function load_data(query){
			$.ajax({
				url:"<?php echo base_url(); ?>Items/fetch",
				method: "POST",
				data:{query:query},
				success:function(data){
					$('#result').html(data);
				}
			})
		}

		$('#search_text').keyup(function(){
			var search = $(this).val();
			if (search != ''){

				load_data(search);

			} else {

				load_data();
			}
		});
	});
</script>