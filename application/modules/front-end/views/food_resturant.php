<section id="restaurant-menu" class="padd-100">
			<span class="section-suptitle text-center">Food Lover</span>
			<h2 class="section-title sep-type-2 text-center">
				resturant menu
			</h2>
			
			<div class="container">
				<div class="row">
					<ul class="restaurant-filter">
						<li><a href="" class="current" data-filter="">All dishes</a></li>
						<li><a href="" data-filter="dinner">dinner</a></li>
						<li><a href="" data-filter="lunch">lunch</a></li>
						<li><a href="" data-filter="drinks">drinks</a></li>
						<li><a href="" data-filter="starters">starters</a></li>
					</ul>
					<div class="restaurant-list">
						<div class="grid-sizer col-sm-6 col-md-4"></div>
						<div class="col-sm-6 col-md-4 grid-item" data-filter="drinks">
							<div>
								<div class="image_food"><img src="./public/assets/img/res1.png" alt=""></div>
								<span>Only $25</span>
								<h3>Chicken and Cashews</h3>
							</div>
						</div>
						<div class="col-sm-6 col-md-4 grid-item" data-filter="drinks">
							<div>
								<div class="image_food"><img src="./public/assets/img/res2.png" alt=""></div>
								<span>Only $25</span>
								<h3>Chicken and Cashews</h3>
							</div>
						</div>
						<div class="col-sm-6 col-md-4 grid-item" data-filter="dinner">
							<div>
								<div class="image_food"><img src="./public/assets/img/res1.png" alt=""></div>
								<span>Only $25</span>
								<h3>Chicken and Cashews</h3>
							</div>
						</div>
						<div class="col-sm-6 col-md-4 grid-item" data-filter="lunch">
							<div>
								<div class="image_food"><img src="./public/assets/img/res2.png" alt=""></div>
								<span>Only $25</span>
								<h3>Chicken and Cashews</h3>
							</div>
						</div>
						<div class="col-sm-6 col-md-4 grid-item" data-filter="lunch">
							<div>
								<div class="image_food"><img src="./public/assets/img/res1.png" alt=""></div>
								<span>Only $25</span>
								<h3>Chicken and Cashews</h3>
							</div>
						</div>
						<div class="col-sm-6 col-md-4 grid-item" data-filter="drinks">
							<div>
								<div class="image_food"><img src="./public/assets/img/res2.png" alt=""></div>
								<span>Only $25</span>
								<h3>Chicken and Cashews</h3>
							</div>
						</div>
						<div class="col-sm-6 col-md-4 grid-item" data-filter="lunch">
							<div>
								<div class="image_food"><img src="./public/assets/img/res1.png" alt=""></div>
								<span>Only $25</span>
								<h3>Chicken and Cashews</h3>
							</div>
						</div>
						<div class="col-sm-6 col-md-4 grid-item" data-filter="starters">
							<div>
								<div class="image_food"><img src="./public/assets/img/res2.png" alt=""></div>
								<span>Only $25</span>
								<h3>Chicken and Cashews</h3>
							</div>
						</div>
						<div class="col-sm-6 col-md-4 grid-item" data-filter="dinner">
							<div>
								<div class="image_food"><img src="./public/assets/img/res1.png" alt=""></div>
								<span>Only $25</span>
								<h3>Chicken and Cashews</h3>
							</div>
						</div>

					
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