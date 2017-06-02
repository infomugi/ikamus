
<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
        <?php echo anchor(site_url('user/create'),'Add User', 'class="btn btn-primary"'); ?>
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 8px" id="message" class="text text-success">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
    <div class="col-md-4 text-right">
        <form action="<?php echo site_url('user/index'); ?>" class="form-inline" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                <span class="input-group-btn">
                    <?php 
                    if ($q <> '')
                    {
                        ?>
                        <a href="<?php echo site_url('user'); ?>" class="btn btn-default">Reset</a>
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
        <th>Fullname</th>
        <th>Level</th>
        <th>Set Level</th>
        <th>Action</th>
    </tr><?php
    foreach ($user_data as $user)
    {
        ?>
        <tr>
         <td><?php echo ++$start ?></td>
         <td><?php echo $user->fullname ?></td>
         <td><?php echo $this->User_model->level($user->level); ?></td>
         <td style="text-align:center">

            <?php 
            $superadmin = anchor(site_url('user/level/1/'.$user->id_user),'<span class="btn btn-success btn-sm">S</span>','id="superadmin" data-toggle="tooltip" title="Set Superadmin"'); 
            $admin = anchor(site_url('user/level/2/'.$user->id_user),'<span class="btn btn-success btn-sm">A</span>','id="admin" data-toggle="tooltip" title="Set Admin"');  
            $member = anchor(site_url('user/level/3/'.$user->id_user),'<span class="btn btn-success btn-sm">M','id="member" data-toggle="tooltip" title="Set Member"');  
            
            if ($user->level==1) {
                echo $admin;
                echo " ";
                echo $member;
            }elseif($user->level==2){
                echo $superadmin;
                echo " ";
                echo $member;
            }elseif($user->level==3){
                echo $superadmin;
                echo " ";
                echo $admin;
            }
            ?>

        </td>         
        <td style="text-align:center">
            <?php 
            echo anchor(site_url('user/read/'.$user->id_user),'<span class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></span>'); 
            echo ''; 
            echo anchor(site_url('user/update/'.$user->id_user),'<span class="btn btn-info btn-sm"><i class="fa fa-edit"></i></span>'); 
            echo ''; 
            echo anchor(site_url('user/delete/'.$user->id_user),'<span class="btn btn-danger btn-sm"><i class="fa fa-close"></i></span>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
    </div>
    <div class="col-md-6 text-right">
        <?php echo $pagination ?>
    </div>
</div>
