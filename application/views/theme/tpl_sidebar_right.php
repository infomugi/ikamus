  <!-- chat -->
  <div class="chat-panel">
    <div class="chat-inner">
      <div class="chat-users">
        <div class="chat-group mb0">
          <div class="chat-group-header h4">
            Member
          </div>
        </div>
        <div class="chat-group">
          <div class="chat-group-header">
            Online
          </div>
          <?php
          $query = $this->db->query('
            SELECT fullname,active,username,visit_time FROM user WHERE active=1');
          foreach ($query->result() as $row)
          {
            ?>
            <a href="#" data-toggle="tooltip" title="<?php echo $row->fullname ?>">
              <span class="status-online"></span>
              <span>@<?php echo $row->username ?></span>
            </a>          
            <?php
          }
          ?>   
        </div>  
        <div class="chat-group">
          <div class="chat-group-header">
            Offline
          </div>
          <?php
          $query = $this->db->query('
            SELECT fullname,active,username,visit_time FROM user WHERE active=0');
          foreach ($query->result() as $row)
          {
            ?>
            <a href="#" data-toggle="tooltip" title="<?php echo $row->fullname ?>">
              <span class="status-offline"></span>
              <span>@<?php echo $row->username ?></span>
            </a>          
            <?php
          }
          ?>   
        </div>                      
      </div>
    </div>
  </div>
<!-- /chat -->