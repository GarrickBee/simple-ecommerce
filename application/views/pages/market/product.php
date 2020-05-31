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
					// print_r($product['variations']);
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
					<form action="">


					</form>
					<?php
					for ($i = 0; $i < sizeof($product['variations']); $i++) {
						$variation = $product['variations'][$i];
						$tabShow = $i == 0 ? 'show active' : '';
					?>
						<div class="tab-pane fade <?php echo $tabShow ?> " id="product-<?php echo $variation['id'] ?>" role="tabpanel">
							<form action="">
								<p class="lead"><span><?php echo $variation['regular_price']; ?></span></p>
								<p class="lead"><span><?php echo $variation['id']; ?></span></p>
								<button type="button" class="btn btn-purple">Purple</button>
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