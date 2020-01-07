
		<section id="lunch-menu" class="padd-100">
			<span class="section-suptitle text-center">Food Lover</span>
			<h2 class="section-title sep-type-2 text-center">ร้านอาหาร</h2>
			<ul class="restaurant-filter">
				<li class="form-group"><a href="" class="current" data-filter="">All dishes</a></li>
					<?php 
						$type_restaurant = $this->db->get('tbl_type_restaurant')->result_array();
						foreach ($type_restaurant as $typeRestaurant) {
						
					?>
				<li class="form-group"><a href="" data-filter="<?php echo $typeRestaurant['id']; ?>"><?php echo $typeRestaurant['type_restaurant']; ?></a></li>
					<?php } ?>
			</ul>
			<div class="container">
				<div class="row">
					<div class="menu-carousel vertical-carousel">


						<div class="restaurant-list">
							<div class="grid-sizer col-sm-6 col-md-4"></div>
							<?php foreach ($resturant as $resturantDetail) { ?>
							<div class="col-sm-6 col-md-4 grid-item" data-filter="<?php echo $resturantDetail['id_type_restaurant'];  ?>">
								<div>
									<a href="Food_Resturant?resturant_id=<?php echo $resturantDetail['id']; ?>"><div class="image_food"><img src="uploads/restaurant/<?php echo $resturantDetail['file_name']; ?>" alt=""></div></a>
									<h3><?php echo $resturantDetail['restaurant_name']; ?></h3>
									<span><?php echo $resturantDetail['restaurant_open']." - ".$resturantDetail['restaurant_close']; ?></span>
									
								</div>
							</div>
						<?php } ?>

					
						</div>
					</div>	
				</div>
			</div>
		</section>