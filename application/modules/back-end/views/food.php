    <!-- BEGIN: Content-->
    <?php $id_restaurant = $this->input->get('id_restaurant') ?>
    <?php $id_food = $this->input->get('id') ?>
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
                                    <th>รูปภาพ</th>
                                    <th>ชื่ออาหาร</th>
                                    <th>ราคา</th>
                                    <th>เครื่องมือ</th>
                                </tr>
                            </thead>
                            <tbody>
                    
                            <?php $food = $this->db->get_where('tbl_menu',['id_type_food' => $id_food])->result_array(); ?>
                            <?php foreach ($food as $key => $food) { ?>
                                <tr>
                                    <td></td>
                                    <td class="product-img"><img src="uploads/food/<?php echo $food['file_name'];?>" alt="Img placeholder">
                                    </td>
                                    <td class="product-name"><?php echo $food['name_menu'];?></td>
                                    <td class="product-price"><?php echo $food['price_menu'];?> บาท</td>
                                    <td class="product-action">
                                        <span data-toggle="modal" data-target="#exampleModal<?php echo $food['id'];?>"><i class="feather icon-edit" style="font-size:25px;"></i></span>
                                        <a href="delete_food?id=<?php echo $food['id'];?>&id_restaurant=<?php echo $id_restaurant; ?>&id_food=<?php echo $id_food; ?>"><span class="action-delete"><i class="feather icon-trash" style="font-size:25px;"></i></span></a>
                                    </td>
                                </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?php echo $food['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">อาหาร</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="food_edit_com" method="POST" class="form-horizontal" enctype="multipart/form-data" >
                                        <div class="modal-body">
                                    
                                        <input type="hidden" class="form-control"  name="id" value="<?php echo $food['id'];?>">
                                        <input type="hidden" class="form-control"  name="id_restaurant" value="<?php echo $id_restaurant ;?>">
                                        <input type="hidden" class="form-control"  name="id_food" value="<?php echo $id_food;?>">
                                            <div class="data-items pb-3">
                                                <div class="data-fields px-2 mt-3">
                                                    <div class="row">
                                                        <div class="col-sm-12 data-field-col">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="data-name">ชื่ออาหาร</label>
                                                                    <input type="text" class="form-control"  name="name_menu" value="<?php echo $food['name_menu'];?>" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 data-field-col">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="data-name">ราคา</label>
                                                                    <input type="number" class="form-control"  name="price_menu" value="<?php echo $food['price_menu'];?>" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 data-field-col">
                                                            <fieldset class="form-group">
                                                                <label for="basicInputFile">รูปภาพ</label>
                                                                <div class="custom-file">
                                                                    <input type="file" name="file_name" class="custom-file-input" onchange="readURL_edit<?php echo $food['id']; ?>(this);"  id="inputGroupFile01"/>
                                                                    <label class="custom-file-label" for="inputGroupFile01" style="overflow: hidden;">กรุณาเลือกไฟล์</label>
                                                                    <div style="width: 115px;margin: 15px auto 0;">
                                                                    <img id="blah_edit<?php echo $food['id']; ?>" style="max-width:100%;" src="uploads/food/<?php echo $food['file_name']; ?>" alt="" />
                                                                    </div>
                                                                </div>
                                                            </fieldset>
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

                            <script type="text/javascript">
                                function readURL_edit<?php echo $food['id']; ?>(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();

                                        reader.onload = function (e) {
                                            $('#blah_edit<?php echo $food['id']; ?>').attr('src', e.target.result);
                                        }

                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                            </script>
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
                                    <h4 class="text-uppercase">อาหาร</h4>
                                </div>
                                <div class="hide-data-sidebar">
                                    <i class="feather icon-x"></i>
                                </div>
                            </div>
                            <form action="food_add_com" method="POST" enctype="multipart/form-data">
                            <div class="data-items pb-3">
                                <div class="data-fields px-2 mt-3">
                                    <div class="row">
                                    <input type="text" name="id_food" value="<?php echo $id_food ?>"hidden >
                                <input type="text" name="id_restaurant" value="<?php echo $id_restaurant ?>" hidden >
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">ชื่ออาหาร</label>
                                            <input type="text" class="form-control" name="name_menu" required>
                                        </div>
                                        
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">ราคา</label>
                                            <input type="number" class="form-control" name="price_menu" required>
                                        </div>
                                        <div class="col-lg-12 col-md-12 data-field-col">
                                                <fieldset class="form-group">
                                                    <label for="basicInputFile">รูปร้านอาหาร</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="file_name" class="custom-file-input" onchange="readURL(this);"  id="inputGroupFile01"/>
                                                        <label class="custom-file-label" for="inputGroupFile01" style="overflow: hidden;">กรุณาเลือกไฟล์</label>
                                                        <div style="width: 115px;margin: 15px auto 0;">
                                                            <img id="blah" style="max-width:100%;" src="" alt="" />
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>

                                    </div>
                                </div>
                            </div>
                            <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                <div class="add-data-btn">
                                    <button class="btn btn-primary">เพิ่มข้อมูล</button>
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
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <!-- END: Content-->