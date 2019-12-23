
		<section id="lunch-menu" class="padd-100">
			<span class="section-suptitle text-center">Food Lover</span>
			<h2 class="section-title sep-type-2 text-center">Lunch Menu</h2>
			<div class="container">
				<div class="row">
					<div class="menu-carousel vertical-carousel">
						
						
					
						<div class="menu-item">
						<?php foreach ($resturant as $resturantDetail) {

						?>
							<div class="col-md-6">
								
								<div class="offer-item" style="background-color:#eee;">
								<a href="Food_Resturant?resturant_id=<?php echo $resturantDetail['id']; ?>">
									<img src="uploads/restaurant/<?php echo $resturantDetail['file_name']; ?>" alt="" class="img-responsive">
									<div>
										<h3><?php echo $resturantDetail['restaurant_name']; ?></h3>
										<p>
											<?php echo $resturantDetail['restaurant_open']." - ".$resturantDetail['restaurant_close']; ?>
										</p>
									</div>
								</a>
								</div>
								
								
							</div>
						<?php } ?>
							
						</div>
					</div>	
				</div>
			</div>
		</section>