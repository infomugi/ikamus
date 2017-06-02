
<form method="post" id="profile_form" align="center" enctype="multipart/form-data"> 

    <div class="col-md-10 form-normal form-horizontal clearfix">

     <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="datetime">Create Time </label>
        </div>
        <div class="col-md-8 col-xs-12" data-toggle="tooltip" title="Create Time">
            <input type="text" class="form-control" name="create_time" id="create_time" placeholder="Create Time" value="<?php echo $create_time; ?>" readOnly="true"/>
            <?php echo form_error('create_time') ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="datetime">Update Time </label>
        </div>
        <div class="col-md-8 col-xs-12" data-toggle="tooltip" title="Update Time">
            <input type="text" class="form-control" name="update_time" id="update_time" placeholder="Update Time" value="<?php echo $update_time; ?>" readOnly="true"/>
            <?php echo form_error('update_time') ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="datetime">Visit Time </label>
        </div>
        <div class="col-md-8 col-xs-12" data-toggle="tooltip" title="Visit Time">
            <input type="text" class="form-control" name="visit_time" id="visit_time" placeholder="Visit Time" value="<?php echo $visit_time; ?>" readOnly="true"/>
            <?php echo form_error('visit_time') ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="varchar">Fullname </label>
        </div>
        <div class="col-md-8 col-xs-12" data-toggle="tooltip" title="Fullname">
            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Fullname" value="<?php echo $fullname; ?>" />
            <?php echo form_error('fullname') ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="varchar">Gender </label>
        </div>
        <div class="col-md-8 col-xs-12 text-left" data-toggle="tooltip" title="Gender">

            <input type="radio" name="gender" value="1" <?php 
            echo set_value('gender', $gender) == 1 ? "checked" : ""; 
            ?> /> 
            <label for="active">Laki-Laki</label>

            <input type="radio" name="gender" value="0" <?php 
            echo set_value('gender', $gender) == 0 ? "checked" : ""; 
            ?> /> 
            <label for="notactive">Perempuan</label>

            <?php echo form_error('gender') ?>
            
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="date">Birth </label>
        </div>
        <div class="col-md-8 col-xs-12" data-toggle="tooltip" title="Birth">
            <input type="text" class="form-control" name="birth" id="birth" placeholder="Birth" value="<?php echo $birth; ?>" />
            <?php echo form_error('birth') ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="varchar">Email </label>
        </div>
        <div class="col-md-8 col-xs-12" data-toggle="tooltip" title="Email">
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
            <?php echo form_error('email') ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="varchar">Username </label>
        </div>
        <div class="col-md-8 col-xs-12" data-toggle="tooltip" title="Username">
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
            <?php echo form_error('username') ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="int">Level </label>
        </div>
        <div class="col-md-8 col-xs-12 text-left" data-toggle="tooltip" title="Level">

            <input type="radio" name="level" value="1" <?php 
            echo set_value('level', $level) == 1 ? "checked" : ""; 
            ?> /> 
            <label for="superadmin">Superadmin</label>

            <input type="radio" name="level" value="2" <?php 
            echo set_value('level', $level) == 2 ? "checked" : ""; 
            ?> /> 
            <label for="admin">Admin</label>

            <input type="radio" name="level" value="3" <?php 
            echo set_value('level', $level) == 3 ? "checked" : ""; 
            ?> />             
            <label for="member">Member</label>
            <?php echo form_error('level') ?>

        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="int">Division </label>
        </div>
        <div class="col-md-8 col-xs-12 text-left" data-toggle="tooltip" title="Division">
           <?php
           $division_attribute = 'class="form-control"';
           echo form_dropdown('division', $get_division, $division, $division_attribute);
           ?>
           <?php echo form_error('division') ?>
       </div>
   </div>
   <div class="row form-group">
    <div class="col-sm-4 control-label col-xs-12">
        <label class="required" for="varchar">IP Address </label>
    </div>
    <div class="col-md-8 col-xs-12" data-toggle="tooltip" title="IP Address">
        <input type="text" class="form-control" name="ipaddress" id="ipaddress" placeholder="IP Address" value="<?php echo $ipaddress; ?>" readOnly="true"/>
        <?php echo form_error('ipaddress') ?>
    </div>
</div>
<div class="row form-group">
    <div class="col-sm-4 control-label col-xs-12">
        <label class="required" for="int">Active </label>
    </div>
    <div class="col-md-8 col-xs-12" data-toggle="tooltip" title="Active">
        <input type="text" class="form-control" name="active" id="active" placeholder="Active" value="<?php echo $active; ?>" readOnly="true"/>
        <?php echo form_error('active') ?>
    </div>
</div>
<div class="row form-group">
    <div class="col-sm-4 control-label col-xs-12">
        <label class="required" for="int">Status </label>
    </div>
    <div class="col-md-8 col-xs-12 text-left" data-toggle="tooltip" title="Status">

        <input type="radio" name="status" value="1" <?php 
        echo set_value('status', $status) == 1 ? "checked" : ""; 
        ?> /> 
        <label for="active">Aktif</label>

        <input type="radio" name="status" value="2" <?php 
        echo set_value('status', $status) == 2 ? "checked" : ""; 
        ?> /> 
        <label for="notactive">Tidak Aktif</label>

        <?php echo form_error('status') ?>

    </div>
</div>
<button type="submit" class="btn btn-primary pull-right"><?php echo $button ?></button> 
<input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
<a href="<?php echo site_url('user') ?>" class="btn btn-default pull-right">Cancel</a>
</div></form>

<script>  
 $(document).ready(function(){  
    $('#profile_form').on('submit', function(e){  
       e.preventDefault();  
       if($('#fullname').val() == '')  
       {  
         swal({
            title: 'Error!',
            text: 'Nama Lengkap tidak boleh Kosong',
            type: 'error',
            confirmButtonText: 'Kembali'
        });
     }else if($('#email').val() == ''){
       swal({
        title: 'Error!',
        text: 'Email tidak boleh Kosong',
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
            text: 'Profile berhasil di Perbaharui',
            type: 'success',
            confirmButtonText: 'Oke'
        });

        //   Push.create('Hello world!', {
        //     body: 'How\'s it hangin\'?',
        //     timeout: 4000,
        //     onClick: function () {
        //         console.log("Fired!");
        //         window.focus();
        //         this.close();
        //     },
        //     vibrate: [200, 100, 200, 100, 200, 100, 200]
        // });  
        
    }  
});  
  }  
});  
});  
</script>  