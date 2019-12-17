	<br><br>
    
	<!-- Section Contact -->
    <section id="contact-detail" class=" padd-100">
			
			<h2 class="section-title sep-type-2 text-center">ล็อกอิน</h2>
		
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
					<form action="LoginMe" method="POST">
						<div class="form-reservation">
							
								<div class="column" style="display:flex; justify-content:center;">
									<span style="float:left; width:40%; padding-left:0;">
										<input type="email" name="email" class="form-controll" placeholder="Eamil" class="required-field" required>
									</span>
								</div>
								<div class="column" style="display:flex; justify-content:center;">
									<span style="float:left; width:40%; padding-left:0;">
										<input type="password" name="password" placeholder="Password" class="required-field" required>
									</span>
								</div>
								<p class="text-center padd-top-30">
									<button type="submit" class="btn-food button_food">ล็อกอิน</button>
								</p>
								
								</form>
								<div class="button_fb"> 
								<?php if(!empty($authURL)){ ?>
									<a href="<?php echo $authURL; ?>" class="fb btn-fb">
										<i class="fa fa-facebook fa-fw"></i> Login with Facebook
									</a>
									<?php }else{ ?>
                                        <?php } ?>
								</div>	
						
							
						</div>
						</form>
					</div>
				</div>
			</div>
		</section>