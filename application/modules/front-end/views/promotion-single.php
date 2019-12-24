
		<!-- Section Main -->
		<section id="breadcrumb" data-background="http://placehold.it/1920x1000" class="parallax-window">
			<div>
				<span class="section-suptitle text-center">Food Lover</span>
				<h1 class="section-title white-font text-center">Promotion Single</h1>
				<ul>
					<li><a href="">Home</a></li>
					<li style="color:#fe58a4">Promotion Single</li>
				</ul>
			</div>
		</section>
		<!-- End Section Main -->
		
		<!-- Section Contact -->
		<section id="blog" class="padd-100">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="blog-single">
							<div class="blog-item">
								<div class="entry-thumbnail text-center">
										<img src="uploads/promotion/<?php echo $promotion['file_name']; ?>" alt="" class="" style="max-width:100%;">
								</div>
								<div class="post-content">
									<h2 class="entry-title">
										<?php echo $promotion['name_promotion']; ?>
									</h2>
									<div class="entry-content">
										<ul class="meta">
											<li>
												<i class="fa fa-user" aria-hidden="true"></i>
												<span>My Admin</span>
											</li>
											<li>
												<i class="fa fa-clock-o" aria-hidden="true"></i>
												<span><?php echo $promotion['create_at'];?></span>
											</li>

										</ul>
										<p class="extrait-post">
										<?php 
										
											echo $promotion['details'];
											
										?>
										</p>
									</div>
								</div>
							</div>

							

							
						</div>
					</div>

				</div>
			</div>
		</section>
		<!-- End Section Contact -->