<style>

      #map {
		height: 250px;
		width: 100%
      }
    
</style>
<?php $adminLatLng = $this->db->get('tbl_admin')->row_array();?>
<script>
     function initMap() {
			var mapOptions = {
			  center: {lat: 13.847860, lng: 100.604274},
			  zoom: 18,
			}
				
			var maps = new google.maps.Map(document.getElementById("map"),mapOptions);
			
			infoWindow = new google.maps.InfoWindow;

			// Try HTML5 geolocation.
			if (navigator.geolocation) {
			  navigator.geolocation.getCurrentPosition(function(position) {
				var pos = {
				  lat: position.coords.latitude,
				  lng: position.coords.longitude
				};

				var R = 6371; // metres
				var φ1 = degrees_to_radians(<?php echo $adminLatLng['lat'] ?>);
				var φ2 = degrees_to_radians(pos.lat);
				var Δφ = degrees_to_radians(pos.lat-<?php echo $adminLatLng['lat'] ?>);
				var Δλ = degrees_to_radians(pos.lng-<?php echo $adminLatLng['lng'] ?>);

				var a = Math.sin(Δφ/2) * Math.sin(Δφ/2) +
						Math.cos(φ1) * Math.cos(φ2) *
						Math.sin(Δλ/2) * Math.sin(Δλ/2);
				var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));

				var d = R * c;

				if(d >= 0 && d <= 1.99){
					document.getElementById("delivery").innerHTML = 29;
					document.getElementById("formMap").deliveryValue.value = 29;
				}
				else if(d >= 2.00 && d <= 3.99){
					document.getElementById("delivery").innerHTML = 39;
					document.getElementById("formMap").deliveryValue.value = 39;
				}
				else if(d >= 4.00 && d <= 4.99){
					document.getElementById("delivery").innerHTML = 49;
					document.getElementById("formMap").deliveryValue.value = 49;
				}
				else if(d >= 5.00 && d <= 5.99){
					document.getElementById("delivery").innerHTML = 59;
					document.getElementById("formMap").deliveryValue.value = 59;
				}
				else if(d >= 6.00 && d <= 6.99){
					document.getElementById("delivery").innerHTML = 69;
					document.getElementById("formMap").deliveryValue.value = 69;
				}
				else if(d >= 7.00 && d <= 7.99){
					document.getElementById("delivery").innerHTML = 79;
					document.getElementById("formMap").deliveryValue.value = 79;
				}
				else if(d >= 8.00 && d <= 8.99){
					document.getElementById("delivery").innerHTML = 89;
					document.getElementById("formMap").deliveryValue.value = 89;
				}
				else if(d >= 9.00 && d <= 9.99){
					document.getElementById("delivery").innerHTML = 99;
					document.getElementById("formMap").deliveryValue.value = 99;
				}
				else if(d >= 10.00 && d <= 10.99){
					document.getElementById("delivery").innerHTML = 109;
					document.getElementById("formMap").deliveryValue.value = 109;
				}
				else if(d >= 11.00 && d <= 11.99){
					document.getElementById("delivery").innerHTML = 119;
					document.getElementById("formMap").deliveryValue.value = 119;
				}
				else if(d >= 12.00 && d <= 12.99){
					document.getElementById("delivery").innerHTML = 129;
					document.getElementById("formMap").deliveryValue.value = 129;
				}
				else if(d >= 13.00 && d <= 13.99){
					document.getElementById("delivery").innerHTML = 139;
					document.getElementById("formMap").deliveryValue.value = 139;
				}
				else if(d >= 14.00 && d <= 14.99){
					document.getElementById("delivery").innerHTML = 149;
					document.getElementById("formMap").deliveryValue.value = 149;
				}
				else if(d >= 15.00 && d <= 15.99){
					document.getElementById("delivery").innerHTML = 159;
					document.getElementById("formMap").deliveryValue.value = 159;
				}
				else if(d >= 16.00 && d <= 16.99){
					document.getElementById("delivery").innerHTML = 169;
					document.getElementById("formMap").deliveryValue.value = 169;
				}
				else if(d >= 17.00 && d <= 17.99){
					document.getElementById("delivery").innerHTML = 179;
					document.getElementById("formMap").deliveryValue.value = 179;
				}
				else if(d >= 18.00 && d <= 18.99){
					document.getElementById("delivery").innerHTML = 189;
					document.getElementById("formMap").deliveryValue.value = 189;
				}
				else if(d >= 19.00){
					document.getElementById("delivery").innerHTML = 199;
					document.getElementById("formMap").deliveryValue.value = 199;
				}

				console.log(d)

				document.getElementById("formMap").lat.value = pos.lat;
				document.getElementById('formMap').lng.value = pos.lng;

				marker = new google.maps.Marker({
					position: new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
					map: maps,
				});

				infoWindow.setPosition(pos);
				infoWindow.setContent('ที่อยู่ของคุณ');
				infoWindow.open(maps,marker);
				map.setCenter(pos);
			  }, function() {
				handleLocationError(true, infoWindow, map.getCenter());
			  });
			} else {
			  // Browser doesn't support Geolocation
			  handleLocationError(false, infoWindow, map.getCenter());
			}
			
		}

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }

	  function degrees_to_radians(degrees)
		{
		var pi = Math.PI;
		return degrees * (pi/180);
		}

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXknkzDUafgeyQ3WFBEHjHQUKoHfJ-og0&callback=initMap"
    async defer></script>

<!-- Section Contact -->
<section id="contact-detail" class=" padd-100">
	<h2 class="section-title sep-type-2 text-center">Order</h2>
	<div class="container">
		<div class="row">
		 	<?php if (!empty($this->cart->contents())) : ?>
			<form id="formMap" action="save_cart" method="post" enctype="multipart/form-data">
				<div class="col-sm-5">
					<div class="form-reservation">
						<input type="text" name="id" value="<?php echo $user['id'] ?>" hidden>
						<h3 style="color:#25282b;">สถานที่จัดส่ง</h3>
						<hr>
						<div class="column">
							<span style="font-size: 17px;">แผนที่</span>
							
							<div id="map"></div>
							<!-- <div id="lat"></div>
							<div id="lng"></div> -->
							<input type="hidden" name="lat">
							<input type="hidden" name="lng">
						</div>
						
						<div class="column">
							<span style="font-size: 17px;">เบอร์โทร</span>
							<span style="width: 100%">
								<input type="text" name="tel" value="<?php echo $user['tel'] ?>" placeholder="เบอร์โทร" class="required-field" required>
							</span>
						</div>

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
									<!-- <td colspan="3">**หมายเหตุเฉพาะในเมื่อง นอกพื้นที่ลดค่าจัดส่ง 20%</td> -->
									<td colspan="3"></td>
									<th>ค่าจัดส่ง</th>
									<td><span id="delivery"></span> บาท</td>
								</tr> 

								<tr>
									<td colspan="3"><div id="showCoupon"></div></td>
									<th>คูปอง</th>
									<td><input class="form-control" type="text" id="coupon"></td>
								</tr>

								<tr>
									<td colspan="3"></td>
									<th>รวม</th>
									<td><?php echo $this->cart->format_number($this->cart->total()); ?> บาท</td>
								</tr>

								<tr class="newTotalCoupon" style="display:none;">
									<td colspan="3"></td>
									<th>รวมเมื่อใช้ส่วนลด</th>
									<td id="newTotal"></td>
									<input type="hidden" name="coupon" id="couponUser" value="">
									<input type="hidden" name="coupon_id" id="coupon_id" value="">
									<input type="hidden" name="deliveryValue" id="deliveryValue">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#coupon").keyup(function(){
			var coupon = $("#coupon").val();
			<?php if(isset($user['id'])){ ?>
				var user_id = <?php echo $user['id'] ?>;
			<?php }else{ ?>
				var user_id = 0;
			<?php }?>
			$.ajax({
				url:'checkCoupon',
				data:{
						coupon:coupon,
						user_id:user_id,
						
					 },
				success:function(response){
					response = JSON.parse(response);
					$('#showCoupon').html(response.status);
					$(".newTotalCoupon").css("display", "table-row");
					newTotal(response);
				}
			})
		});
	});

	function newTotal(coupon) {
        $.ajax({
            url:'newTotal',
			data:{
				coupon:coupon.price,
				coupon_id:coupon.coupon_id
			},
            success:function(response){
				response = JSON.parse(response);
                $('#newTotal').html(response.total + " บาท");
				$('#couponUser').val(response.coupon);
				$('#coupon_id').val(response.coupon_id);
            }
        })
    }


</script>