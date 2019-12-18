    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">ร้านอาหาร</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">ร้านอาหาร
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
                        <table class="table data-thumb-view-restaurant">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>รูปภาพ</th>
                                    <th>ชื่อร้าน</th>
                                    <th>ประเภทร้านอาหาร</th>
                                    <th>สถานะ</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td class="product-img"><img src="public/backend/app-assets/images/elements/apple-watch.png" alt="Img placeholder">
                                    </td>
                                    <td class="product-name">Apple Watch series 4 GPS</td>
                                    <td class="product-name">ร้านของหวาน</td>
                                    <td>
                                        <div class="chip chip-warning">
                                            <div class="chip-body">
                                                <div class="chip-text">on hold</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-action">
                                        <a href="Admin_Type_Food_Restaurant"><span class="action-food"><i class="fa fa-cutlery" style="font-size: 25px;"></i></span></a>
                                        <span class="action-edit"><i class="feather icon-edit" style="font-size: 25px;"></i></span>
                                        <span class="action-delete"><i class="feather icon-trash" style="font-size: 25px;"></i></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="product-img"><img src="public/backend/app-assets/images/elements/magic-mouse.png" alt="Img placeholder">
                                    </td>
                                    <td class="product-name">Beats HeadPhones</td>
                                    <td class="product-name">ร้านของหวาน</td>
                                    <td>
                                        <div class="chip chip-success">
                                            <div class="chip-body">
                                                <div class="chip-text">Delivered</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-action">
                                        <a href="Admin_Type_Food_Restaurant"><span class="action-food"><i class="fa fa-cutlery" style="font-size: 25px;"></i></span></a>
                                        <span class="action-edit"><i class="feather icon-edit" style="font-size: 25px;"></i></span>
                                        <span class="action-delete"><i class="feather icon-trash" style="font-size: 25px;"></i></span>
                                    </td>
                                </tr>
                               
   


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
                                    <h4 class="text-uppercase">ร้านอาหาร</h4>
                                </div>
                                <div class="hide-data-sidebar">
                                    <i class="feather icon-x"></i>
                                </div>
                            </div>
                            <div class="data-items pb-3">
                                <div class="data-fields px-2 mt-3">
                                    <div class="row">

                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">ประเภทร้านอาหาร</label>
                                            <select class="form-control" name="title">
                                                <option value="">ร้านของหวาน</option>
                                                <option value="">ร้านอาหารทะเล</option>
                                                <option value="">ร้านเส้น</option>
                                                <option value="">ร้านอาหารตามสั่ง</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">ชื่อร้าน</label>
                                            <input type="text" class="form-control" id="data-name">
                                        </div>

                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">เจ้าของร้าน</label>
                                            <input type="text" class="form-control" id="data-name">
                                        </div>

                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">เบอร์โทรติดต่อ</label>
                                            <input type="text" class="form-control" id="data-name">
                                        </div>

                                        
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">อีเมล</label>
                                            <input type="email" class="form-control" id="data-name">
                                        </div>

                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">เวลาเปิด</label>
                                            <input type="text" class="form-control pickatime">
                                        </div>

                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">เวลาปิด</label>
                                            <input type="text" class="form-control pickatime">
                                        </div>

                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">ที่อยู่</label>
                                            <textarea class="form-control" cols="30" rows="10"></textarea>
                                        </div>

                                       
                                        
                                       
                                        <div class="col-sm-12 data-field-col data-list-upload">
                                            <form action="#" class="dropzone dropzone-area" id="dpz-single-file">
                                                <div class="dz-message">Upload Image</div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                <div class="add-data-btn">
                                    <button class="btn btn-primary">Add Data</button>
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