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

                                   <td class="product-price"><?php echo $orderDetail['code']; ?></td>
                                   <td class="product-price"><?php echo $orderDetail['status']; ?></td>
                                   <td class="product-price"><?php echo $orderDetail['total']; ?></td>
                                   <td class="product-action">
                                       <span data-toggle="modal" data-target="#exampleModal<?php echo $orderDetail['id'];?>"><i class="feather icon-edit" style="font-size: 25px;"></i></span>
                                   </td>
                               </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?php echo $orderDetail['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    
                                        <input type="hidden" class="form-control"  name="id" value="<?php echo $orderDetail['id'];?>">
                                            <div class="data-items pb-3">
                                                <div class="data-fields px-2 mt-3">
                                                    <div class="row">
                                                        <div class="col-sm-12 data-field-col">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="data-name">รหัสสั่งซื้อ</label>
                                                                    <div class="form-control" ><?php echo $orderDetail['code'];?></div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="data-name">ผู้ส่ง</label>
                                                                    <div class="form-control" ><?php echo $orderDetail['code'];?></div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="data-name">ราคารวม</label>
                                                                    <div class="form-control"><?php echo $orderDetail['total'];?></div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="data-name">รหัสสั่งซื้อ</label>
                                                                    <div class="form-control"></div>
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