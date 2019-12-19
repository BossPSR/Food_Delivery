    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">ความคิดเห็นจากลูกค้า</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">บล๊อก
                                    </li>
                                    <li class="breadcrumb-item active">ความคิดเห็นจากลูกค้า
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
                <?php $contact = $this->db->get('tbl_contact')->result_array() ;?>
                <?php foreach ($contact as $key => $contact) { ?>
                    <div class="row my-3">
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $contact['subject'] ?></h4>
                                        <p class="card-text"><?php echo $contact['description'] ?></p>
                                        <p class="card-text"><?php echo $contact['email'].' Tel.'.$contact['tel'] ?></p>
                                        <p class="card-text"><small class="text-muted"><?php echo $contact['create_at'] ?></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php }  ?>
                </section>
                <!-- Card Captions and Overlay section end -->


            </div>
        </div>
    </div>
    <!-- END: Content-->