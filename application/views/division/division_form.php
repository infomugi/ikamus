
<form action="<?php echo $action; ?>" method="post">
    <div class="col-md-10 form-normal form-horizontal clearfix">
        
     <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="varchar">Name </label>
        </div>
        <div class="col-md-8 col-xs-12" data-toggle="tooltip" title="Name">
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
            <?php echo form_error('name') ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="description">Description </label>
        </div>
        <div class="col-md-8 col-xs-12" data-toggle="tooltip" title="Description">
            <textarea class="form-control" rows="3" name="description" id="description" placeholder="Description"><?php echo $description; ?></textarea>
            <?php echo form_error('description') ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-4 control-label col-xs-12">
            <label class="required" for="int">Status </label>
        </div>
        <div class="col-md-8 col-xs-12" data-toggle="tooltip" title="Status">
            <?php
            echo form_radio('status','1',TRUE).'Aktif ';
            echo form_radio('status','0').'Tidak Aktif';
            ?>  
            <?php echo form_error('status') ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary pull-right"><?php echo $button ?></button> 
    <input type="hidden" name="id_division" value="<?php echo $id_division; ?>" /> 
    <a href="<?php echo site_url('division') ?>" class="btn btn-default pull-right">Cancel</a>
</div></form>
