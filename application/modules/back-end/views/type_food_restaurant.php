    <!-- BEGIN: Content-->
 <?php $id_restaurant = $this->input->get('id') ?>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">ประเภทอาหาร</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="Admin_Restaurant">ร้านอาหาร</a>
                                    </li>
                                    <li class="breadcrumb-item active">ประเภทอาหาร
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
                        <table class="table data-thumb-view-type_food_restaurant">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>ชื่อประเภท</th>
                                    <th>เครื่องมือ</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $type_restaurant_type = $this->db->get('tbl_type_food')->result_array() ;?>
                             <?php foreach ($type_restaurant_type as $key => $type_restaurant_type) { ?>
                                <tr>
                                    <td></td>
                                    <td class="product-name"><?php echo $type_restaurant_type['type_food']  ?></td>
                                    <td class="product-action">
                                        <a href="Admin_Food?id=<?php echo $type_restaurant_type['id']; ?>&id_restaurant=<?php echo $id_restaurant; ?>"><span class="action-food"><i class="fa fa-cutlery"></i></span></a>
                                       
                                        
                                    </td>
                                </tr>
                                <?php } ?> 
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
                                    <h4 class="text-uppercase">ประเภทอาหาร</h4>
                                </div>
                                <div class="hide-data-sidebar">
                                    <i class="feather icon-x"></i>
                                </div>
                            </div>
                            <div class="data-items pb-3">
                                <div class="data-fields px-2 mt-3">
                                    <div class="row">

                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">ชื่อประเภท</label>
                                            <input type="text" class="form-control" id="data-name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                <div class="add-data-btn">
                                    <button class="btn btn-primary">เพิ่มข้อมูล</button>
                                </div>
                                <div class="cancel-data-btn">
                                    <button class="btn btn-outline-danger">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- add new sidebar ends -->
                </section>
                <!-- Data list view end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->