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
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
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
                        <span><i class="feather icon-plus"></i>เพิ่มข้อมูลโปรโมรชั่น</span>
                    </button>
                </a>
                <?php $promotion = $this->db->get('tbl_promotion')->result_array(); ?>
                <?php foreach ($promotion as $key => $promotion) { ?>
                <!-- Card Captions and Overlay section start -->
                <section id="card-caps">
                    <div class="row my-3">
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <img class="card-img-top img-fluid" src="uploads/promotion/<?php echo $promotion['file_name'] ?>" alt="Card image cap" />
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $promotion['name_promotion'] ?></h4>
                                        <p class="card-text"><?php echo $promotion['details'] ?></p>
                                     
                                        <p class="card-text"><small class="text-muted"><?php echo $promotion['create_at'] ?></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                       
                       
                </section>
                                <?php  } ?>

                <!-- Card Captions and Overlay section end -->


            </div>
        </div>
    </div>
    <!-- END: Content-->