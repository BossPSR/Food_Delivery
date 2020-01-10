<section id="restaurant-menu" class="padd-100">
			<span class="section-suptitle text-center">Food Lover</span>
			<h2 class="section-title sep-type-2 text-center">
				<?php echo $resturant['restaurant_name']; ?>
			</h2>
			
			<div class="container">
				<div class="row">
					<ul class="restaurant-filter">
						<li class="form-group"><a href="" class="current" data-filter="">All dishes</a></li>
						<?php 
							$type_food = $this->db->get('tbl_type_food')->result_array();
							foreach ($type_food as $typeFood) {
						
						?>
						<li class="form-group"><a href="" data-filter="<?php echo $typeFood['id']; ?>"><?php echo $typeFood['type_food']; ?></a></li>
						<?php } ?>
					</ul>
					<div class="restaurant-list">
						<div class="grid-sizer col-sm-6 col-md-4"></div>
						<?php foreach ($menu as $menuDetail) { 
								$resturantCheckOpen = $this->db->get_where('tbl_restaurant',['id' => $menuDetail['id_restaurant']])->row_array();
								$current_timeMenu = date('H:i A');
								$sunriseMenu = $resturantCheckOpen['restaurant_open'];
								$sunsetMenu = $resturantCheckOpen['restaurant_close'];
								$date1Menu = DateTime::createFromFormat('H:i a', $current_timeMenu);
								$date2Menu = DateTime::createFromFormat('H:i a', $sunriseMenu);
								$date3Menu = DateTime::createFromFormat('H:i a', $sunsetMenu);
						?>
						<div class="col-sm-6 col-md-4 grid-item" data-filter="<?php echo $menuDetail['id_type_food'];  ?>">
								<?php 
									if ($date1Menu > $date2Menu && $date1Menu < $date3Menu)
									{ 
								?>

						     	<a href="add_cart?id=<?php echo $menuDetail['id'];  ?>">

							    <?php 
									}
								?>

							 <div>

							 	<?php 
									if ($date1Menu > $date2Menu && $date1Menu < $date3Menu)
									{ 
								?>

								<div class="image_food"><img src="uploads/food/<?php echo $menuDetail['file_name']; ?>" alt=""></div>
								
								<?php 
									}else{
								?>

								<div class="image_food" style="cursor:not-allowed;"><img src="uploads/food/<?php echo $menuDetail['file_name']; ?>" alt=""></div>

								<?php } ?>

								<span><?php echo $menuDetail['price_menu']; ?> บาท</span>
								<h3><?php echo $menuDetail['name_menu']; ?></h3>

								<?php 
									if ($date1Menu > $date2Menu && $date1Menu < $date3Menu)
									{ 
								?>

								<h3 style="color:green;">ร้านเปิด</h3>

								<?php 
									}else{
								?>

								<h3 style="color:red;">ร้านปิด</h3>

								<?php } ?>

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