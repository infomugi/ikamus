
<form action="<?php echo $action; ?>" method="post">
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
        <div class="col-md-8 col-xs-12" data-toggle="tooltip" title="Gender">
            <input type="text" class="form-control" name="gender" id="gender" placeholder="Gender" value="<?php echo $gender; ?>" />
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
            <label class="required" for="varchar">Password </label>
        </div>
        <div class="col-md-8 col-xs-12" data-toggle="tooltip" title="Password">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
            <?php echo form_error('password') ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="int">Level </label>
        </div>
        <div class="col-md-8 col-xs-12" data-toggle="tooltip" title="Level">
            <input type="text" class="form-control" name="level" id="level" placeholder="Level" value="<?php echo $level; ?>" />
            <?php echo form_error('level') ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="int">Division </label>
        </div>
        <div class="col-md-8 col-xs-12" data-toggle="tooltip" title="Division">
            <input type="text" class="form-control" name="division" id="division" placeholder="Division" value="<?php echo $division; ?>" />
            <?php echo form_error('division') ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="varchar">Image </label>
        </div>
        <div class="col-md-8 col-xs-12" data-toggle="tooltip" title="Image">
            <input type="text" class="form-control" name="image" id="image" placeholder="Image" value="<?php echo $image; ?>" />
            <?php echo form_error('image') ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="varchar">Ipaddress </label>
        </div>
        <div class="col-md-8 col-xs-12" data-toggle="tooltip" title="Ipaddress">
            <input type="text" class="form-control" name="ipaddress" id="ipaddress" placeholder="Ipaddress" value="<?php echo $ipaddress; ?>" />
            <?php echo form_error('ipaddress') ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="int">Active </label>
        </div>
        <div class="col-md-8 col-xs-12" data-toggle="tooltip" title="Active">
            <input type="text" class="form-control" name="active" id="active" placeholder="Active" value="<?php echo $active; ?>" />
            <?php echo form_error('active') ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="int">Status </label>
        </div>
        <div class="col-md-8 col-xs-12" data-toggle="tooltip" title="Status">
            <div class="cs-radio m-b">
                <?php
                echo form_radio('status','1',TRUE).'Aktif ';
                echo form_radio('status','0').'Tidak Aktif';
                ?>                
            </div>           
            <?php echo form_error('status') ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary pull-right"><?php echo $button ?></button> 
    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
    <a href="<?php echo site_url('user') ?>" class="btn btn-default pull-right">Cancel</a>
</div></form>
