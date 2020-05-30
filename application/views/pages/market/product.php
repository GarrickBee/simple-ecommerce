<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<section class="container market-product">

	<div class="row wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
		<div class="col-md-6 mb-4 text-center">
			<?php
			echo "<img 
			src='{$product['images'][0]['src']}'
			srcset='{$product['images'][0]['src_small']} 150w,
					{$product['images'][0]['src_medium']} 250w,
					{$product['images'][0]['src_large']} 450w
			class='img-fluid'
			style='max-height:300px;object-fit:contain'
			alt='{$product['images'][0]['src']}' />"
			?>
		</div>

		<div class="col-md-6 mb-4">
			<div class="p-4">
				<!-- <p class="lead"><span>$100</span></p> -->
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<?php
					// print_r($product['variations']);
					for ($i = 0; sizeof($product['variations']); $i++) {
						$variation = $product['variations'][$i];
						$tabActive = $i == 1 ? 'active' : '';
					?>
						<li class="nav-item">
							<a class="nav-link " data-toggle="tab" href="#product-<?php echo $variation['id'] ?>" role="tab" aria-controls="product-<?php echo $variation['id'] ?>" aria-selected="false"><?php echo $variation['attributes']['name'] . ($i + 1) ?> </a>
						</li>
					<?php
					}
					?>
				</ul>
				<div class="tab-content">
					<?php
					for ($i = 0; sizeof($product['variations']); $i++) {
						$variation = $product['variations'][$i];
					?>
						<!-- <li class="nav-item">
							<a class="nav-link " data-toggle="tab" href="#product-<?php echo $variation['id'] ?>" role="tab" aria-controls="product-<?php echo $variation['id'] ?>" aria-selected="false">Home</a>
						</li> -->
						<div class="tab-pane fade" id="product-<?php echo $variation['id'] ?>" role="tabpanel">
							<?php print_r($variation); ?>
						</div>
					<?php
					}
					?>
				</div>

				<p class="lead font-weight-bold">Variation</p>
				<select class="mdb-select md-form">
					<option value="" disabled selected>Choose your option</option>
					<option value="1">Option 1</option>
					<option value="2">Option 2</option>
					<option value="3">Option 3</option>
				</select>

				<form class="d-flex justify-content-left">
					<!-- Default input -->
					<input type="number" value="1" aria-label="Search" class="form-control" style="width: 100px">
					<button class="btn btn-primary btn-md my-0 p waves-effect waves-light" type="submit">Add to cart
						<i class="fas fa-shopping-cart ml-1"></i>
					</button>
				</form>
			</div>
		</div>
	</div>
	<hr>
	<div class="row d-flex justify-content-center wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
		<div class="col-md-6 text-center">
			<h4 class="my-4 h4">Additional information</h4>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus suscipit modi sapiente illo soluta odit
				voluptates,
				quibusdam officia. Neque quibusdam quas a quis porro? Molestias illo neque eum in laborum.</p>
		</div>
	</div>

	<div class="row wow fadeIn" style="visibility: visible; animation-name: fadeIn;">

		<!--Grid column-->
		<div class="col-lg-4 col-md-12 mb-4">

			<img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/11.jpg" class="img-fluid" alt="">

		</div>
		<!--Grid column-->

		<!--Grid column-->
		<div class="col-lg-4 col-md-6 mb-4">

			<img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/12.jpg" class="img-fluid" alt="">

		</div>
		<!--Grid column-->

		<!--Grid column-->
		<div class="col-lg-4 col-md-6 mb-4">

			<img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/13.jpg" class="img-fluid" alt="">

		</div>
		<!--Grid column-->

	</div>

</section>