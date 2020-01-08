	
		<!-- Section Main -->
		<section id="breadcrumb" data-background="" class="parallax-window">
			<div>
				<span class="section-suptitle text-center">Food Lover</span>
				<h1 class="section-title white-font text-center">Promotion</h1>
				<ul>
					<li><a href="">Home</a></li>
					<li style="color:#fe58a4">Promotion</li>
				</ul>
			</div>
		</section>
		<!-- End Section Main -->
		
		<!-- Section Contact -->
		<section id="blog" class="padd-100">
			<h2 class="sr-only">Blog</h2>
			<div class="container">
				<div class="row">
					<?php 
							$i = 0;
							foreach ($promotion as $promotionDetail) {
							$i += 1;
						?>
					<div class="col-md-12">
						
						<article class="blog-item">
							<div class="col-md-4">
								<div class="entry-thumbnail text-center" style="height: 282px; overflow: hidden;display: flex;justify-content: center;align-items: center;">

									<img src="uploads/promotion/<?php echo $promotionDetail['file_name']; ?>" alt="" class="" style="max-width:100%;">

								</div>
							</div>
							<div class="col-md-8">
								<div class="post-content">
									<h2 class="entry-title">
										<?php echo $promotionDetail['name_promotion']; ?>
									</h2>
									<div class="entry-content">
										<ul class="meta">
											<li>
												<i class="fa fa-user" aria-hidden="true"></i>
												<span>My Admin</span>
											</li>
											<li>
												<i class="fa fa-clock-o" aria-hidden="true"></i>
												<span><?php echo $promotionDetail['create_at'];?></span>
											</li>
											
										</ul>
										<p class="extrait-post">
											<?php 
												$detailPromotion = $promotionDetail['details'];
											if (strlen($detailPromotion) > 200){
													$detailPromotion = mb_substr($detailPromotion,0,200,'UTF-8').'...';
											}
											echo $detailPromotion;
												
											?>
										</p>
										<a class="btn-read-more" href="promotion-single?id=<?php echo $promotionDetail['id']; ?>">Read More</a>
									</div>
								</div>
							</div>
							
						</article>
						</div>
							<?php 
								} 
							?>
						<!-- <div class="pagination sep-type-2">
							<ul>
								<li><a href="#" class="prev">previous </a></li>
								<li><a href="#" class="active">1</a></li>
								<?php if($i >= 5){ ?>
									<li><a href="#">2</a></li>
								<?php } ?>
							
								<li><a href="#" class="next">Next</a></li>
							</ul>
						</div> -->
					
					
				</div>
			</div>
		</section>
		<!-- End Section Contact -->

