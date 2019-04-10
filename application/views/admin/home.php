<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/home"> Dashboard </a></li>
	<li class="breadcrumb-item active"><?= $title; ?></li>
</ol>
<p>Date: <em><span id="date_time"></span></em></p>

<div class="row">
	<div class="col-xl-3 col-sm-6 mb-3">
		<div class="card text-white o-hidden h-100" style="background-color: #ff6600; box-shadow: 5px 5px 10px 1px rgba(0,0,0,0.4);">
			<div class="card-body" id="bg-primarynew">
				<div class="card-body-icon icon">
                    <i class="ni ni-circle-08"></i>
                </div>
                <h5 class="card-title text-uppercase text-white mb-0"> Registered Users: </h5>
				<span class="h2 font-weight-bold mb-0"><?php echo $count;?></span>
			</div>
			<a class="card-footer text-white clearfix small z-1" href="#" id="bg-primarynew2" title="View Details">
                <span class="float-left"> View Details </span>
                <span class="float-right">
                   	<i class="ni ni-curved-next"></i>
                </span>
            </a>
		</div>
	</div>

	<div class="col-xl-3 col-sm-6 mb-3">
		<div class="card text-white o-hidden h-100" style="background-color: #1167b1; box-shadow: 5px 5px 10px 1px rgba(0,0,0,0.4);">
			<div class="card-body" id="bg-primarynew">
				<div class="card-body-icon icon">
                    <i class="ni ni-shop"></i>
                </div>
                <h5 class="card-title text-uppercase text-white mb-0"> Total Items: </h5>
				<span class="h2 font-weight-bold mb-0"><?php echo $count_items;?></span>
			</div>
			<a class="card-footer text-white clearfix small z-1" href="#" id="bg-primarynew2" title="View Details">
                <span class="float-left"> View Details </span>
                <span class="float-right">
                   	<i class="ni ni-curved-next"></i>
                </span>
            </a>
		</div>
	</div>

	<div class="col-xl-3 col-sm-6 mb-3">
		<div class="card text-white o-hidden h-100" style="background-color: #50C878; box-shadow: 5px 5px 10px 1px rgba(0,0,0,0.4);">
			<div class="card-body" id="bg-primarynew">
				<div class="card-body-icon icon">
                    <i class="ni ni-active-40"></i>
                </div>
                <h5 class="card-title text-uppercase text-white mb-0"> Total Cart Only: </h5>
				<span class="h2 font-weight-bold mb-0"><?php echo $count_items_cart;?></span>
			</div>
			<a class="card-footer text-white clearfix small z-1" href="#" id="bg-primarynew2" title="View Details">
                <span class="float-left"> View Details </span>
                <span class="float-right">
                   	<i class="ni ni-curved-next"></i>
                </span>
            </a>
		</div>
	</div>

	<div class="col-xl-3 col-sm-6 mb-3">
		<div class="card text-white o-hidden h-100" style="background-color: #ED2929; box-shadow: 5px 5px 10px 1px rgba(0,0,0,0.4);">
			<div class="card-body" id="bg-primarynew">
				<div class="card-body-icon icon">
                    <i class="ni ni-check-bold"></i>
                </div>
                <h5 class="card-title text-uppercase text-white mb-0"> Sold Items: </h5>
				<span class="h2 font-weight-bold mb-0"><?php echo $count_items_sold;?></span>
			</div>
			<a class="card-footer text-white clearfix small z-1" href="<?php echo base_url(); ?>Admin/sold_items" id="bg-primarynew2" title="View Details">
                <span class="float-left"> View Details </span>
                <span class="float-right">
                   	<i class="ni ni-curved-next"></i>
                </span>
            </a>
		</div>
	</div>
</div>
<hr>

<br>