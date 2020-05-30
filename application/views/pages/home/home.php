<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<section class="container boost-catalogue">
	<div class="row wow fadeIn justify-content-center my-3">

		<div class="col-12 col-md-3">

		</div>
		<div class="col-12 col-md-9">
			<div class="row">
				<?php foreach ($products as $product) {
					if ($product['catalog_visibility'] !== 'visible') continue;
					if ($product['status'] !== 'publish') continue;
					// TODO: remove later
					// composite  
					// bundle
					if ($product['type'] !== 'variable') continue;
				?>
					<div class="col-12 col-md-4	  my-2">
						<div class="card">
							<!-- Product Image -->
							<div class="view overlay">
								<!-- <img width="175" height="175" src="https://handphoneworldfullfeatures.myboostorder.com/wp-content/uploads/sites/321/2016/12/HANTON_FULL_TOUC_54ab9556cd519_175x175.jpg" class="attachment-shop_single size-shop_single wp-post-image" alt="HANTON_FULL_TOUC_54ab9556cd519_175x175.jpg" title="HANTON_FULL_TOUC_54ab9556cd519_175x175.jpg" srcset="https://handphoneworldfullfeatures.myboostorder.com/wp-content/uploads/sites/321/2016/12/HANTON_FULL_TOUC_54ab9556cd519_175x175.jpg 175w, https://handphoneworldfullfeatures.myboostorder.com/wp-content/uploads/sites/321/2016/12/HANTON_FULL_TOUC_54ab9556cd519_175x175-150x150.jpg 150w" sizes="(max-width: 175px) 100vw, 175px"> -->
								<?php
								echo "<img srcset='{$product['images'][0]['src_small']} 1x,
									{$product['images'][0]['src_medium']} 2x,
									src='{$product['images'][0]['src']}'
									class='card-img-top px-1'
									style='max-height:150px;object-fit:contain' 
									alt='A rad wolf' />"
								?>
								<a>
									<div class="mask rgba-white-slight"></div>
								</a>
							</div>
							<!-- Product Description -->
							<div class="card-body">

								<h5 class="card-title"><?php echo $product['name'] ?> </h5>
								<hr>
								<?php
								// print_r($product['sale_price']);
								// print_r($product['status']);
								// print_r($product['sku']);
								// print_r($product['type']);
								// print_r($product['attributes']);
								// print_r($product['variations']);
								// print_r($product['bundled_by']);
								// print_r($product['bundled_items']);
								?>
								<!-- Text -->
								<p class="card-text">
									Some quick example text to build on the card title and make up the bulk of the card's
									content.
								</p>
								<!-- Link -->
								<a href="#!" class="black-text d-flex justify-content-end">
									<h5>Read more <i class="fas fa-angle-double-right"></i></h5>
								</a>

							</div>
						</div>
					</div>
				<?php
				}
				?>
			</div>
		</div>
		<?php $this->load->view('pages/home/pagination') ?>
	</div>
</section>