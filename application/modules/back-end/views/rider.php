    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Rider List</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">Rider List
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
                        <table class="table data-thumb-view-rider">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>รูปภาพ</th>
                                    <th>ชื่อ</th>
                                    <!-- <th>เลขบัตรประชาชน</th> -->
                                    <th>เบอร์โทร</th>
                                    <!-- <th>อีเมล</th> -->
                                    <th>สถานะ</th>
                                    <th>เครื่องมือ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $rider = $this->db->get('tbl_rider')->result_array(); ?>
                                <?php foreach ($rider as $key => $rider) { ?>
                                    <tr>
                                        <td></td>
                                        <td class="product-img"><img src="uploads/rider/<?php echo $rider['file_name']; ?>" alt="Img placeholder"></td>
                                        <td class="product-name"><?php echo $rider['title'] . ' ' . $rider['first_name'] . ' ' . $rider['last_name'] ?></td>
                                        <!-- <td class="product-name"><?php echo $rider['id_card']; ?></td> -->
                                        <td class="product-name"><?php echo $rider['tel']; ?></td>
                                        <!-- <td class="product-name"><?php echo $rider['email']; ?></td> -->
                                        <td>
                                           <?php if ($rider['status'] == '1') { ?>
                                                 <!-- <div class="chip chip-success">
                                                    <div class="chip-body">
                                                        <div class="chip-text">ว่าง</div>
                                                    </div>
                                                </div>-->

                                            <div class="dropdown">
                                                <button class="btn btn-success dropdown-toggle mr-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    ว่าง
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="Admin_Rider_status?id=<?php echo $rider['id']; ?>&status=0">ไม่ว่าง</a>
                                                </div>
                                            </div> 

                                            <?php } else { ?>
                                                <!--
                                                <div class="chip chip-danger">
                                                    <div class="chip-body">
                                                        <div class="chip-text">ไม่ว่าง</div>
                                                    </div>
                                                </div>
                                                -->
                                            <div class="dropdown">
                                                <button class="btn btn-danger dropdown-toggle mr-1" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    ไม่ว่าง
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                    <a class="dropdown-item" href="Admin_Rider_status?id=<?php echo $rider['id']; ?>&status=1">ว่าง</a>
                                                </div>
                                            </div> 

                                            <?php } ?> 

                                        </td>
                                        <td class="product-action">
                                            <span data-toggle="modal" data-target="#exampleModal<?php echo $rider['id']; ?>"><i class="feather icon-edit" style="font-size:25px;"></i></span>
                                            <a href="Admin_Rider_delete?id=<?php echo $rider['id']; ?>"><span class="action-delete"><i class="feather icon-trash" style="font-size:25px;"></i></span></a>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal<?php echo $rider['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">ไรเดอร์</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="Admin_Rider_edit_com" method="POST" class="form-horizontal" enctype="multipart/form-data" novalidate>
                                                    <div class="modal-body">

                                                        <input type="hidden" class="form-control" name="id" value="<?php echo $rider['id']; ?>">                                                        
                                                        <div class="data-items pb-3">
                                                            <div class="data-fields px-2 mt-3">
                                                                <div class="row">
                                                                    <div class="col-sm-12 data-field-col">
                                                                        <div class="form-group">
                                                                            <label for="data-category">คำนำหน้า</label>
                                                                            <select class="form-control" name="title">
                                                                                <option value="นาย" <?php if ($rider['title'] == 'นาย') {echo 'selected';} ?>>นาย</option>
                                                                                <option value="นางสาว" <?php if ($rider['title'] == 'นางสาว') {echo 'selected';} ?>>นางสาว</option>
                                                                                <option value="นาง" <?php if ($rider['title'] == 'นาง') {echo 'selected';} ?>>นาง</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 data-field-col">
                                                                        <div class="form-group">
                                                                            <label for="data-name">ชื่อ</label>
                                                                            <input type="text" class="form-control" id="data-name" value="<?php echo $rider['first_name']; ?>" name="first_name" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 data-field-col">
                                                                        <div class="form-group">
                                                                            <label for="data-name">นามสกุล</label>
                                                                            <input type="text" class="form-control" id="data-name" value="<?php echo $rider['last_name']; ?>" name="last_name" required>
                                                                        </div>
                                                                   </div>
                                                                    <div class="col-sm-12 data-field-col">
                                                                        <div class="form-group">
                                                                            <label for="data-name">เลขบัตรประชาชน</label>
                                                                            <input type="text" class="form-control" id="data-name" value="<?php echo $rider['id_card']; ?>" name="id_card" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 data-field-col">
                                                                        <div class="form-group">
                                                                            <label for="data-name">เบอร์โทร</label>
                                                                            <input type="text" class="form-control" id="data-name" value="<?php echo $rider['tel']; ?>" name="tel" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 data-field-col">
                                                                        <div class="form-group">
                                                                            <label for="data-name">อีเมล</label>
                                                                            <input type="email" class="form-control" id="data-name" value="<?php echo $rider['email']; ?>" name="email" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 data-field-col">
                                                                        <fieldset class="form-group">
                                                                        <label for="basicInputFile">รูปไรเดอร์</label>
                                                                            <div class="custom-file">
                                                                                <input type="file" name="file_name" class="custom-file-input" onchange="readURL_edit<?php echo $rider['id']; ?>(this);"  id="inputGroupFile01"/>
                                                                                <label class="custom-file-label" for="inputGroupFile01" style="overflow: hidden;"><?php echo $rider['file_name']; ?></label>
                                                                                    <div style="width: 215px;margin: 15px auto 0;">
                                                                                        <img id="blah_edit<?php echo $rider['id']; ?>" style="max-width:100%;" src="uploads/rider/<?php echo $rider['file_name']; ?>" alt="" />
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
                                        <script type="text/javascript">
                                            function readURL_edit<?php echo $rider['id']; ?>(input) {
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();

                                                    reader.onload = function (e) {
                                                        $('#blah_edit<?php echo $rider['id']; ?>').attr('src', e.target.result);
                                                    }

                                                    reader.readAsDataURL(input.files[0]);
                                                }
                                            }
                                        </script>
                                        <!-- End Modal -->
                                    <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- dataTable ends -->

                    <!-- add new sidebar starts -->
                    <div class="add-new-data-sidebar">
                        <div class="overlay-bg"></div>
                        <div class="add-new-data" style="overflow-y: scroll;">
                            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                <div>
                                    <h4 class="text-uppercase">Rider</h4>
                                </div>
                                <div class="hide-data-sidebar">
                                    <i class="feather icon-x"></i>
                                </div>
                            </div>
                            <form action="Admin_Rider_com" method="POST" enctype="multipart/form-data">
                                <div class="data-items pb-3">
                                    <div class="data-fields px-2 mt-3">
                                        <div class="row">
                                            <div class="col-sm-12 data-field-col">
                                                <label for="data-category">คำนำหน้า</label>
                                                <select class="form-control" name="title">
                                                    <option value="นาย">นาย</option>
                                                    <option value="นางสาว">นางสาว</option>
                                                    <option value="นาง">นาง</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <label for="data-name">ชื่อ</label>
                                                <input type="text" class="form-control" id="data-name" name="first_name" required>
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <label for="data-name">นามสกุล</label>
                                                <input type="text" class="form-control" id="data-name" name="last_name" required>
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <label for="data-name">เลขบัตรประชาชน</label>
                                                <input type="text" class="form-control" id="data-name" name="id_card" required>
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <label for="data-name">เบอร์โทร</label>
                                                <input type="text" class="form-control" id="data-name" name="tel" required>
                                            </div>

                                            <div class="col-sm-12 data-field-col">
                                                <label for="data-name">อีเมล</label>
                                                <input type="email" class="form-control" id="data-name" name="email" required>
                                            </div>

                                            <div class="col-lg-12 col-md-12 data-field-col">
                                                <fieldset class="form-group">
                                                    <label for="basicInputFile">รูปไรเดอร์</label>
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
                                <div class="add-data-footer d-flex justify-content-around px-3 mt-2 form-group">
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
    <!-- END: Content-->
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