
<table class="table table-bordered" style="margin-bottom: 10px">
    <tr>
        <th>Last Visit</th>
        <th>Fullname</th>
        <th>Email</th>
        <th>Level</th>
        <th>Active</th>
    </tr>
    <?php
    foreach($user_data as $user)
    {
        ?>
        <tr>
           <td class="format-date"><?php echo $user->visit_time ?></td>
           <td><?php echo $user->fullname ?></td>
           <td><?php echo $user->email ?></td>
           <td><?php echo $this->User_model->level($user->level); ?></td>
           <td><span class="label label-<?php echo $this->User_model->online($user->active); ?>"><?php echo $this->User_model->active($user->active); ?></span></td>
       </tr>
       <?php
   }
   ?>
</table>