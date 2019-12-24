<!-- Section Contact -->
<section id="contact-detail" class=" padd-100">
	<h2 class="section-title sep-type-2 text-center">Order</h2>
	<div class="container">
		<div class="row">
		 	<?php if (!empty($this->cart->contents())) : ?>
			<form action="save_cart" method="post">
				<div class="col-sm-5">
					<div class="form-reservation">
						<input type="text" name="id" value="<?php echo $user['id'] ?>" hidden>
						<h3 style="color:#25282b;">สถานที่จัดส่ง</h3>
						<hr>
						<div class="column">
							<span style="font-size: 17px;">ที่อยู่</span>
							<span style="width: 100%">
								<input type="text" name="address" value="<?php echo $user['address'] ?>" placeholder="ที่อยู่" class="required-field" required>
							</span>
						</div>
						<div class="column">
							<span style="font-size: 17px;">จังหวัด</span>
							<span style="width: 100%">
								<input type="text" name="province" value="<?php echo $user['province'] ?>" placeholder="จังหวัด" class="required-field" required>
							</span>
						</div>
						<div class="column">
							<span style="font-size: 17px;">อำเภอ</span>
							<span style="width: 100%">
								<input type="text" name="amphur" value="<?php echo $user['amphur'] ?>" placeholder="อำเภอ" class="required-field" required>
							</span>
						</div>
						<div class="column">
							<span style="font-size: 17px;">ตำบล</span>
							<span style="width: 100%">
								<input type="text" name="district" value="<?php echo $user['district'] ?>" placeholder="ตำบล" class="required-field" required>
							</span>
						</div>
						<div class="column">
							<span style="font-size: 17px;">รหัสไปรษณีย์</span>
							<span style="width: 100%">
								<input type="text" name="zipcode" value="<?php echo $user['zipcode'] ?>" placeholder="รหัสไปรษณีย์" class="required-field" required>
							</span>
						</div>
					</div>
				</div>

				<div class="col-sm-7 order_table">
					<h3 style="color:#25282b;">รายการอาหาร</h3>
					<hr>
					<div class="table-responsive">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th style="width: 125px;" scope="col">รูป</th>
									<th scope="col">เมนู</th>
									<th scope="col">ราคา</th>
									<th scope="col">จำนวน</th>
									<th scope="col">ราคารวม</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($this->cart->contents() as $items) : ?>
									<?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
									<tr>
										<td><img src="uploads/food/<?php echo $items['file_name'] ?>"  alt="" style="width: 80px; height:80px"></td>
										<td><?php echo $items['name'] ?></td>
										<td><?php echo $this->cart->format_number($items['price']); ?> บาท</td>
										<td><?php echo $items['qty'] ?></td>
										<td><?php echo $this->cart->format_number($items['subtotal']); ?> บาท</td>
									</tr>
									<?php $i++; ?>
								<?php endforeach; ?>

								<tr>
									<td colspan="3">**หมายเหตุเฉพาะในเมื่อง นอกพื้นที่ลดค่าจัดส่ง 20%</td>
									<th>ค่าจัดส่ง</th>
									<td>15 บาท</td>
								</tr>
								<tr>
									<td colspan="3"></td>
									<th>รวม</th>
									<td><?php echo $this->cart->format_number($this->cart->total() + 15); ?> บาท</td>
								</tr>

							</tbody>
						</table>
					</div>
					<div>
						<input class="radio-inline" style="margin:0;" type="radio" name="payment" id="" required checked>
						<span>ชำระเงินปลายทาง</span>
					</div>
					<div style="margin-top: 15px;">
						<button type="submit" class="btn btn-success" style="width: 100%;font-size: 18px;">สั่งออเดอร์ของคุณ</button>
					</div>
					<!-- <div>
						<input class="radio-inline" type="radio" name="a" id="">
						<span>โอนเงินและแจ้งการชำระเงิน</span>
					</div> -->

				</div>
			</form>
			<?php else : ?>
				<div class="text-center">
					<h1 style="margin: 0;color: #fe58a4;font-size: 100px;">ไม่มีสินค้าในตะกร้า</h1>
					<h1>กรุณาลองเลือกอาหารร้านอื่นดูครับ</h1>
					<a href="index">เลือกอาหารร้านอื่นๆ</a>
				</div>
			<?php endif ; ?>

		</div>
	</div>
</section>