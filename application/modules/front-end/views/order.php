<!-- Section Contact -->
<section id="contact-detail" class=" padd-100">
		<h2 class="section-title sep-type-2 text-center">Order</h2>
		    <div class="container">
				<div class="row">
					
					<form action="my_profile_save" method="post">
						<div class="col-sm-6">
						<div class="form-reservation">
							<input type="text" name="id" value="<?php echo $user['id'] ?>" hidden>                        
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
						</div>							
						</div>

						<div class="col-sm-6 order_table">
						<h3 style="color:#25282b;">รายการอาหาร</h3>
						<hr>
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th scope="col">ลำดับ</th>
										<th scope="col">เมนู</th>
										<th scope="col">ราคา</th>
										<th scope="col">จำนวน</th>
										<th scope="col">ราคารวม</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th scope="row">1</th>
										<td>Mark</td>
										<td>฿100</td>
										<td>2</td>
										<td>฿200</td>
									</tr>

									<tr>
										<td colspan="3">**หมายเหตุเฉพาะในเมื่อง นอกพื้นที่ลดค่าจัดส่ง 20%</td>
										<th>ค่าจัดส่ง</th>
										<td>฿15</td>
									</tr>
									<tr>
										<td colspan="3"></td>
										<th>รวม</th>
										<td>฿215</td>
									</tr>    
									      
								</tbody>
							</table>
						</div>
							<div>
								<input class="radio-inline" type="radio" name="a" id="">
								<span>ชำระเงินปลายทาง</span>
							</div>
							<div>
								<input class="radio-inline" type="radio" name="a" id="">
								<span>โอนเงินและแจ้งการชำระเงิน</span>
							</div>
							
						</div>				
				</form>
			
		</div>
	</div>
</section>