    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">อาหาร</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="Admin_Restaurant">ร้านอาหาร</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="Admin_Type_Food_Restaurant">ประเภทอาหาร</a>
                                    </li>
                                    <li class="breadcrumb-item active">อาหาร
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
                        <table class="table data-thumb-view-food">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>ลำดับ</th>
                                    <th>รูปภาพ</th>
                                    <th>ชื่ออาหาร</th>
                                    <th>ราคา</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td>1</td>
                                    <td class="product-img"><img src="public/backend/app-assets/images/elements/homepod.png" alt="Img placeholder">
                                    </td>
                                    <td class="product-name">Apple Watch series 4 GPS</td>
                                    <td class="product-price">$199.99</td>
                                    <td class="product-action">
                                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>2</td>
                                    <td class="product-img"><img src="public/backend/app-assets/images/elements/homepod.png" alt="Img placeholder">
                                    </td>
                                    <td class="product-name">Beats HeadPhones</td>
                                    <td class="product-price">$199.99</td>
                                    <td class="product-action">
                                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>3</td>
                                    <td class="product-img"><img src="public/backend/app-assets/images/elements/homepod.png" alt="Img placeholder">
                                    </td>
                                    <td class="product-name">Altec Lansing - Bluetooth Speaker</td>
                                    <td class="product-price">$199.99</td>
                                    <td class="product-action">
                                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>4</td>
                                    <td class="product-img"><img src="public/backend/app-assets/images/elements/homepod.png" alt="Img placeholder">
                                    </td>
                                    <td class="product-name">Aluratek - Bluetooth Audio Receiver</td>
                                    <td class="product-price">$199.99</td>
                                    <td class="product-action">
                                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>5</td>
                                    <td class="product-img"><img src="public/backend/app-assets/images/elements/homepod.png" alt="Img placeholder">
                                    </td>
                                    <td class="product-name">Aluratek - Bluetooth Audio Transmitter</td>
                                    <td class="product-price">$199.99</td>
                                    <td class="product-action">
                                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>6</td>
                                    <td class="product-img"><img src="public/backend/app-assets/images/elements/homepod.png" alt="Img placeholder">
                                    </td>
                                    <td class="product-name">Basis - Peak Fitness and Sleep Tracker</td>
                                    <td class="product-price">$199.99</td>
                                    <td class="product-action">
                                        <span class="action-edit"><i class="feather icon-edit"></i></span>
                                        <span class="action-delete"><i class="feather icon-trash"></i></span>
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
                                    <h4 class="text-uppercase">อาหาร</h4>
                                </div>
                                <div class="hide-data-sidebar">
                                    <i class="feather icon-x"></i>
                                </div>
                            </div>
                            <div class="data-items pb-3">
                                <div class="data-fields px-2 mt-3">
                                    <div class="row">

                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">ชื่ออาหาร</label>
                                            <input type="text" class="form-control" id="data-name">
                                        </div>
                                        
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">ราคา</label>
                                            <input type="number" class="form-control" id="data-name">
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