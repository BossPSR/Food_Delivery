<br><br>
<section class="menu_after_loginAll">
	<div class="menu_after_login">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<ul>
								<li class="menu_list_after">
									<a href="Profile" class="<?php if($this->uri->segment(1) == "Profile"){echo 'active';} ?>">ข้อมูลส่วนตัว</a>
									<a href="OrderList" class="<?php if($this->uri->segment(1) == "OrderList" || $this->uri->segment(1) == "OrderDetail"){echo 'active';} ?>">รายการอาหารล่าสุด</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
	</div>

</section>