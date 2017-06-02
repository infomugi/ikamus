
<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
        <?php echo anchor(site_url('setting/create'),'Add Setting', 'class="btn btn-primary"'); ?>
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 8px" id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
    <div class="col-md-4 text-right">
        <form action="<?php echo site_url('setting/index'); ?>" class="form-inline" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                <span class="input-group-btn">
                    <?php 
                    if ($q <> '')
                    {
                        ?>
                        <a href="<?php echo site_url('setting'); ?>" class="btn btn-default">Reset</a>
                        <?php
                    }
                    ?>
                    <button class="btn btn-primary" type="submit">Search</button>
                </span>
            </div>
        </form>
    </div>
</div>
<table class="table table-bordered" style="margin-bottom: 10px">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Status</th>
        <th>Set Status</th>
        <th>Action</th>
    </tr><?php
    foreach ($setting_data as $setting)
    {
        ?>
        <tr>
         <td><?php echo ++$start ?></td>
         <td><?php echo $setting->name ?></td>
         <td><?php echo $this->User_model->status($setting->status); ?></td>
         <td style="text-align:center">

            <?php 
            $active = anchor(site_url('setting/status/1/'.$setting->id_site),'<span class="btn btn-success btn-sm">S</span>','id="active" data-toggle="tooltip" title="Aktif"'); 
            $notactive = anchor(site_url('setting/status/0/'.$setting->id_site),'<span class="btn btn-success btn-sm">A</span>','id="notactive" data-toggle="tooltip" title="Tidak Aktif"');  
            
            if ($setting->status==1) {
                echo $notactive;
            }else{
                echo $active;
            }
            ?>

        </td>  
        <td style="text-align:center">
            <?php 
            echo anchor(site_url('setting/read/'.$setting->id_site),'<span class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></span>'); 
            echo ''; 
            echo anchor(site_url('setting/update/'.$setting->id_site),'<span class="btn btn-info btn-sm"><i class="fa fa-edit"></i></span>'); 
            echo ''; 
            echo anchor(site_url('setting/delete/'.$setting->id_site),'<span class="btn btn-danger btn-sm"><i class="fa fa-close"></i></span>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
            ?>
        </td>
    </tr>
    <?php
}
?>
</table>
<div class="row">
    <div class="col-md-6">
        <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
        <?php echo anchor(site_url('setting/excel'), 'Excel', 'class="btn btn-primary"'); ?>
        <?php echo anchor(site_url('setting/word'), 'Word', 'class="btn btn-primary"'); ?>
    </div>
    <div class="col-md-6 text-right">
        <?php echo $pagination ?>
    </div>
</div>
