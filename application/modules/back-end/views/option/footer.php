<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2019<a class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent,</a>All rights Reserved</span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i class="feather icon-heart pink"></i></span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="public/backend/app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="public/backend/app-assets/vendors/js/extensions/dropzone.min.js"></script>
<script src="public/backend/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="public/backend/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="public/backend/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<script src="public/backend/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="public/backend/app-assets/vendors/js/tables/datatable/dataTables.select.min.js"></script>
<script src="public/backend/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
<script src="public/backend/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
<script src="public/backend/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
<script src="public/backend/app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
<script src="public/backend/app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
<script src="public/backend/app-assets/vendors/js/ui/prism.min.js"></script>
<script src="public/backend/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
<script src="public/backend/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
<script src="public/backend/app-assets/vendors/js/extensions/polyfill.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="public/backend/app-assets/js/core/app-menu.js"></script>
<script src="public/backend/app-assets/js/core/app.js"></script>
<script src="public/backend/app-assets/js/scripts/components.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="public/backend/app-assets/js/scripts/ui/data-list-view.js"></script>
<script src="public/backend/app-assets/js/scripts/pages/app-chat.js"></script>
<script src="public/backend/app-assets/js/scripts/pickers/dateTime/pick-a-datetime.js"></script>
<script src="public/backend/app-assets/js/scripts/extensions/dropzone.js"></script>
<script src="public/backend/app-assets/js/scripts/forms/form-tooltip-valid.js"></script>
<script src="public/backend/app-assets/js/scripts/forms/validation/form-validation.js"></script>
<script src="public/backend/app-assets/js/scripts/extensions/sweet-alerts.js"></script>
<!-- END: Page JS-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    <?php if ($suss = $this->session->flashdata('save_ss2')) : ?>
        swal("Good job!", '<?php echo $suss; ?>', "success");
    <?php endif; ?>
    <?php if ($error = $this->session->flashdata('del_ss2')) : ?>
        swal("Fail !", '<?php echo $error; ?>', "error");
    <?php endif; ?>
</script>



</body>
<!-- END: Body-->
<script src="public/backend/assets/fileupload/global.js" type="text/javascript"></script>
<script src="public/backend/assets/fileupload/js/uploadslider.js" type="text/javascript"></script>

</html>