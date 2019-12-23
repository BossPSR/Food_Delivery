    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">เพิ่มโปรโมชั่น</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">บล๊อก
                                    </li>
                                    <li class="breadcrumb-item"><a href="Admin_Blog_Promotion">โปรโมชั่น</a>
                                    </li>
                                    <li class="breadcrumb-item active">เพิ่มโปรโมชั่น
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <!-- Card Captions and Overlay section start -->
                <form action="promotion_add_com"  method="POST" enctype="multipart/form-data">
                <section id="card-caps">
                    <div class="row my-3">
                        <div class="col-xl-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="col-sm-6 data-field-col data-list-upload m-auto">
                                            <div class="form-group">
                                                <label for="data-name">ชื่อโปรโมชั่น</label>
                                                <input type="text" class="form-control" name="name_promotion" >
                                            </div>
                                            <div class="form-group">
                                                <label for="data-name">รายละเอียดโปรโมชั่น</label>
                                                <textarea class="form-control" cols="30" rows="10" name="details"></textarea>
                                            </div>
                                            
                                            <label for="data-name">รูปภาพโปรโมชั่น</label>
                                                <div class="custom-file">
                                                    <input type="file" name="file_name" ass="custom-file-input" onchange="readURL(this);"  id="inputGroupFile01">
                                                    <div class="form-group">
                                                        <label class="custom-file-label" for="inputGroupFile01" style="overflow: hidden;">กรุณาเลือกไฟล์</label>
                                                        <div style="width: 115px;margin: 30px auto 0;">
                                                            <img id="blah" style="max-width:100%;" src="" alt="" />
                                                        </div>
                                                    </div>
                                                </div>

                                            <div class="add-data-footer d-flex justify-content-around px-3 mt-5">
                                                <div class="add-data-btn">
                                                    <button class="btn btn-primary">เพิ่ม ข้อมูลโปรโมชั่น</button>
                                                </div>
                                               
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                </form>
                <!-- Card Captions and Overlay section end -->


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