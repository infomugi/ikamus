
<form method="post" id="password_form" align="center" enctype="multipart/form-data"> 
    <div class="col-md-10 form-normal form-horizontal clearfix">


        <div class="row form-group">
            <div class="col-sm-4 control-label col-xs-12">
                <label class="required" for="varchar">Password </label>
            </div>
            <div class="col-md-8 col-xs-12" data-toggle="tooltip" title="Password">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
                <?php echo form_error('password') ?>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary pull-right"><?php echo $button ?></button> 
        <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
        <a href="<?php echo site_url('user') ?>" class="btn btn-default pull-right">Cancel</a>
    </div></form>


    <script>  
       $(document).ready(function(){  
        $('#password_form').on('submit', function(e){  
         e.preventDefault();  
         if($('#password').val() == '')  
         {  
           swal({
            title: 'Error!',
            text: 'Silahkan tentukan terlebih dahulu',
            type: 'error',
            confirmButtonText: 'Kembali'
        });
       }  
       else  
       {  
          $.ajax({  
            url:"<?php echo $action; ?>",   
            method:"POST",  
            data:new FormData(this),  
            contentType: false,  
            cache: false,  
            processData:false,  
            success:function(data)  
            {  
              swal({
                title: 'Sukses!',
                text: 'Password berhasil di Perbaharui',
                type: 'success',
                confirmButtonText: 'Oke'
            });
          }  
      });  
      }  
  });  
    });  
</script>  