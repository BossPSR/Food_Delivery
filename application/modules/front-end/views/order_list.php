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
                        <?php $rider = $this->db->get_where('tbl_rider',['id' => $orderDetail['rider']])->row_array(); ?>
                        <?php if($orderDetail['rider'] == 0){?>
                            <td>-</td>
                        <?php }else{ ?>
                            <td><?php echo $rider['title'].$rider['first_name']." ".$rider['last_name']; ?></td>
                        <?php }?>
                        <?php if ($orderDetail['status'] == '0') : ?>
                            <td style="color:coral">กำลังตรวจสอบ</td>
                        <?php elseif ($orderDetail['status'] == '1') : ?>
                            <td style="color:yellowgreen">กำลังดำเนินงาน</td>
                        <?php elseif ($orderDetail['status'] == '2') : ?>
                            <td style="color:forestgreen">กำลังจัดส่งอาหาร</td>
                        <?php elseif ($orderDetail['status'] == '3') : ?>
                            <td style="color:green">จัดส่งเรียบร้อย</td>
                        <?php else : ?>
                            <td style="color:red">ยกเลิกรายการอาหาร</td>
                        <?php endif ?>
                       
                        <td><?php echo $orderDetail['total']; ?></td>
                    </tr>

                    <?php } ?>
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
</section>