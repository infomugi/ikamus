<form action="<?php echo $action; ?>" method="post">
  <div class="col-md-10 form-normal form-horizontal clearfix">

    <div class="row form-group">
      <div class="col-sm-4 control-label col-xs-12">
        <label class="required" for="varchar">Password </label>
      </div>
      <div class="col-md-8 col-xs-12">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        <?php echo form_error('password') ?>
      </div>
    </div>

    <button type="submit" class="btn btn-primary pull-right"><?php echo $button ?></button> 
    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
    <a href="<?php echo site_url('user') ?>" class="btn btn-default pull-right">Cancel</a>
  </div>
</form>
