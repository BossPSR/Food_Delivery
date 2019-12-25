<!-- Section Contact -->
<section id="contact-detail" class=" padd-100">
<h2 class="section-title sep-type-2 text-center">รายละเอียดสินค้า</h2>
<div class="container newtable">
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
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
                    foreach ($orderDetailAll as $key => $orderDetail) {
                    $i += 1;
                ?>
                    <tr>
                        <th scope="row"><?php echo $i;?></th> 
                        <td><?php echo $orderDetail['name_item'];?></td>
                        <td><?php echo $orderDetail['qty'];?></td>
                        <td><?php echo $orderDetail['price_item'];?></td>
                    </tr>
                <?php } ?>
                    <tr>
                        <td colspan="2">**หมายเหตุนอกเขตนครปฐม ฿69.00</td>
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
                        <td><?php echo $orderAll['status'];?></td>
                    </tr>                    
                </tbody>
            </table>
        </div>

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