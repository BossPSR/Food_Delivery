    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">คูปองส่วนลด</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <!-- <li class="breadcrumb-item"><a href="Admin_Restaurant">ร้านอาหาร</a>
                                    </li> -->
                                    <li class="breadcrumb-item active">คูปองส่วนลด
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <!-- Data list view starts -->
                <section id="data-thumb-view" class="data-thumb-view-header">

                    <!-- dataTable starts -->
                    <div class="table-responsive">
                        <table class="table data-thumb-view-coupon">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>ชื่อคูปอง</th>
                                    <th>รหัสคูปอง</th>
                                    <th>เครื่องมือ</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $coupon = $this->db->get('tbl_coupon')->result_array() ;?>
                            <?php foreach ($coupon as $key => $coupon) { ?>
                                <tr>
                                    <td></td>
                                    <td class="product-name"><?php echo $coupon['name_coupon'];  ?></td>
                                    <td class="product-name"><?php echo $coupon['code_coupon'];  ?></td>
                                    <td class="product-action">
                                        <!-- <a href="Admin_Food"><span class="action-food"><i class="fa fa-cutlery"></i></span></a> -->
                                        <span data-toggle="modal" data-target="#exampleModal<?php echo $coupon['id'];?>"><i class="feather icon-edit" style="font-size: 25px;"></i></span>
                                        <a href="delete_coupon?id=<?php echo $coupon['id'];?>"><span class="action-delete"><i class="feather icon-trash" style="font-size: 25px;"></i></span></a>
                                    </td>
                                </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?php echo $coupon['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">คูปองส่วนลด</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="edit_coupon_com" method="POST" class="form-horizontal">
                                        <div class="modal-body">
                                    
                                        <input type="hidden" class="form-control"  name="id" value="<?php echo $coupon['id'];?>">
                                            <div class="data-items pb-3">
                                                <div class="data-fields px-2 mt-3">
                                                    <div class="row">
                                                        <div class="col-sm-12 data-field-col">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="data-name">ชื่อคูปอง</label>
                                                                    <input type="text" class="form-control"  name="name_coupon" value="<?php echo $coupon['name_coupon'];?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 data-field-col">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="data-name">รหัสคูปอง</label>
                                                                    <input type="text" class="form-control"  name="code_coupon" value="<?php echo $coupon['code_coupon'];?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 data-field-col">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="data-name">ราคาที่จะลด</label>
                                                                    <input type="text" class="form-control"  name="price" value="<?php echo $coupon['price'];?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        

                                    
                                        </div>
                                        <div class="modal-footer">
                                            <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                                <div class="add-data-btn mr-1">
                                                    <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                    
                                </div>
                    <!-- End Modal -->
                               
                            <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- dataTable ends -->

                    <!-- add new sidebar starts -->
                    <div class="add-new-data-sidebar">
                        <div class="overlay-bg"></div>
                        <div class="add-new-data">
                            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                <div>
                                    <h4 class="text-uppercase">คูปองส่วนลด</h4>
                                </div>
                                <div class="hide-data-sidebar">
                                    <i class="feather icon-x"></i>
                                </div>
                            </div>
                            <form action="coupon_com" method="POST" class="form-horizontal" novalidate>

                                <div class="data-items pb-3">
                                    <div class="data-fields px-2 mt-3">
                                        <div class="row">
                                            <div class="col-sm-12 data-field-col">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="data-name">ชื่อคูปอง</label>
                                                        <input type="text" class="form-control"  name="name_coupon" required data-validation-required-message="กรุณากรอก ชื่อประเภทอาหารด้วยค่ะ">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="data-name">รหัสคูปอง</label>
                                                        <input type="text" class="form-control"  name="code_coupon" required data-validation-required-message="กรุณากรอก ชื่อประเภทอาหารด้วยค่ะ">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="data-name">ราคาที่จะลด</label>
                                                        <input type="text" class="form-control"  name="price" required data-validation-required-message="กรุณากรอก ชื่อประเภทอาหารด้วยค่ะ">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                    <div class="add-data-btn">
                                        <button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                    
                    <!-- add new sidebar ends -->

                   
                </section>
                <!-- Data list view end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->