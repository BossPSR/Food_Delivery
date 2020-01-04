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
                                   <li class="breadcrumb-item"><a href="index.html">Home</a>
                                   </li>
                                   <li class="breadcrumb-item"><a href="#">Order List</a>
                                   </li>
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
                                foreach ($order as $key => $orderDetail) {

                                ?>
                                   <tr>
                                       <td></td>
                                       <td><?php echo $i; ?></td>
                                       <td class="product-name"><?php echo $orderDetail['code']; ?></td>
                                      
                                           <td class="product-name">
                                        <?php $order_type = $this->db->get_where('tbl_order_detail', ['id_order' => $orderDetail['id']])->row_array(); ?>
                                        <?php $restaurant_name = $this->db->get_where('tbl_restaurant', ['id' => $order_type['id_restaurant']])->result_array(); ?>
                                        <?php foreach ($restaurant_name as $key => $restaurant_name) { ?>
                                        <?php echo $restaurant_name['restaurant_name']; ?>
                                        <?php } ?>
                                            </td>
                                         
                                     
                                       <?php if ($orderDetail['rider'] == '0') : ?>
                                           <td class="product-price">ยังไม่มีผู้ส่ง</td>
                                       <?php else : ?>
                                        <?php $rider_name = $this->db->get_where('tbl_rider', ['id' => $orderDetail['rider']])->row_array(); ?>
                                           <td class="product-price"><?php echo $rider_name['title'].' '.$rider_name['first_name'].' '.$rider_name['last_name']; ?></td>

                                       <?php endif ?>

                                       <?php if ($orderDetail['status'] == '0') : ?>
                                    <td class="product-price">กำลังตรวจสอบ</td>
                                        <?php elseif($orderDetail['status'] == '1') : ?>
                                        <td class="product-price">กำลังดำเนินงาน</td>
                                    <?php elseif($orderDetail['status'] == '2') : ?> 
                                    <td class="product-price">กำลังจัดส่งอาหาร</td>
                                    <?php elseif($orderDetail['status'] == '3') : ?> 
                                        <td class="product-price">จัดส่งเรียบร้อย</td>
                                    <?php else : ?>
                                        <td class="product-price">ยกเลิกรายการอาหาร</td>
                                     <?php endif ?>
            

                                       <td class="product-price"><?php echo $orderDetail['total']; ?></td>
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
                                               <form action="edit_type_food" method="POST" class="form-horizontal">
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
                                                                               <?php if ($orderDetail['id_member'] == 0 && isset($orderDetail['id_facebook']) ) :  ?>
                                                                                <?php $facebook_name = $this->db->get_where('users', ['oauth_uid' => $orderDetail['id_facebook']])->result_array(); ?>
                                                                               <?php foreach ($facebook_name as $key => $facebook_name) { ?>
                                                                               <div class="form-control"><?php echo $facebook_name['first_name'].' '. $facebook_name['last_name'] ; ?></div>
                                                                               <?php }?>
                                                                                <?php else: ?>
                                                                               <?php $member_name = $this->db->get_where('tbl_member', ['id' => $orderDetail['id_member']])->result_array(); ?>
                                                                               <?php foreach ($member_name as $key => $member_name) { ?>
                                                                               <div class="form-control"><?php echo $member_name['first_name'].' '. $member_name['last_name'] ; ?></div>
                                                                               <?php }?>
                                                                               <?php endif ?>
                                                                           </div>
                                                                          
                                                                       </div>
                                                                       <div class="form-group">
                                                                           <div class="controls">
                                                                               <label for="data-name">สถานะ</label>
                                                                            
                                                                             <select class="form-control" name="id_status"  onchange="location = this.value;">
                                                                        
                                                                           
                                                                         <option value="Admin_Order_status?id_order=<?php echo $orderDetail['id']; ?>&id_status=1">กำลังดำเนินงาน</option>
                                                                         <option value="Admin_Order_status?id_order=<?php echo $orderDetail['id']; ?>&id_status=2">กำลังจัดส่งอาหาร</option>
                                                                         <option value="Admin_Order_status?id_order=<?php echo $orderDetail['id']; ?>&id_status=3">จัดส่งเรียบร้อย</option>
                                                                         <option value="Admin_Order_status?id_order=<?php echo $orderDetail['id']; ?>&id_status=4">ยกเลิกรายการอาหาร</option>

                                                              
                                                                        </select>
                                                                           </div>
                                                                       </div> 
                                                                       <div class="form-group">
                                                                           <div class="controls">
                                                                               <label for="data-name">รายการเมนู</label>
                                                                               <?php $order_type = $this->db->get_where('tbl_order_detail', ['id_order' => $orderDetail['id']])->result_array(); ?>
                                                                               <?php foreach ($order_type as $key => $order_type) { ?>
                                                                               <div class="form-control"><?php echo $order_type['name_item']; ?>  <?php echo $order_type['price_item']; ?> จำนวน  <?php echo $order_type['qty']; ?> </div>
                                                                               <?php }?>
                                                                           </div>
                                                                       </div>
                                                                       <div class="form-group">
                                                                           <div class="controls">
                                                                               <label for="data-name">ราคารวม</label>
                                                                               <div class="form-control"><?php echo $orderDetail['total']; ?></div>
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