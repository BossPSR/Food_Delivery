<!-- Section Contact -->
<section id="contact-detail" class=" padd-100">
<h2 class="section-title sep-type-2 text-center">รายการอาหารล่าสุด</h2>
<div class="container newtable">
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">ลำดับ</th>
                        <th scope="col">รหัสสั่งซื้อ</th>
                        <th scope="col">ผู้ส่ง</th>
                        <th scope="col">สถานะ</th>
                        <th scope="col">ราคารวม</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $i = 0;
                        foreach ($orderList as $orderDetail) {
                        $i += 1;
                    ?>
                    <tr>
                        <th scope="row"><?php echo $i; ?></th>
                        <td><a href="OrderDetail?id=<?php echo $orderDetail['id']; ?>"><?php echo $orderDetail['code']; ?></a></td>
                        <td><?php echo $orderDetail['rider']; ?></td>
                        <td><?php echo $orderDetail['status']; ?></td>
                        <td><?php echo $orderDetail['total']; ?></td>
                    </tr>

                    <?php } ?>
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
</section>