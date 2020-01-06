    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">แก้ไขโปรไฟล์</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    
                                    <li class="breadcrumb-item active">แก้ไขโปรไฟล์
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="content-body">
                <!-- Card Captions and Overlay section start -->
                <section id="card-caps">
                    <div class="row my-3">
                        <div class="col-xl-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="col-sm-6 data-field-col data-list-upload m-auto">
                                            <div>
                                                <label for="data-name">ชื่อ</label>
                                                <div class="custom-file form-group">                 
                                                    <input type="text" class="form-control" id="data-name" value="<?php echo $profile['full_name']; ?>">
                                                </div>
                                            </div>
                                            
                                            <div>
                                                <label for="data-name">รูปภาพโปรไฟล์</label>
                                                <div class="custom-file form-group">
                                                    <input type="file" name="file_name" class="custom-file-input" id="inputGroupFile01" onchange="readURL(this);">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                    <div style="width: 115px;margin: 15px auto 0;">
                                                        <img id="blah" style="max-width:100%;" src="" alt="" />
                                                    </div>
                                                </div>
                                            </div>
                                           
                                           
                                            
                                            <div class="add-data-footer d-flex justify-content-around px-3 mt-5">
                                                <div class="add-data-btn">
                                                    <button class="btn btn-primary">Add Data</button>
                                                </div>
                                                <div class="cancel-data-btn">
                                                    <button class="btn btn-outline-danger">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Card Captions and Overlay section end -->


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