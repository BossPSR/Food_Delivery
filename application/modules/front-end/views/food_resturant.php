<section id="restaurant-menu" class="padd-100">
			<span class="section-suptitle text-center">Food Lover</span>
			<h2 class="section-title sep-type-2 text-center">
				<?php echo $resturant['restaurant_name']; ?>
			</h2>
			
			<div class="container">
				<div class="row">
					<ul class="restaurant-filter">
						<li><a href="" class="current" data-filter="">All dishes</a></li>
						<?php 
							$type_food = $this->db->get('tbl_type_food')->result_array();
							foreach ($type_food as $typeFood) {
						
						?>
						<li><a href="" data-filter="<?php echo $typeFood['id']; ?>"><?php echo $typeFood['type_food']; ?></a></li>
						<?php } ?>
					</ul>
					<div class="restaurant-list">
						<div class="grid-sizer col-sm-6 col-md-4"></div>
						<?php foreach ($menu as $menuDetail) { ?>
						<div class="col-sm-6 col-md-4 grid-item" data-filter="<?php echo $menuDetail['id_type_food'];  ?>">
							
						     <a href="Cart"><div>
								<div class="image_food"><img src="uploads/food/<?php echo $menuDetail['file_name']; ?>" alt=""></div>
								<span><?php echo $menuDetail['price_menu']; ?> บาท</span>
								<h3><?php echo $menuDetail['name_menu']; ?></h3>
							</div>
							</a>
						</div>
						<?php } ?>

					
					</div>
				</div>
			</div>
		</section>
<script>
	$(document).ready(function(){
		$(".image_food").click(function(){
			$("span").toggleClass("main");
		});
	});
</script>