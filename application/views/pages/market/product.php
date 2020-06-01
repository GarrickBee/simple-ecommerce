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
				<!-- Variation Tab  -->
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<?php

					for ($i = 0; $i < sizeof($product['variations']); $i++) {
						$variation = $product['variations'][$i];
						$tabActive = $i == 0 ? 'active' : '';
						$tabToggle = ($i == 0);
					?>
						<li class="nav-item ">
							<a class="nav-link <?php echo $tabActive  ?>" data-toggle="tab" href="#product-<?php echo $variation['id'] ?>" role="tab" aria-controls="product-<?php echo $variation['id'] ?>" aria-selected="<?php echo $tabToggle ?>">
								<?php echo $variation['attributes'][0]['name'] . ' ' . ($i + 1) ?>
							</a>
						</li>
					<?php
					}
					?>
				</ul>
				<!-- Variation Content  -->
				<div class="tab-content">

					<?php
					// print_r($product['variations']);
					for ($i = 0; $i < sizeof($product['variations']); $i++) {
						$variation = $product['variations'][$i];
						$tabShow = $i == 0 ? 'show active' : '';
					?>
						<div class="tab-pane fade <?php echo $tabShow ?> " id="product-<?php echo $variation['id'] ?>" role="tabpanel">
							<p class="lead">RM <span><?php echo "{$variation['regular_price']} per {$variation['attributes']['0']['option']}"; ?></span></p>
							<form action="<?php echo base_url("market/order") ?>" method="POST">
								<!-- Product ID  -->
								<input type="hidden" name="product[id]" value="<?php echo $product['id'] ?>">
								<!-- Variation ID -->
								<input type="hidden" name="product[variationId]" value="<?php echo $variation['id'] ?>">
								<!-- Branch ID and Stock Count -->
								<label class=''>Quantity </label>
								<?php
								$max_quantity = 0;
								foreach ($variation['inventory'] as $branch) {
									$max_quantity += $branch['stock_quantity'];
								}
								echo "<input type='number' name='product[quantity]' class='form-control' max='{$max_quantity}' min='1' value='0'>";
								?>
								<button type="submit" class="btn btn-purple">Order Now</button>
							</form>
						</div>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<hr>
</section>