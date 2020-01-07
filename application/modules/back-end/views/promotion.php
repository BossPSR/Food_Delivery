    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">โปรโมชั่น</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">บล๊อก
                                    </li>
                                    <li class="breadcrumb-item active">โปรโมชั่น
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <a href="Admin_Blog_Promotion_Add" style="display:inline-block;">
                    <button type="button" class="btn btn-flat-primary border-primary text-primary">
                        <span><i class="feather icon-plus"></i>เพิ่มข้อมูลโปรโมชั่น</span>
                    </button>
                </a>
                <?php $promotion = $this->db->get('tbl_promotion')->result_array(); ?>
                <?php foreach ($promotion as $key => $promotion) { ?>
                <!-- Card Captions and Overlay section start -->
                <section id="card-caps">
                    <div class="row my-3" style="display: flex; justify-content: center;">
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <img class="card-img-top img-fluid" src="uploads/promotion/<?php echo $promotion['file_name'] ?>" alt="Card image cap" />
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $promotion['name_promotion'] ?></h4>
                                        <p class="card-text">
                                        
                                            <?php 
                                                $detailPromotion = $promotion['details'];
                                                if (strlen($detailPromotion) > 80){
                                                    $detailPromotion = mb_substr($detailPromotion,0,80,'UTF-8').'...';
                                               }
                                               echo $detailPromotion;
                                            ?>
                                            
                                        </p>
                                     
                                        <p class="card-text"><small class="text-muted"><?php echo $promotion['create_at'] ?></small></p>
                                        <span data-toggle="modal" data-target="#exampleModal<?php echo $promotion['id'];?>" style="display: inline-block; cursor: pointer;"><i class="feather icon-edit" style="font-size: 25px;"></i></span>
                                        <a href="id=<?php echo $promotion['id'];?>" style="color:#626262;"><span class="action-delete"><i class="feather icon-trash" style="font-size: 25px;"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $promotion['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">โปรโมชั่น</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="" method="POST" class="form-horizontal">
                                        <div class="modal-body">
                                    
                                        <input type="hidden" class="form-control"  name="id" value="<?php echo $promotion['id'];?>">
                                            <div class="data-items pb-3">
                                                <div class="data-fields px-2 mt-3">
                                                    <div class="row">
                                                        <div class="col-sm-12 data-field-col">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="data-name">ชื่อโปรโมชั่น</label>
                                                                    <input type="text" class="form-control"  name="type_name" value="<?php echo $promotion['name_promotion'];?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 data-field-col">
                                                                    <div class="form-group">
                                                                        <label for="data-name">รายละเอียดโปรโมชั่น</label>
                                                                        <textarea class="form-control" cols="30" rows="10" name="restaurant_address"><?php echo $promotion['details']; ?></textarea>
                                                                    </div>
                                                        </div>
                                                        <div class="col-lg-12 data-field-col">
                                                            <fieldset class="form-group">
                                                            <label for="basicInputFile">รูปภาพโปรโมชั่น</label>
                                                                <div class="custom-file">
                                                                    <input type="file" name="file_name" class="custom-file-input" onchange="readURL_edit<?php echo $promotion['id']; ?>(this);"  id="inputGroupFile01"/>
                                                                     <label class="custom-file-label" for="inputGroupFile01" style="overflow: hidden;"><?php echo $promotion['file_name']; ?></label>
                                                                    <div style="width: 215px;margin: 15px auto 0;">
                                                                        <img id="blah_edit<?php echo $promotion['id']; ?>" style="max-width:100%;" src="uploads/promotion/<?php echo $promotion['file_name']; ?>" alt="" />
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
                                            function readURL_edit<?php echo $promotion['id']; ?>(input) {
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();

                                                    reader.onload = function (e) {
                                                        $('#blah_edit<?php echo $promotion['id']; ?>').attr('src', e.target.result);
                                                    }

                                                    reader.readAsDataURL(input.files[0]);
                                                }
                                            }
                                        </script>
                       
                       
                </section>
                                <?php  } ?>

                <!-- Card Captions and Overlay section end -->


            </div>
        </div>
    </div>
    <!-- END: Content-->