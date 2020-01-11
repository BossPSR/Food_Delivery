<style>

      .map {
		height: 250px;
		width: 100%
      }
    
</style>


   <!-- BEGIN: Content-->
   <div class="app-content content">
       <div class="content-overlay"></div>
       <div class="header-navbar-shadow"></div>
       <div class="content-wrapper">
           <div class="content-header row">
               <div class="content-header-left col-md-9 col-12 mb-2">
                   <div class="row breadcrumbs-top">
                       <div class="col-12">
                           <h2 class="content-header-title float-left mb-0">รายการอาหารล่าสุด</h2>
                           <div class="breadcrumb-wrapper col-12">
                               <ol class="breadcrumb">
                                   
                                   <li class="breadcrumb-item active">รายการอาหารล่าสุด
                                   </li>
                               </ol>
                           </div>
                       </div>
                   </div>
               </div>

           </div>
           <div class="content-body">
               <!-- Data list view starts -->
               <section id="data-list-view" class="data-list-view-header">
                   <div class="action-btns d-none">
                       <div class="btn-dropdown mr-1 mb-1">
                           <div class="btn-group dropdown actions-dropodown">
                               <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   Actions
                               </button>
                               <div class="dropdown-menu">
                                   <a class="dropdown-item" href="#"><i class="feather icon-trash"></i>Delete</a>
                                   <a class="dropdown-item" href="#"><i class="feather icon-archive"></i>Archive</a>
                                   <a class="dropdown-item" href="#"><i class="feather icon-file"></i>Print</a>
                                   <a class="dropdown-item" href="#"><i class="feather icon-save"></i>Another Action</a>
                               </div>
                           </div>
                       </div>
                   </div>

                   <!-- DataTable starts -->
                   <div class="table-responsive">
                       <table class="table data-list-view-order">
                           <thead>
                               <tr>
                                   <th></th>
                                   <th>ลำดับ</th>
                                   <th>รหัสสั่งซื้อ</th>
                                   <th>ร้าน</th>
                                   <th>ผู้ส่ง</th>
                                   <th>สถานะ</th>
                                   <th>ราคารวม</th>
                                   <th>เครื่องมือ</th>
                               </tr>
                           </thead>
                           <tbody>
                               <?php
                                $i = 1;
                                $round = [];
                                $lat = [];
                                $lng = [];
                                foreach ($order as $key => $orderDetail) {
                                    $round[] = $i;
                                    $lat[] = $orderDetail['lat'];
                                    $lng[] = $orderDetail['lng'];
                                ?>
                                   <tr>
                                       <td></td>
                                       <td><?php echo $i; ?></td>
                                       <td class="product-name"><?php echo $orderDetail['code']; ?></td>

                                       <td class="product-name">
                                            <?php $order_type = $this->db->get_where('tbl_order_detail', ['id_order' => $orderDetail['id']])->row_array(); ?>
                                           <?php $restaurant_name = $this->db->get_where('tbl_restaurant', ['restaurant_name' => $order_type['restaurant']])->row_array(); ?>
                                          
                                            <?php echo $restaurant_name['restaurant_name']; ?>
                                       </td>


                                       <?php if ($orderDetail['rider'] == '0') : ?>
                                           <td class="product-price">ยังไม่มีผู้ส่ง</td>
                                       <?php else : ?>
                                           <?php $rider_name = $this->db->get_where('tbl_rider', ['id' => $orderDetail['rider']])->row_array(); ?>
                                           <td class="product-price"><?php echo $rider_name['title'] . ' ' . $rider_name['first_name'] . ' ' . $rider_name['last_name']; ?></td>

                                       <?php endif ?>

                                       <?php if ($orderDetail['status'] == '0') : ?>
                                           <td class="product-price">กำลังตรวจสอบ</td>
                                       <?php elseif ($orderDetail['status'] == '1') : ?>
                                           <td class="product-price">กำลังดำเนินงาน</td>
                                       <?php elseif ($orderDetail['status'] == '2') : ?>
                                           <td class="product-price">กำลังจัดส่งอาหาร</td>
                                       <?php elseif ($orderDetail['status'] == '3') : ?>
                                           <td class="product-price">จัดส่งเรียบร้อย</td>
                                       <?php else : ?>
                                           <td class="product-price">ยกเลิกรายการอาหาร</td>
                                       <?php endif ?>

                                       
                                        <td class="product-price">
                                            <?php 
                                                if (!empty($orderDetail['vat'])) {
                                                    $totalPrice = $orderDetail['total'] + $orderDetail['vat'];
                                                    $totalPrice += $orderDetail['zip_price'];
                                                    if (!empty($orderDetail['coupon'])) {
                                                        $totalPrice -= $orderDetail['coupon'];
                                                    }
                                                    echo $totalPrice;
                                                }elseif (!empty($orderDetail['coupon'])) {
                                                    $totalPrice = $orderDetail['total'] - $orderDetail['coupon'];
                                                    $totalPrice += $orderDetail['zip_price'];
                                                    if (!empty($orderDetail['vat'])) {
                                                        $totalPrice += $orderDetail['vat'];
                                                    }
                                                    echo $totalPrice;
                                                }else{
                                                    $totalPrice = $orderDetail['total'];
                                                    $totalPrice += $orderDetail['zip_price'];
                                                    echo $totalPrice;
                                                }
                                            ?>
                                        </td>
                                        
                                       <td class="product-action">
                                           <span data-toggle="modal" data-target="#exampleModal<?php echo $orderDetail['id']; ?>"><i class="feather icon-edit" style="font-size: 25px;"></i></span>
                                       </td>
                                   </tr>

                                   <!-- Modal -->
                                   <div class="modal fade" id="exampleModal<?php echo $orderDetail['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                       <div class="modal-dialog" role="document">
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <h5 class="modal-title" id="exampleModalLabel">รายการอาหารล่าสุด</h5>
                                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                       <span aria-hidden="true">&times;</span>
                                                   </button>
                                               </div>
                                               <form action="Admin_Order_vat" method="POST" class="form-horizontal">
                                                   <div class="modal-body">

                                                       <input type="hidden" class="form-control" name="id" value="<?php echo $orderDetail['id']; ?>">
                                                       <div class="data-items pb-3">
                                                           <div class="data-fields px-2 mt-3">
                                                               <div class="row">
                                                                   <div class="col-sm-12 data-field-col">
                                                                       <div class="form-group">
                                                                           <div class="controls">
                                                                               <label for="data-name">รหัสสั่งซื้อ</label>
                                                                               <div class="form-control"><?php echo $orderDetail['code']; ?></div>
                                                                           </div>
                                                                       </div>
                                                                       <div class="form-group">
                                                                           <div class="controls">
                                                                               <label for="data-name">ชื่อลูกค้า</label>
                                                                               <?php if ($orderDetail['id_member'] == '0') : ?>
                                                                                   <div class="form-control">-</div>
                                                                               <?php else : ?>

                                                                                   <?php $member_name = $this->db->get_where('tbl_member', ['id' => $orderDetail['id_member']])->result_array(); ?>
                                                                                   <?php foreach ($member_name as $key => $member_name) { ?>
                                                                                       <div class="form-control"><?php echo $member_name['first_name'] . ' ' . $member_name['last_name']; ?></div>
                                                                                   <?php } ?>
                                                                               <?php endif ?>
                                                                           </div>

                                                                       </div>

                                                                       <div class="form-group">
                                                                           <div class="controls">
                                                                               <label for="data-name">สถานะ</label>
                                                                            
                                                                             <select class="form-control" name="id_status"  onchange="location = this.value;">
                                                                        
                                                                           
                                                                         <option value="Admin_Order_status?id_order=<?php echo $orderDetail['id']; ?>&id_status=1" <?php if($orderDetail['status'] == 1) echo 'selected'; ?>>กำลังดำเนินงาน</option>
                                                                         <option value="Admin_Order_status?id_order=<?php echo $orderDetail['id']; ?>&id_status=2" <?php if($orderDetail['status'] == 2) echo 'selected'; ?>>กำลังจัดส่งอาหาร</option>
                                                                         <option value="Admin_Order_status?id_order=<?php echo $orderDetail['id']; ?>&id_status=3" <?php if($orderDetail['status'] == 3) echo 'selected'; ?>>จัดส่งเรียบร้อย</option>
                                                                         <option value="Admin_Order_status?id_order=<?php echo $orderDetail['id']; ?>&id_status=4" <?php if($orderDetail['status'] == 4) echo 'selected'; ?>>ยกเลิกรายการอาหาร</option>

                                                              
                                                                        </select>
                                                                           </div>
                                                                       </div>
                                                                       
                                                                       <div class="form-group">
                                                                           <div class="controls">
                                                                               <label for="data-name">รายการเมนู</label>
                                                                               <?php $order_type = $this->db->get_where('tbl_order_detail', ['id_order' => $orderDetail['id']])->result_array(); ?>
                                                                               <?php foreach ($order_type as $key => $order_type) { 
                                                                                    $key += 1;   
                                                                                ?>
                                                                                   <div class="form-control" style="margin-bottom:5px;"><?php echo $key.'.'; ?> <?php echo $order_type['name_item']; ?> <?php echo $order_type['price_item']; ?> จำนวน <?php echo $order_type['qty']; ?> ราคารวม <?php echo $order_type['sumtotal']; ?></div>
                                                                               <?php

                                                                                } ?>
                                                                           </div>
                                                                       </div>

                                                                       <div class="form-group">
                                                                           <div class="controls">
                                                                               <label for="data-name">รายละเอียดเพิ่มเติม</label>
                                                                               <textarea class="form-control" cols="30" rows="10" aria-invalid="false" readonly><?php echo $orderDetail['detail']; ?></textarea>
                                                                           </div>
                                                                       </div>  

                                                                       <div class="form-group">
                                                                           <div class="controls">
                                                                               <label for="data-name">ค่าจัดส่ง</label>
                                                                                <div class="form-control"><?php echo $orderDetail['zip_price']; ?></div>
                                                                           </div>
                                                                       </div>

                                                                       <div class="form-group">
                                                                           <div class="controls">
                                                                               <label for="data-name">Vat+</label>
                                                                                <div class="form-control"><?php echo $orderDetail['vat']; ?></div>
                                                                           </div>
                                                                       </div>

                                                                       <div class="form-group">
                                                                           <div class="controls">
                                                                               <label for="data-name">คูปอง</label>
                                                                                <div class="form-control"><?php echo $orderDetail['coupon']; ?></div>
                                                                           </div>
                                                                       </div>
                                                             
                                                                       <div class="form-group">
                                                                           <div class="controls">
                                                                               <label for="data-name">ราคารวม</label>
                                                                               <div class="form-control">
                                                                                    <?php 
                                                                                       if (!empty($orderDetail['vat'])) {
                                                                                            $totalPrice = $orderDetail['total'] + $orderDetail['vat'];
                                                                                            $totalPrice += $orderDetail['zip_price'];
                                                                                            if (!empty($orderDetail['coupon'])) {
                                                                                                $totalPrice -= $orderDetail['coupon'];
                                                                                            }
                                                                                            echo $totalPrice;
                                                                                        }elseif (!empty($orderDetail['coupon'])) {
                                                                                            $totalPrice = $orderDetail['total'] - $orderDetail['coupon'];
                                                                                            $totalPrice += $orderDetail['zip_price'];
                                                                                            if (!empty($orderDetail['vat'])) {
                                                                                                $totalPrice += $orderDetail['vat'];
                                                                                            }
                                                                                            echo $totalPrice;
                                                                                        }else{
                                                                                            $totalPrice = $orderDetail['total'];
                                                                                            $totalPrice += $orderDetail['zip_price'];
                                                                                            echo $totalPrice;
                                                                                        }
                                                                                    ?>
                                                                                </div>
                                                                           </div>
                                                                       </div>

                                                                       <div class="form-group">
                                                                           <div class="controls">
                                                                               <label for="data-name">เบอร์โทร</label>
                                                                                <div class="form-control"><?php echo $orderDetail['tel']; ?></div>
                                                                           </div>
                                                                       </div>

                                                                       <div class="form-group">
                                                                           <div class="controls">
                                                                               <label for="data-name">ที่อยู่</label>
                                                                                <div class="form-control"><?php echo $orderDetail['address']; ?></div>
                                                                           </div>
                                                                       </div>

                                                                       <div class="form-group">
                                                                           <div class="controls">
                                                                               <label for="data-name">ตำบล</label>
                                                                                <div class="form-control"><?php echo $orderDetail['district']; ?></div>
                                                                           </div>
                                                                       </div>

                                                                       <div class="form-group">
                                                                           <div class="controls">
                                                                               <label for="data-name">อำเภอ</label>
                                                                                <div class="form-control"><?php echo $orderDetail['amphur']; ?></div>
                                                                           </div>
                                                                       </div>

                                                                       <div class="form-group">
                                                                           <div class="controls">
                                                                               <label for="data-name">จังหวัด</label>
                                                                                <div class="form-control"><?php echo $orderDetail['province']; ?></div>
                                                                           </div>
                                                                       </div>

                                                                       <div class="form-group">
                                                                           <div class="controls">
                                                                               <label for="data-name">รหัสไปรษณีย์</label>
                                                                                <div class="form-control"><?php echo $orderDetail['zipcode']; ?></div>
                                                                           </div>
                                                                       </div>

                                                                       <div class="form-group">
                                                                           <div class="controls">
                                                                               <label for="data-name">แผนที่</label>
                                                                               <div class="form-control map" id="map<?php echo $i;?>"></div>
                                                                           </div>
                                                                       </div>

                                                                       <div class="modal-footer">
                                                                           <div class="add-data-footer d-flex justify-content-around px-3 mt-2">


                                                                           </div>
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </div>



                                                   </div>
                                                   <div class="modal-footer">
                                                       <div class="add-data-footer d-flex justify-content-around px-3 mt-2">


                                                       </div>
                                                   </div>
                                               </form>
                                           </div>

                                       </div>
                                       <!-- End Modal -->


                                   <?php
                                    $i += 1;
                                }
                                    ?>


                           </tbody>
                       </table>
                   </div>
                   <!-- DataTable ends -->


               </section>
               <!-- Data list view end -->

           </div>
       </div>
   </div>
   <!-- END: Content-->

   <script>

  function initMap() {
 

 navigator.geolocation.getCurrentPosition(function(position) {
 
     
 <?php foreach ($round as $key => $round) { ?>  
    var directionsService<?php echo $round; ?> = new google.maps.DirectionsService();
    var directionsRenderer<?php echo $round; ?> = new google.maps.DirectionsRenderer();
     var posNow = [
                     {location:"ที่อยู่ของคุณ",lat: position.coords.latitude,lng: position.coords.longitude},
                     {location:"ที่อยู่ของลูกค้า",lat: <?php echo $lat[$key]; ?>,lng:<?php echo $lng[$key]; ?>}
                 ];
     var maps;
         maps = new google.maps.Map(document.getElementById('map<?php echo $round; ?>'), {
        center: {lat: 18.841, lng: 98.998},
         zoom: 18,
     });

     directionsRenderer<?php echo $round; ?>.setMap(maps);

     directionsService<?php echo $round; ?>.route(
            {
              origin: posNow[0].lat+','+  posNow[0].lng,
              destination:  posNow[1].lat+','+  posNow[1].lng,
              travelMode: 'DRIVING'
            },
            function(response, status) {
              if (status === 'OK') {
                directionsRenderer<?php echo $round; ?>.setDirections(response);
              } else {
                window.alert('Directions request failed due to ' + status);
              }
            }
            
     );
     

 <?php }  ?> 
 
 });//end navi               
     
}



    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }



</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXknkzDUafgeyQ3WFBEHjHQUKoHfJ-og0&callback=initMap"
    async defer></script>