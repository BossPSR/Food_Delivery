<!-- Section Contact -->
<section id="contact-detail" class=" padd-100">
<h2 class="section-title sep-type-2 text-center">รายละเอียดสินค้า</h2>
<div class="container newtable">
    <div class="row">
        <div class="table-responsive" id="tablePrint">
            <div class="logo_deejung">
                <img src="public/backend/app-assets/images/logo/deejung.jpg">
            </div>
            
            <table class="table table-bordered table-hover gridtable">
                <thead>
                    <tr>
                        <th scope="col">ลำดับ</th>
                        <th scope="col">รายการ</th>
                        <th scope="col">จำนวน</th>
                        <th scope="col">ราคา</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $i = 0;
                    $restaurant = array();
                    foreach ($orderDetailAll as $key => $orderDetail) {
                    $i += 1;
                ?>
                    <tr>
                        <th scope="row"><?php echo $i;?></th> 
                        <td><?php echo $orderDetail['name_item'];?></td>
                        <td><?php echo $orderDetail['qty'];?></td>
                        <td><?php echo $orderDetail['price_item'];?></td>
                    </tr>
                    <?php 
                    
                        
                        $restaurant[] = $orderDetail['id_restaurant'];
                        
                    ?>
                <?php 
                    } 
                    $restaurant = array_unique($restaurant);
                    $addressRestaurant = $this->db->get_where('tbl_restaurant',['id' => $restaurant[0]])->row_array();
                ?>

                
                    <tr>
                        <td colspan="2" id="mark">**หมายเหตุนอกเขตนครปฐม ฿69.00**</td>
                        <th>ค่าจัดส่ง</th>
                        <td>฿15</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <th>รวม</th>
                        <td><?php echo $orderAll['total'];?></td>
                    </tr>    
                    <tr>
                        <td colspan="2"></td>
                        <th>สถานะ</th>
                        <?php if ($orderAll['status'] == '0') : ?>
                            <td>กำลังตรวจสอบ</td>
                        <?php elseif ($orderAll['status'] == '1') : ?>
                            <td>กำลังดำเนินงาน</td>
                        <?php elseif ($orderAll['status'] == '2') : ?>
                            <td>กำลังจัดส่งอาหาร</td>
                        <?php elseif ($orderAll['status'] == '3') : ?>
                            <td>จัดส่งเรียบร้อย</td>
                        <?php else : ?>
                            <td>ยกเลิกรายการอาหาร</td>
                        <?php endif ?>
                    </tr>                    
                </tbody>
            </table>
            
            <div class="orderData">
                <div class="col-xs-12 col-sm-12 col-md-1 col-lg-6">
                    <div>รหัสสั่งซื้อ <?php echo $orderAll['code']; ?></div>
                    <div>วันที่สั่งซื้อ <?php echo $orderAll['created_at']." น."; ?></div>
                    <div>ชื่อผู้สั่ง <?php echo $user['first_name']." ".$user['last_name']; ?></div>
                    <div>เบอร์ติดต่อ <?php echo $user['tel']; ?></div>
                    <div>สถานที่จัดส่ง <?php echo $orderAll['address']." ".$orderAll['district']." ".$orderAll['amphur']." ".$orderAll['province']." ".$orderAll['zipcode']; ?></div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-1 col-lg-6">
                    <div>ชื่อร้าน <?php echo $addressRestaurant['restaurant_name'];?></div>
                    <div>เบอร์ติดต่อ <?php echo $addressRestaurant['restaurant_tel']; ?></div>
                    <div>ที่อยู่ร้าน <?php echo $addressRestaurant['restaurant_address']; ?></div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-12">
                 <div><button onclick="PrintPanel('tablePrint');" class="btn btn-success waves-effect waves-light" id="buttonPrint"><i class="fa fa-print"></i></button></div>
            </div>
           
        </div>

        <script>
            function PrintPanel(tablePrint) {
                var restorepage = document.body.innerHTML;
                var printcontent = document.getElementById(tablePrint).innerHTML;
                document.body.innerHTML = printcontent;
                window.print();
                document.body.innerHTML = restorepage;
                
            }

        </script>
        
        
        <!-- <div class="col-xs-12 col-sm-12 col-md-1 col-lg-8">
            <div>ชื่อผู้สั่ง Nattaphon Jame</div>
            <div>เบอร์ติดต่อ 0925623256</div>
            <div>สถานที่จัดส่ง 123 ต.หาดใหญ่ อ.หาดใหญ่ จ.สงขลา 90110</div>
        </div> -->

        <!-- <div class="col-xs-12 col-sm-12 col-md-1 col-lg-4">
            <div>ชื่อบัญชี หจก.ชิมดู ดิลิเวอรี่</div>
            <div>ธนาคาร กสิกกรไทย เลขบัญชี 027-8-43246-7</div>
            <div>ธนาคาร กรุงศรี เลขบัญชี 720-1-08258-2</div>
            <div>ธนาคาร กรุงไทย เลขบัญชี 686-0-38322-4</div>
            <div>ธนาคาร กรุงเทพ เลขบัญชี 634-0-36079-8</div>
        </div> -->
    </div>
</div>
</section>