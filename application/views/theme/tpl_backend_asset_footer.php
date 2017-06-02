<!-- build:js({.tmp,app}) scripts/app.min.js -->
<script src="<?php echo base_url(); ?>assets/scripts/helpers/modernizr.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/scripts/helpers/smartresize.js"></script>
<script src="<?php echo base_url(); ?>assets/scripts/constants.js"></script>
<script src="<?php echo base_url(); ?>assets/scripts/main.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/summernote/dist/summernote.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/summernote/lang/summernote-id-ID.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/locale/id.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>
<script src="<?php echo base_url(); ?>assets/scripts/helpers/noty-defaults.js"></script>

<script src="<?php echo base_url(); ?>assets/vendor/select2/dist/js/select2.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/jquery.tagsinput/src/jquery.tagsinput.js"></script>


<script type="text/javascript">
  // Input tags
  // $('#tags').tagsInput({
  // 	width: 'auto'
  // });

    // Select2 plugin
    $('.select2').select2();

    if($('.format-date').length > 0){
     $('.format-date').each(function(){
      var ini = $(this);
      var tgl = ini.text();
      moment.locale('id');
      if(moment(tgl,'YYYY-MM-DD',true).isValid() || moment(tgl,'YYYY-MM-DD HH:mm:ss',true).isValid()){
       var formatTgl = moment(tgl).fromNow();
       ini.html(formatTgl);
     }
   });
   }

   $(document).ready(function() {
     $('.summernote').summernote({
      height: 300,
      tabsize: 2,
    });
   });

   $(function () {
     $('[data-toggle="tooltip"]').tooltip()
   })
 </script>

 <!-- endbuild -->
