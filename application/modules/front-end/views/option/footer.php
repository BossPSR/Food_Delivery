<!-- Footer -->
<footer id="site-footer">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-3">
						<div class="bloc-cms">
							<img src="assets/img/logo.png" alt="">
							<p>
								Lorem sit amet, ectetr iscinit. Vestibulum vel sum er, suscipieros quis by lorem.<br /><br />
								Sed ventis nisl a auris laoreet, at ncidnt lectus volutpat. Etiam...
							</p>
							<a href="">Read More</a>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="open-hours">
							<span class="foot-title">Opening Hours</span>
							<p><span>MONDAY :</span> Closed</p>
							<p><span>TUE - FRI : </span>................. 10 am - 9 pm</p>
							<p><span>SATURDAY : </span>.............. 10 am - 11 pm</p>
							<p><span>Sunday  : </span>.................. 10 am - 12 pm</p>
						</div>
					</div>
					<div class="col-md-3 hidden-sm hidden-xs">
						<div class="last-tweet">
							<span class="foot-title">Latest Tweets</span>
							<div class="item-tweet">
								<i class="fa fa-twitter"></i>
								<div>
									<p>Sed ventis nisl a au at ncidnt ctus volutpat. <a href="">https://twitter.com</a>
									</p>
									<span>
										2 Hours ago
									</span>
								</div>
							</div>
							<div class="item-tweet">
								<i class="fa fa-twitter"></i>
								<div>
									<p>Sed ventis nisl a au at ncidnt ctus volutpat. <a href="">https://twitter.com</a>
									</p>
									<span>
										2 Hours ago
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 hidden-sm hidden-xs">
						<div class="instagram">
							<span class="foot-title">Instragram</span>
							<a href="">
								<img src="./public/assets/img/food1.jpg" alt="">
								<i class="fa fa-instagram"></i>
							</a>
							<a href="">
								<img src="./public/assets/img/food1.jpg" alt="">
								<i class="fa fa-instagram"></i>
							</a>
							<a href="">
								<img src="./public/assets/img/food1.jpg" alt="">
								<i class="fa fa-instagram"></i>
							</a>
							<a href="">
								<img src="./public/assets/img/food1.jpg" alt="">
								<i class="fa fa-instagram"></i>
							</a>
							<a href="">
								<img src="./public/assets/img/food1.jpg" alt="">
								<i class="fa fa-instagram"></i>
							</a>
							<a href="">
								<img src="./public/assets/img/food1.jpg" alt="">
								<i class="fa fa-instagram"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-copyright">
				<p>
					Copyright 2016 © Food Lover Restaurant PSD Template
				</p>
				<a href="">Top</a>
			</div>
		</footer>
		<!-- End Footer -->

	</div>
	<!-- End Site Wrapper -->

	<!-- Contribute JS Files -->
	<!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> -->
	<script type="text/javascript" src="public/assets/js/egprojets.lib.js"></script>
	<!-- End Contribute JS Files -->

	<!-- Custom JS Files -->
	<script type="text/javascript" src="public/assets/js/egprojets.custom.js"></script>
	<!-- Custom JS Files -->
	<script type="text/javascript" src="public/assets/js/sweetalert.min.js"></script>
<script>
    <?php if($suss = $this->session->flashdata('save_ss2')): ?>
        swal("Good job!", '<?php echo $suss ; ?>' , "success");
    <?php endif; ?>
    <?php if($error = $this->session->flashdata('del_ss2')): ?>
        swal("Fail !", '<?php echo $error ; ?>' , "error");
    <?php endif; ?>
</script>
<script>
    $('#password, #c_password').on('keyup', function() {
        if ($('#password').val() == $('#c_password').val()) {
            $('#message').html('รหัสผ่านตรงกัน').css('color', 'green');
        } else
            $('#message').html('รหัสผ่านไม่ตรงกัน').css('color', 'red');
    });
</script>
</body>

</html>