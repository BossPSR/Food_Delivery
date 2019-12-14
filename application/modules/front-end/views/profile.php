<br><br>
<?php $user = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array() ?>
<section class="menu_after_loginAll">
	<div class="menu_after_login">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<ul>
								<li class="menu_list_after">
									<a href="#">ข้อมูลส่วนตัว</a>
									<a href="#">รายการอาหารล่าสุด</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
	</div>

</section>
    
	<!-- Section Contact -->
    <section id="contact-detail" class=" padd-100">
		<h2 class="section-title sep-type-2 text-center">Profile</h2>
		    <div class="container">
				<div class="row">
					<div class="col-sm-12">
					<form action="my_profile_save" method="post">
						<div class="form-reservation">
							<input type="text" name="id" value="<?php echo $user['id'] ?>" hidden>
                                <h3 style="color:#25282b;">ข้อมูลส่วนตัว</h3>
                                <hr>
                                <div class="column">
									<span>
										<input type="text" name="first_name" value="<?php echo $user['first_name'] ?>" placeholder="ชื่อ" class="required-field">
									</span>
									<span>
										<input type="text" name="last_name" value="<?php echo $user['last_name'] ?>" placeholder="นามสกุล" class="required-field">
									</span>
							    </div>
								<div class="column">
									<span>
										<input type="date" name="birthday" value="<?php echo $user['birthday'] ?>" placeholder="วันเกิด" class="required-field">
									</span>
									<span>
										<input type="text" name="id_line" value="<?php echo $user['line'] ?>" placeholder="ไอดีไลน์" class="required-field">
									</span>
							    </div>
                                <div class="column">
									<span>
										<input type="text" name="phone" value="<?php echo $user['tel'] ?>" placeholder="เบอร์โทร" class="required-field">
									</span>
									<span>
										<input type="email" name="email" value="<?php echo $user['email'] ?>" placeholder="อีเมล" class="required-field">
									</span>
							    </div>
                               
                                <h3 style="color:#25282b;">สถานที่จัดส่ง</h3>
                                <hr>
                                <div class="column">
									<span>
										<input type="text" name="address" value="<?php echo $user['address'] ?>" placeholder="ที่อยู่" class="required-field">
									</span>
									<span>
										<input type="text" name="province" value="<?php echo $user['province'] ?>" placeholder="จังหวัด" class="required-field">
									</span>
							    </div>
                                <div class="column">
									<span>
										<input type="text" name="address" value="<?php echo $user['amphur'] ?>" placeholder="อำเภอ" class="required-field">
									</span>
									<span>
										<input type="text" name="district" value="<?php echo $user['district'] ?>" placeholder="ตำบล" class="required-field">
									</span>
							    </div>
                                
                                <div class="column">
                                    <span style="float:left;padding-left:0;padding-right: 8px;">
										<input type="text" name="zipcode" value="<?php echo $user['zipcode'] ?>" placeholder="รหัสไปรษณีย์" class="required-field">
									</span>
								</div>
								<h3 style="color:#25282b;">รหัสผ่าน</h3>
                                <hr>
                                <div class="column">
									<span>
										<input type="password" id="password" name="password" value="" placeholder="รหัสผ่าน" class="required-field">
									</span>
									<span>
										<input type="password" id="c_password" name="c_password" value="" placeholder="ยืนยันรหัสผ่าน" class="required-field">
									</span>
									<span id="message" ></span>
							    </div>
                          
                                
								<p class="text-center padd-top-30">
									<button type="submit" class="btn-food">Submit</button>
								</p>							
</form>
</section>