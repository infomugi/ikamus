
<form action="<?php echo $action; ?>" method="post">
    <div class="col-md-10 form-normal form-horizontal clearfix">
        
       <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="varchar">Name </label>
        </div>
        <div class="col-md-8 col-xs-12">
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
            <?php echo form_error('name') ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="description">Description </label>
        </div>
        <div class="col-md-8 col-xs-12">
            <textarea class="form-control" rows="3" name="description" id="description" placeholder="Description"><?php echo $description; ?></textarea>
            <?php echo form_error('description') ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="varchar">Keywords </label>
        </div>
        <div class="col-md-8 col-xs-12">
            <input type="text" class="form-control" name="keywords" id="keywords" placeholder="Keywords" value="<?php echo $keywords; ?>" />
            <?php echo form_error('keywords') ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="varchar">Favicon </label>
        </div>
        <div class="col-md-8 col-xs-12">
            <input type="text" class="form-control" name="favicon" id="favicon" placeholder="Favicon" value="<?php echo $favicon; ?>" />
            <?php echo form_error('favicon') ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="varchar">Logo </label>
        </div>
        <div class="col-md-8 col-xs-12">
            <input type="text" class="form-control" name="logo" id="logo" placeholder="Logo" value="<?php echo $logo; ?>" />
            <?php echo form_error('logo') ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="address">Address </label>
        </div>
        <div class="col-md-8 col-xs-12">
            <textarea class="form-control" rows="3" name="address" id="address" placeholder="Address"><?php echo $address; ?></textarea>
            <?php echo form_error('address') ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="varchar">Phone </label>
        </div>
        <div class="col-md-8 col-xs-12">
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
            <?php echo form_error('phone') ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="varchar">Email </label>
        </div>
        <div class="col-md-8 col-xs-12">
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
            <?php echo form_error('email') ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="varchar">Facebook </label>
        </div>
        <div class="col-md-8 col-xs-12">
            <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Facebook" value="<?php echo $facebook; ?>" />
            <?php echo form_error('facebook') ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="varchar">Instagram </label>
        </div>
        <div class="col-md-8 col-xs-12">
            <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Instagram" value="<?php echo $instagram; ?>" />
            <?php echo form_error('instagram') ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="varchar">Twitter </label>
        </div>
        <div class="col-md-8 col-xs-12">
            <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Twitter" value="<?php echo $twitter; ?>" />
            <?php echo form_error('twitter') ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="int">Status </label>
        </div>
        <div class="col-md-8 col-xs-12">
            <?php
            echo form_radio('status','1',TRUE).'Aktif ';
            echo form_radio('status','0').'Tidak Aktif';
            ?>    
            <?php echo form_error('status') ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary pull-right"><?php echo $button ?></button> 
    <input type="hidden" name="id_site" value="<?php echo $id_site; ?>" /> 
    <a href="<?php echo site_url('setting') ?>" class="btn btn-default pull-right">Cancel</a>
</div></form>
