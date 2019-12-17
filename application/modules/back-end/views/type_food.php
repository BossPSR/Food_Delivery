    <!-- BEGIN: Content-->
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
                                    <!-- <li class="breadcrumb-item"><a href="Admin_Restaurant">ร้านอาหาร</a>
                                    </li> -->
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
                        <table class="table data-thumb-view-type_food">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>ชื่อประเภท</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $type_food = $this->db->get('tbl_type_food')->result_array() ;?>
                            <?php foreach ($type_food as $key => $type_food) { ?>
                                <tr>
                                    <td></td>
                                    <td class="product-name"><?php echo $type_food['type_food']  ?></td>
                                    <td class="product-action">
                                        <!-- <a href="Admin_Food"><span class="action-food"><i class="fa fa-cutlery"></i></span></a> -->
                                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                             <a href="delete_type_food?id=<?php echo $type_food['id'];?>"><span class="action-delete"><i class="feather icon-trash"></i></span></a>
                                    </td>
                                </tr>
                                       
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
                                    <h4 class="text-uppercase">ประเภทอาหาร</h4>
                                </div>
                                <div class="hide-data-sidebar">
                                    <i class="feather icon-x"></i>
                                </div>
                            </div>
                            <div class="data-items pb-3">
                                <div class="data-fields px-2 mt-3">
                                    <div class="row">
                                <form action="Admin_Type_Food_com" method="POST">
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">ชื่อประเภท</label>
                                            <input type="text" class="form-control" name="type_name"  required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                <div class="add-data-btn">
                                    <button class="btn btn-primary">Add Data</button>
                                </div>
                                <div class="cancel-data-btn">
                                    <button class="btn btn-outline-danger">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    <!-- add new sidebar ends -->
                </section>
                <!-- Data list view end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->